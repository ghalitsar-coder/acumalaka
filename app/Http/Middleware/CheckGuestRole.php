<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckGuestRole
{
    public function handle(Request $request, Closure $next)
    {
        // Pastikan pengguna memiliki role 'guest'
        if (auth()->check() && auth()->user()->role === 'guest') {
            return $next($request);
        }

        // Jika bukan guest, arahkan ke halaman lain, misalnya home
        return redirect()->route('staff');
    }
}
