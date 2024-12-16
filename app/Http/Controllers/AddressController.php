<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    // Menampilkan form untuk menambahkan alamat baru
    public function create()
    {
        return view('addresses.create');
    }

    // Menyimpan alamat baru
    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:255',
        ]);

        Address::create([
            'user_id' => Auth::id(),
            'address' => $request->address,
        ]);

        return redirect()->route('addresses.index')->with('success', 'Alamat berhasil ditambahkan.');
    }

    // Menampilkan daftar alamat pengguna
    public function index()
    {
        $addresses = Auth::user()->addresses;
        return view('addresses.index', compact('addresses'));
    }
}
