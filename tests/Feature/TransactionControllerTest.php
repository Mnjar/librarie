<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\User;
use App\Models\Address;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TransactionControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_purchase_book_successfully()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['stock' => 10]);
        $address = Address::factory()->create(['user_id' => $user->id, 'address' => 'Jl. Merdeka No. 1']);

        // User memilih alamat pengiriman yang sudah ada
        $response = $this->actingAs($user)->post('/transactions', [
            'book_id' => $book->id,
            'quantity' => 2,
            'shipping_address' => $address->address,
        ]);

        // Verifikasi redirect dan status code
        $response->assertRedirect('/transactions'); // Redirect setelah berhasil

        // Verifikasi pesan sukses di session
        $response->assertSessionHas('success', 'Pembelian berhasil dilakukan.');

        // Verifikasi transaksi tercatat dengan benar
        $this->assertDatabaseHas('transactions', [
            'user_id' => $user->id,
            'book_id' => $book->id,
            'quantity' => 2,
            'shipping_address' => $address->address,
            'shipping_status' => 'pending', // Status pengiriman awal
        ]);

        // Verifikasi stok buku berkurang
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'stock' => 8, // Stok berkurang
        ]);
    }

    public function test_purchase_book_with_insufficient_stock()
    {
        $user = User::factory()->create();
        $book = Book::factory()->create(['stock' => 1]);
        $address = Address::factory()->create(['user_id' => $user->id, 'address' => 'Jl. Merdeka No. 1']);

        // User mencoba membeli lebih banyak buku dari stok yang tersedia
        $response = $this->actingAs($user)->post('/transactions', [
            'book_id' => $book->id,
            'quantity' => 2,
            'shipping_address' => $address->address,
        ]);

        // Verifikasi error yang muncul
        $response->assertSessionHasErrors(['message' => 'Stok buku tidak cukup.']);

        // Verifikasi bahwa stok buku tidak berubah
        $this->assertDatabaseHas('books', [
            'id' => $book->id,
            'stock' => 1, // Stok tidak berubah
        ]);
    }
}
