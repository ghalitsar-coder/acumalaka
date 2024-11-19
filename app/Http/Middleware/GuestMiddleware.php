<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role !== 'guest') {
            // Redirect non-guest users to the admin dashboard or another page
            return redirect()->route('admin.dashboard');  // You can define your own admin dashboard route
        }

        return $next($request);
    }
}
