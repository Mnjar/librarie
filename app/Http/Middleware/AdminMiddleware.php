<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Memeriksa apakah pengguna terautentikasi dan memiliki role 'admin'
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Jika bukan admin, arahkan ke halaman login atau halaman lain
        return redirect()->route('admin.login')->withErrors(['email' => 'You are not authorized to access the admin panel.']);
    }
}
