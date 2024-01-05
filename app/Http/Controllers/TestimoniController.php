<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestimoniController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        $testimonials = Testimonial::all();

        return view('pages.back.testimonial.index',
            compact('orders', 'testimonials'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'order' => 'required',
            'nama' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
        ]);

        $testimonial = Testimonial::create([
            'order_id' => $request->order,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'testimoni' => $request->testimoni,
        ]);

        if (Auth::user()->user_type != 'customer') {
            return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been created!']);
        } else {
            return redirect()->route('order.index')->with(['success' => 'Testimonial has been created!']);
        }
    }

    public function edit(string $id)
    {
        $orders = Order::all();
        $testimonial = Testimonial::findOrFail($id);

        return view('pages.back.testimonial.edit', compact('orders', 'testimonial'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'order' => 'required',
            'nama' => 'required',
            'nilai' => 'required',
            'testimoni' => 'required',
        ]);

        $testimonial = Testimonial::findOrFail($id);

        $testimonial->update([
            'order_id' => $request->order,
            'nama' => $request->nama,
            'nilai' => $request->nilai,
            'testimoni' => $request->testimoni,
        ]);

        if (Auth::user()->user_type != 'customer') {
            return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been updated!']);
        } else {
            return redirect()->route('order.index')->with(['success' => 'Testimonial has been updated!']);
        }
    }

    public function destroy(string $id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $testimonial->delete();

        return redirect()->route('testimonial.index')->with(['success' => 'Testimonial has been deleted!']);
    }
}
