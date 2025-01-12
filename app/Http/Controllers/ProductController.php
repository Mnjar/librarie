<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index($id) {

        $books = Book::all();
        $user = Auth::user();
        return view('product', compact('books','user'));
    }
}
