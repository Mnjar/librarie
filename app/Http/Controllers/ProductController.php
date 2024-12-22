<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id) {

        return view('product', compact('books'));
    }
}
