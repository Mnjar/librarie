<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|string',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Cek apakah stok buku cukup
        if ($book->stock < $request->quantity) {
            return back()->withErrors(['message' => 'Stok buku tidak cukup.']);
        }

        // Buat transaksi baru
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'quantity' => $request->quantity,
            'total_price' => $book->price * $request->quantity,
            'shipping_address' => $request->shipping_address,
            'shipping_status' => 'pending', // Status pengiriman awal
        ]);

        // Kurangi stok buku
        $book->decrement('stock', $request->quantity);

        return redirect()->route('transactions.index')->with('success', 'Pembelian berhasil dilakukan.');
    }
}
