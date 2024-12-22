<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|exists:books,id',
            'transaction_type' => 'required|in:purchase,borrow',
        ]);

        // Mendapatkan buku yang dipilih
        $book = Book::findOrFail($validated['book_id']);

        // Membuat transaksi baru
        $transaction = Transaction::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'transaction_type' => $validated['transaction_type'],
            'quantity' => 1, // Asumsikan 1 buku per transaksi
            'transaction_date' => now(),
            'payment_status' => 'pending', // Status awal pembayaran
            'payment_url' => null, // Akan diisi nanti jika menggunakan Midtrans
            'payment_token' => null, // Akan diisi nanti jika menggunakan Midtrans
            'midtrans_transaction_id' => null, // ID transaksi Midtrans jika diperlukan
        ]);

        // Jika transaksi adalah pembelian, lanjutkan ke pembayaran menggunakan Midtrans
        if ($validated['transaction_type'] == 'purchase') {
            // Logika untuk mengarahkan ke Midtrans
            // Bisa menggunakan Midtrans SDK untuk menghasilkan token pembayaran
            // dan mendapatkan URL pembayaran

            // Misalnya, set payment_url dengan URL Midtrans
            $transaction->payment_url = 'https://midtrans-payment-url.com';
            $transaction->save();
        }

        // Redirect ke halaman konfirmasi atau detail transaksi
        return redirect()->route('transactions.show', $transaction->id);
    }
}

