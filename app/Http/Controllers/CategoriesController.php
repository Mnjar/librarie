<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{
    public function index()
    {
        // Mengambil data buku dan kategori dari database
        $books = Book::all();
        $user = Auth::user();

        // Mengirim data ke view
        return view('categories',compact('books','user'));
    }
}
