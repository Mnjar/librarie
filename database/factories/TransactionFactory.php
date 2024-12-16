<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\User;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),  // Menggunakan factory User
            'book_id' => Book::factory(),  // Menggunakan factory Book
            'transaction_type' => $this->faker->randomElement(['borrow', 'purchase']),
            'quantity' => $this->faker->numberBetween(1, 5),
            'transaction_date' => $this->faker->dateTime(),
            'shipping_address' => $this->faker->address,
            'shipping_status' => $this->faker->randomElement(['pending', 'shipped', 'delivered', 'canceled']),
            'due_date' => $this->faker->date(),
            'return_date' => $this->faker->date(),
            'fine' => $this->faker->randomFloat(2, 0, 100),
            'payment_status' => null,  // Status pembayaran belum ada
        ];
    }
}

