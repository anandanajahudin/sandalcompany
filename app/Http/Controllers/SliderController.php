<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return view('pages.back.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
        ]);

        $fileName = 'slider'.$productName.'.'.$request->image->extension();
        $destinationPath = 'assets/images/sliders/';

        $request->image->move(public_path($destinationPath), $fileName);
        $image_path = $destinationPath.'/'.$fileName;

        $slider = Slider::create([
            'image' => $image_path,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('slider.index')->with(['success' => 'Slider has been created!']);
    }

    public function edit(string $id)
    {
        $slider = Slider::findOrFail($id);

        return view('pages.back.slider.edit', compact('slider'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'required',
            'is_active' => 'required',
        ]);

        $slider = Slider::findOrFail($id);

        $slider->update([
            'image' => $request->image,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('slider.index')->with(['success' => 'Slider has been updated!']);
    }

    public function destroy(string $id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();

        return redirect()->route('slider.index')->with(['success' => 'Slider has been deleted!']);
    }
}
