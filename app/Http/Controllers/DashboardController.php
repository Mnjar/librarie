<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $books = Book::all();
        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Ambil buku-buku yang terlibat dalam transaksi pengguna
        $booksFromTransactions = $user->booksFromTransactions();
        
        // dd($booksFromTransactions);

        return view('dashboard', compact('booksFromTransactions', 'books', 'user'));
    }

}
