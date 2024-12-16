<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Book;
use App\Models\Transaction;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_transaction()
    {
        // Membuat user dan buku untuk transaksi
        $user = User::factory()->create();
        $book = Book::factory()->create(['price' => 100]);

        // Simulasi request untuk membuat transaksi
        $response = $this->postJson('/api/payment/create', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'transaction_type' => 'purchase',
            'quantity' => 1,
        ]);

        // Verifikasi response dan database
        $response->assertStatus(200);
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'payment_status' => null, // Status pembayaran akan null sebelum pembayaran
        ]);
    }

    public function test_notification_payment_success()
    {
        // Membuat transaksi yang sudah ada
        $transaction = Transaction::factory()->create([
            'midtrans_transaction_id' => 'ORDER-12345',
            'payment_status' => 'pending',
        ]);

        // Simulasi notifikasi dari Midtrans
        $response = $this->postJson('/api/payment/notification', [
            'order_id' => 'ORDER-12345',
            'transaction_status' => 'settlement',
        ]);

        // Verifikasi status pembayaran
        $transaction->refresh();
        $this->assertEquals('paid', $transaction->payment_status);
    }
}

