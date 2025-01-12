<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        // Mengambil data buku dan kategori dari database
        $books = Book::all();
        $user = Auth::user();

        // Mengirim data ke view
        return view('product',compact('books','user'));
    }
}
