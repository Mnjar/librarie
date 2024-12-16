<?php

namespace Tests\Feature;

use App\Jobs\UpdateReservationStatus;
use App\Models\Book;
use App\Models\Reservation;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UpdateReservationStatusTest extends TestCase
{
    use RefreshDatabase;

    public function test_job_is_queued()
    {
        // Fake antrian
        Queue::fake();

        // Buat data buku dan reservasi
        $book = Book::factory()->create(['stock' => 5]);
        $reservation = Reservation::factory()->create([
            'status' => 'pending',
            'book_id' => $book->id,
        ]);

        // Jalankan job secara manual
        UpdateReservationStatus::dispatch();

        // Verifikasi bahwa job telah dimasukkan ke dalam antrian
        Queue::assertPushed(UpdateReservationStatus::class);
    }

    public function test_reservation_status_updated_to_approved_when_book_is_available()
    {
        // Buat data buku dan reservasi
        $book = Book::factory()->create(['stock' => 5]);
        $reservation = Reservation::factory()->create([
            'status' => 'pending',
            'book_id' => $book->id,
        ]);

        // Jalankan job
        (new UpdateReservationStatus())->handle();

        // Verifikasi bahwa status reservasi berubah menjadi 'approved'
        $reservation->refresh();
        $this->assertEquals('approved', $reservation->status);
    }

    public function test_reservation_status_updated_to_canceled_when_book_is_unavailable()
    {
        // Buat data buku dan reservasi
        $book = Book::factory()->create(['stock' => 0]);
        $reservation = Reservation::factory()->create([
            'status' => 'pending',
            'book_id' => $book->id,
        ]);

        // Jalankan job
        (new UpdateReservationStatus())->handle();

        // Verifikasi bahwa status reservasi berubah menjadi 'canceled'
        $reservation->refresh();
        $this->assertEquals('canceled', $reservation->status);
    }
}
