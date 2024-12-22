<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Book;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $books = Book::all();

        // Membuat 1 reservation
        Reservation::create([
            'user_id' => $users[0]->id,
            'book_id' => $books[0]->id,
            'reservation_date' => now(),
            'status' => 'pending',
        ]);
    }
}
