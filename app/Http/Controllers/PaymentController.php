<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Book;
use App\Models\User;
use Midtrans\Snap;
use Midtrans\Config;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set konfigurasi Midtrans
        Config::$serverKey = config('services.midtrans.server_key');
        Config::$clientKey = config('services.midtrans.client_key');
        Config::$isProduction = config('services.midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    // Fungsi untuk memproses pembayaran
    public function createTransaction(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        $user = User::findOrFail($request->user_id);

        // Tentukan detail transaksi
        $transaction_details = [
            'order_id' => 'ORDER-' . time(),
            'gross_amount' => $book->price * $request->quantity, // Total harga
        ];

        $customer_details = [
            'first_name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
        ];

        $transaction = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        try {
            // Menggunakan Snap API untuk mendapatkan token pembayaran
            $snapToken = Snap::getSnapToken($transaction);

            // Simpan informasi transaksi ke database
            $transaction = Transaction::create([
                'user_id' => $user->id,
                'book_id' => $book->id,
                'transaction_type' => $request->transaction_type,
                'quantity' => $request->quantity,
                'payment_token' => $snapToken,
                'payment_url' => $request->payment_url,
            ]);

            return response()->json(['snap_token' => $snapToken, 'payment_url' => $transaction->payment_url]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Fungsi untuk menangani notifikasi pembayaran
    public function notification(Request $request)
    {
        $notification = $request->all();
        $transaction = Transaction::where('midtrans_transaction_id', $notification['order_id'])->first();

        if ($transaction) {
            // Menangani status pembayaran
            if ($notification['transaction_status'] == 'settlement') {
                $transaction->payment_status = 'paid';
            } else if ($notification['transaction_status'] == 'pending') {
                $transaction->payment_status = 'pending';
            } else if ($notification['transaction_status'] == 'cancel') {
                $transaction->payment_status = 'cancelled';
            }
            $transaction->save();
        }

        return response()->json(['status' => 'success']);
    }
}

