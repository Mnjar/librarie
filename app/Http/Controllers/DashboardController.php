<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // Ambil query pencarian dari input
        $search = $request->query('search');

        // Filter buku berdasarkan pencarian
        $books = Book::when($search, function ($query, $search) {
            return $query->where('title', 'like', "%{$search}%")
                ->orWhere('author', 'like', "%{$search}%");
        })->get();

        // Ambil pengguna yang sedang login
        $user = Auth::user();

        // Ambil buku-buku yang terlibat dalam transaksi pengguna
        $booksFromTransactions = $user->booksFromTransactions();

        return view('dashboard', compact('booksFromTransactions', 'books', 'user', 'search'));
    }
}
