<?php

namespace App\Http\Controllers;

use Hash;
use Session;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Order;
use App\Models\Product;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    public function login()
    {
        return view('layouts.auth.login');
    }

    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->route('dashboard')
                ->with(['success' => 'You have successfully logged in!']);
        }

        return back()->with(['error' => 'Your email is not registered']);
    }

    public function register()
    {
        return view('layouts.auth.register');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        if ($request->password == $request->password_confirmation) {
            $user = User::create([
                'nama' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);

            return redirect()->route('login')->with(['success' => 'You have registered']);

        } else {
            return redirect()->route('register')->with(['error' => 'Error, your password is not same']);
        }

    }

    public function dashboard()
    {
        if(Auth::check()) {

            if(Auth::user()->user_type == 'customer') {
                $orders = Order::where('customer_id', Auth::user()->id)->count();
                $products= Product::all()->count();

                return view('pages.back.dashboard-user',
                [
                    'orders' => $orders,
                    'products'=>$products
                ]);

            } else {
                $customers = User::where('user_type', 'customer')->count();
                $employees = Employee::all()->count();
                $departments = Department::all()->count();
                $orders = Order::all()->count();
                $products = Product::all()->count();
                $testimonials = Testimonial::all()->count();

                return view('pages.back.dashboard',
                [
                    'customers' => $customers,
                    'employees' => $employees,
                    'departments' => $departments,
                    'orders' => $orders,
                    'products' => $products,
                    'testimonials' => $testimonials,
                ]);
            }
        }

        return redirect()->route('login')->withSuccess('You are not allowed to access');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('frontend')
            ->withSuccess('You have logged out successfully!');;
    }
}
