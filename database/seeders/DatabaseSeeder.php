<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            BookSeeder::class,
            UserSeeder::class,
            TransactionSeeder::class,
            ReservationSeeder::class,
        ]);
    }
}
