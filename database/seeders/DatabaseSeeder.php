<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Membuat kategori dan buku
        Category::factory(5)->create(); // Membuat 5 kategori
        Book::factory(10)->create(); // Membuat 10 buku
    }
}
