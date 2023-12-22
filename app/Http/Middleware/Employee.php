<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Employee
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Check if the user has the 'employee' role
            if (Auth::user()->user_type === 'employee') {
                // User is an employee, allow access to the requested feature
                return $next($request);
            } else {
                // User is not an employee, you can redirect them or show an error
                return redirect()->route('frontend')->with('error', 'You do not have permission to access this feature.');
            }
        }

        // User is not authenticated, you can redirect them or show an error
        return redirect()->route('login')->with('error', 'You need to be logged in to access this feature.');
    }
}
