<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            \Log::info('User is authenticated: ' . Auth::user()->email);
            if (Auth::user()->role === 'admin') {
                return $next($request);
            }
        }

        \Log::info('Redirecting to admin login');
        return redirect()->route('admin.login')->withErrors(['email' => 'You are not authorized to access the admin panel.']);
    }

}
