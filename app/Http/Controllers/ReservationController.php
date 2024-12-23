<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Menampilkan daftar reservasi pengguna
    // public function index()
    // {
    //     $reservations = Auth::user()->reservation()->with('book')->get();
    //     return view('reservations.index', compact('reservations'));
    // }

    public function index()
    {
        // $reservations = Auth::user()->reservation()->with('book')->get();
        return view('reservation');
    }

    // Membuat reservasi baru
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < 1) {
            return back()->withErrors(['message' => 'Buku ini tidak tersedia untuk reservasi.']);
        }

        $reservation = Reservation::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'reservation_date' => now(),
            'status' => 'pending',
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibuat.');
    }

    // Pembaruan status oleh sistem (otomatis)
    public function updateStatusBySystem()
    {
        // Ambil semua reservasi yang statusnya masih pending
        $reservations = Reservation::where('status', 'pending')->get();

        foreach ($reservations as $reservation) {
            $book = $reservation->book;

            // Periksa apakah buku tersedia (stock > 0)
            if ($book->stock > 0) {
                $reservation->status = 'approved';
            } else {
                $reservation->status = 'canceled';
            }

            // Simpan perubahan status
            $reservation->save();
        }

        return response()->json(['message' => 'Reservation statuses updated by system']);
    }

    // Pembaruan status manual oleh admin
    public function updateStatus(Request $request, $id)
    {
        // Validasi input status
        $request->validate([
            'status' => 'required|in:pending,approved,canceled',
        ]);

        // Ambil reservasi berdasarkan ID
        $reservation = Reservation::findOrFail($id);

        // Periksa apakah user yang mengakses adalah admin
        if (Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        }

        // Update status reservasi
        $reservation->update(['status' => $request->status]);

        return redirect()->route('reservations.index')->with('success', 'Reservation status updated successfully.');
    }
}
