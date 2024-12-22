<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    public function run(): void
{
    // Tambahkan kategori
    $categories = [
        'Self-Help' => 'Books that inspire and guide personal development.',
        'Finance' => 'Books about personal finance and investing.',
        'Design' => 'Books focusing on graphic and product design.',
        'Communication' => 'Books about improving communication skills.',
    ];

    foreach ($categories as $name => $description) {
        Category::create([
            'name' => $name,
            'description' => $description,
        ]);
    }

    // Tambahkan buku
    $books = [
        [
            'title' => 'The Subtle Art of Not Giving a F*ck',
            'author' => 'Mark Manson',
            'category' => 'Self-Help',
            'isbn' => '9780062457714',
            'stock' => 10,
            'price' => 150000,
            'description' => 'A counterintuitive approach to living a good life.',
            'image' => 'https://storage.googleapis.com/a1aa/image/lEbKfmsHOjS6AiSdUMXZlo2jluTr1g93uE1Jy8unuonfLG7TA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'Happiness by Design',
            'author' => 'Paul Dolan',
            'category' => 'Self-Help',
            'isbn' => '9780241003107',
            'stock' => 8,
            'price' => 130000,
            'description' => 'Finding pleasure and purpose in everyday life.',
            'image' => 'https://storage.googleapis.com/a1aa/image/rnQCroonvf06AysWeKjbdq3B5GPHGkm02axB5uisHWZ8LG7TA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'Rich Dad Poor Dad',
            'author' => 'Robert Kiyosaki',
            'category' => 'Finance',
            'isbn' => '9781612680194',
            'stock' => 15,
            'price' => 180000,
            'description' => 'What the rich teach their kids about money.',
            'image' => 'https://storage.googleapis.com/a1aa/image/R57JqDx7LKb2HJqZeuLfyj45kpItNx3TJPflxToBby8wXM2nA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'A New Program for Graphic Design',
            'author' => 'David Reinfurt',
            'category' => 'Design',
            'isbn' => '9781907914604',
            'stock' => 5,
            'price' => 200000,
            'description' => 'A comprehensive guide to graphic design principles.',
            'image' => 'https://storage.googleapis.com/a1aa/image/nvvuiDaShRrgPhl9QrGhxmReiFTWQCPxJ6Mvcf8yyu0eXM2nA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'It Ends with Us',
            'author' => 'Colleen Hoover',
            'category' => 'Self-Help',
            'isbn' => '9781501110368',
            'stock' => 12,
            'price' => 140000,
            'description' => 'A heart-wrenching story of love and resilience.',
            'image' => 'https://storage.googleapis.com/a1aa/image/e5QkAMdbtfht80TeWt6ZSZfO1ky8THvq5lbb1qbkCvtRwYsPB.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'Design Thinking',
            'author' => 'Daniel Ling',
            'category' => 'Design',
            'isbn' => '9789810753543',
            'stock' => 7,
            'price' => 120000,
            'description' => 'A practical approach to innovative problem-solving.',
            'image' => 'https://storage.googleapis.com/a1aa/image/XF5mLVw8Wq7kGdocDWb21j6tHWeVR3jM5WqoOs56bd79Fj9JA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'Just My Type',
            'author' => 'Simon Garfield',
            'category' => 'Design',
            'isbn' => '9781592406524',
            'stock' => 6,
            'price' => 110000,
            'description' => 'A book about fonts and typography.',
            'image' => 'https://storage.googleapis.com/a1aa/image/yQUi6yuEgqKrD9wltjfabjvPEOIBKdYiXrcaqqI9eL55LG7TA.jpg',
            'rating' => 5,
        ],
        [
            'title' => 'How to Talk to Anyone',
            'author' => 'Leil Lowndes',
            'category' => 'Communication',
            'isbn' => '9780071418584',
            'stock' => 10,
            'price' => 100000,
            'description' => '92 little tricks for big success in relationships.',
            'image' => 'https://storage.googleapis.com/a1aa/image/hvjfM3MBPYyekExBf8PypfvnbyMf3WnTOehtjjx8ERF6AjxeJA.jpg',
            'rating' => 5,
        ],
    ];

    foreach ($books as $book) {
        $category = Category::where('name', $book['category'])->first();

        Book::create([
            'title' => $book['title'],
            'author' => $book['author'],
            'category_id' => $category->id,
            'isbn' => $book['isbn'],
            'stock' => $book['stock'],
            'price' => $book['price'],
            'description' => $book['description'],
            'image' => $book['image'],
        ]);
    }
}

}
