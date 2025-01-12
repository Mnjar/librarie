<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($id) {
        $book = Book::findOrFail($id);
        $user = Auth::user();

        return view('product', compact('book', 'user'));
    }
}
