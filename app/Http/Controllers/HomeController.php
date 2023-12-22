<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slider;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(Request $request){
        $bestseller = Product::take(4)->get();
        $testimonials = Testimonial::where('nilai', 5)->take(6)->get();

        return view('pages.front.home',
        [
            'bestseller' => $bestseller,
            'testimonials' => $testimonials
        ]);
    }

    public function about(Request $request){
        return view('pages.front.about');
    }

    public function catalog(Request $request){
        $products = Product::all();

        return view('pages.front.catalog',
        [
            'products' => $products
        ]);
    }

    public function catalogview(Request $request) {
        $products = Product::all();

        return view('pages.front.catalog',
        [
            'products' => $products
        ]);
    }

    public function contact(Request $request){
        return view('pages.front.contact');
    }
}
