<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    // Proses login admin
    public function login(Request $request)
    {
        // Validasi input login
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Cek apakah email dan password cocok dengan data admin
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Cek apakah user yang login adalah admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard'); // Redirect ke dashboard admin
            }

            // Jika bukan admin
            Auth::logout();
            return redirect()->route('admin.login')->withErrors(['email' => 'You are not authorized to access the admin panel.']);
        }

        // Jika login gagal
        return redirect()->route('admin.login')->withErrors(['email' => 'Invalid credentials provided.']);
    }
}

