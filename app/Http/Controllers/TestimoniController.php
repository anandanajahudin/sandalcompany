<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimoniController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();

        return view('pages.back.testimonial.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
        ]);

        $testimonial = Testimonial::create([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'testimoni' => $request->testimoni,
        ]);

        return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been created!']);
    }

    public function edit(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('pages.back.testimonial.edit', compact('testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'testimoni' => $request->testimoni,
        ]);

        return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been updated!']);
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been deleted!']);
    }
}
