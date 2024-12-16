<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ReservationTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_create_reservation()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['stock' => 1]);

        $this->actingAs($user);

        $response = $this->post('/reservations', ['book_id' => $book->id]);

        $response->assertRedirect('/reservations');
        $this->assertDatabaseHas('reservations', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending',
        ]);
    }

    public function test_admin_can_update_reservation_status()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $book = Book::factory()->create(['stock' => 1]);
        $reservation = Reservation::factory()->create([
            'user_id' => $admin->id,
            'book_id' => $book->id,
            'status' => 'pending',
        ]);

        $this->actingAs($admin);

        $response = $this->patch("/reservations/{$reservation->id}/status", ['status' => 'approved']);

        $response->assertRedirect('/reservations');
        $this->assertDatabaseHas('reservations', [
            'id' => $reservation->id,
            'status' => 'approved',
        ]);
    }

    public function test_user_cannot_update_reservation_status()
    {
        $user = User::factory()->create(['role' => 'user']);
        $book = Book::factory()->create(['stock' => 1]);
        $reservation = Reservation::factory()->create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'status' => 'pending',
        ]);

        $this->actingAs($user);

        $response = $this->patch("/reservations/{$reservation->id}/status", ['status' => 'approved']);

        $response->assertRedirect()->with('error', 'You are not authorized to perform this action.');
    }
}
