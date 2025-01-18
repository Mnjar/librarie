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
    public function index(Request $request)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil parameter pencarian dari request
        $searchTerm = $request->input('search');

        // Query reservasi berdasarkan user_id dan filter berdasarkan pencarian
        $transactions = Transaction::where('user_id', $userId)
            ->with(['book'])
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->whereHas('book', function ($query) use ($searchTerm) {
                    $query->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('author', 'like', '%' . $searchTerm . '%');
                });
            })
            ->orderBy('transaction_date', 'desc')
            ->get();

        // Kirim data transaksi dan parameter pencarian ke view
        return view('history', compact('transactions', 'searchTerm'));
    }

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
            'shipping_address' => 'required|exists:addresses,id',
        ]);

        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        // Cek stok
        if ($book->stock < $request->quantity) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }

        // Buat transaksi
        $transaction = Transaction::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'transaction_type' => $request->transaction_type,
            'quantity' => $request->quantity,
            'transaction_date' => now(),
            'shipping_address' => $user->address()->findOrFail($request->shipping_address)->address,
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

        // Dapatkan Snap Token
        $snapToken = Snap::getSnapToken($params);

        return response()->json(['snap_token' => $snapToken]);
    }

    public function notificationHandler(Request $request)
    {
        $notification = new \Midtrans\Notification();

        $transaction = Transaction::findOrFail($notification->order_id);

        if ($notification->transaction_status == 'settlement') {
            $transaction->update(['payment_status' => 'paid']);

            // Kurangi stok buku
            $book = $transaction->book;
            $book->decrement('stock', $transaction->quantity);
        } elseif ($notification->transaction_status == 'pending') {
            $transaction->update(['payment_status' => 'pending']);
        } elseif ($notification->transaction_status == 'deny' || $notification->transaction_status == 'expire') {
            $transaction->update(['payment_status' => 'failed']);
        }

        return response()->json(['message' => 'Notification handled']);
    }

    public function success()
    {
        return view('transactions.success');
    }

    public function successUpdate(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
        ]);

        $transaction = Transaction::findOrFail($request->transaction_id);

        if ($transaction->payment_status !== 'paid') {
            $transaction->update(['payment_status' => 'paid']);

            // Kurangi stok buku
            $book = $transaction->book;
            if ($book->stock >= $transaction->quantity) {
                $book->decrement('stock', $transaction->quantity);
            } else {
                return response()->json(['message' => 'Insufficient stock'], 400);
            }
        }

        return response()->json(['message' => 'Stock updated successfully']);
    }
}
