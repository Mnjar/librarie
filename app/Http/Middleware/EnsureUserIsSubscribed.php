<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsSubscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Cek apakah pengguna sudah berlangganan
        if (!auth()->user() || !auth()->user()->is_subscribed) {
            return redirect()->route('subscription.notice'); // Ganti dengan rute yang sesuai
        }

        return $next($request);
    }
}
