<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengambil data buku dan kategori dari database
        $books = Book::all();
        $categories = Category::all();

        // Mengirim data ke view
        return view('home', compact('books', 'categories'));
    }
}
