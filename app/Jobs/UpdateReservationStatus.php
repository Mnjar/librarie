<?php

namespace App\Jobs;

use App\Models\Reservation;
use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class UpdateReservationStatus implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        // Tidak perlu parameter untuk job ini
    }

    public function handle()
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

            Log::info("Reservation {$reservation->id} status updated to {$reservation->status}");
        }
    }
}

