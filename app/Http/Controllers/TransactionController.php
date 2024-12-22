<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Midtrans\Snap;
use Midtrans\Config;

class TransactionController extends Controller
{
    public function create(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        return view('transactions.create', compact('book', 'request'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'transaction_type' => 'required|in:purchase,borrow',
            'quantity' => 'required|integer|min:1',
            'shipping_address' => 'required|exists:addresses,id', // Validasi alamat
        ]);

        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        // Ambil alamat yang dipilih pengguna
        $address = $user->address()->findOrFail($request->shipping_address);

        // Buat transaksi
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'transaction_type' => $request->transaction_type,
            'quantity' => $request->quantity,
            'transaction_date' => now(),
            'shipping_address' => $address->address,
            'payment_status' => 'pending',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $transaction->id,
                'gross_amount' => $book->price * $request->quantity,
            ],
            'customer_details' => [
                'first_name' => $user->name,
                'email' => $user->email,
            ],
        ];

        // $snapToken = Snap::getSnapToken($params);

        // $transaction->update([
        //     'payment_token' => $snapToken,
        //     'payment_url' => Snap::createTransaction($params)->redirect_url,
        // ]);

        // return response()->json([
        //     'payment_token' => $snapToken,
        //     'payment_url' => $transaction->payment_url,
        // ]);

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        return response()->json([
            'snap_token' => $snapToken,
        ]);
    }



    public function notificationHandler(Request $request)
    {
        $notification = new \Midtrans\Notification();

        $transaction = Transaction::findOrFail($notification->order_id);

        if ($notification->transaction_status == 'settlement') {
            $transaction->update(['payment_status' => 'paid']);
        } elseif ($notification->transaction_status == 'pending') {
            $transaction->update(['payment_status' => 'pending']);
        } elseif ($notification->transaction_status == 'deny' || $notification->transaction_status == 'expire') {
            $transaction->update(['payment_status' => 'failed']);
        }

        return response()->json(['message' => 'Notification handled']);
    }

}
