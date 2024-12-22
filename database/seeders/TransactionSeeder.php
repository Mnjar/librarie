<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;

class TransactionSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();
        $books = Book::all();

        // Membuat 3 transaksi pembelian buku
        Transaction::create([
            'user_id' => $users[0]->id,
            'book_id' => $books[0]->id,
            'transaction_type' => 'purchase',
            'quantity' => 1,
            'transaction_date' => now(),
            'shipping_address' => '123 Main St, City, Country',
            'shipping_status' => 'pending',
            'payment_status' => 'paid',
            'payment_url' => 'http://payment-link.com',
            'payment_token' => 'sample-token',
            'midtrans_transaction_id' => 'sample-midtrans-id',
        ]);

        Transaction::create([
            'user_id' => $users[0]->id,
            'book_id' => $books[1]->id,
            'transaction_type' => 'purchase',
            'quantity' => 2,
            'transaction_date' => now(),
            'shipping_address' => '456 Another St, City, Country',
            'shipping_status' => 'shipped',
            'payment_status' => 'paid',
            'payment_url' => 'http://payment-link.com',
            'payment_token' => 'sample-token',
            'midtrans_transaction_id' => 'sample-midtrans-id',
        ]);

        Transaction::create([
            'user_id' => $users[0]->id,
            'book_id' => $books[2]->id,
            'transaction_type' => 'purchase',
            'quantity' => 1,
            'transaction_date' => now(),
            'shipping_address' => '123 Main St, City, Country',
            'shipping_status' => 'delivered',
            'payment_status' => 'paid',
            'payment_url' => 'http://payment-link.com',
            'payment_token' => 'sample-token',
            'midtrans_transaction_id' => 'sample-midtrans-id',
        ]);
    }
}
