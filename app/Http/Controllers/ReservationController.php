<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Reservation;
use Midtrans\Config;
use Midtrans\Snap;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(Request $request)
    {
        // Ambil ID pengguna yang sedang login
        $userId = Auth::id();

        // Ambil parameter pencarian dari request
        $searchTerm = $request->input('search');

        // Query reservasi berdasarkan user_id dan filter berdasarkan pencarian
        $reservations = Reservation::where('user_id', $userId)
            ->with(['book'])
            ->when($searchTerm, function ($query, $searchTerm) {
                return $query->whereHas('book', function ($query) use ($searchTerm) {
                    $query->where('title', 'like', '%' . $searchTerm . '%')
                        ->orWhere('author', 'like', '%' . $searchTerm . '%');
                });
            })
            ->orderBy('reservation_date', 'desc')
            ->get();

        // Mengonversi tanggal ke objek Carbon jika belum otomatis
        foreach ($reservations as $reservation) {
            $reservation->reservation_date = \Carbon\Carbon::parse($reservation->reservation_date);
            $reservation->return_date = \Carbon\Carbon::parse($reservation->return_date);
        }

        // Kirim data transaksi dan parameter pencarian ke view
        return view('reservation', compact('reservations', 'searchTerm'));
    }

    public function create(Request $request)
    {
        $book = Book::findOrFail($request->book_id);
        return view('reservations.create', compact('book', 'request'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'shipping_address' => 'required|exists:addresses,id',
        ]);

        $book = Book::findOrFail($request->book_id);
        $user = Auth::user();

        // Cek stok
        if ($book->stock == 0) {
            return response()->json(['message' => 'Insufficient stock'], 400);
        }

        // Buat reservasi
        $reservation = Reservation::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'reservation_date' => $request->reservation_date,
            'return_date' => \Carbon\Carbon::parse($request->reservation_date)->addDays(7),
            'payment_status' => 'pending',
            'shipping_address' => $user->address()->findOrFail($request->shipping_address)->address,
            'reservations_status' => 'borrowed',
        ]);

        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        $params = [
            'transaction_details' => [
                'order_id' => $reservation->id,
                'gross_amount' => $book->price * 0.25,
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

        $reservation = Reservation::findOrFail($notification->order_id);

        if ($notification->transaction_status == 'settlement') {
            $reservation->update(['payment_status' => 'paid', 'reservations_status' => 'borrowed']);  // Update status menjadi 'borrowed'

            // Kurangi stok buku
            $book = $reservation->book;
            $book->decrement('stock', $reservation->quantity);
        } elseif ($notification->transaction_status == 'pending') {
            $reservation->update(['payment_status' => 'pending']);
        } elseif ($notification->transaction_status == 'deny' || $notification->transaction_status == 'expire') {
            $reservation->update(['payment_status' => 'failed']);
        }

        return response()->json(['message' => 'Notification handled']);
    }

    public function successUpdate(Request $request)
    {
        $request->validate([
            'transaction_id' => 'required|exists:reservations,id',
        ]);

        $reservation = Reservation::findOrFail($request->transaction_id);

        if ($reservation->payment_status !== 'paid') {
            $reservation->update(['payment_status' => 'paid', 'reservations_status' => 'borrowed']);  // Update status menjadi 'borrowed'

            // Kurangi stok buku
            $book = $reservation->book;
            if ($book->stock > 0) {
                $book->decrement('stock', 1);
            } else {
                return response()->json(['message' => 'Insufficient stock'], 400);
            }
        }

        return response()->json(['message' => 'Stock updated successfully']);
    }

    public function success()
    {
        return view('reservations.success');
    }
}
