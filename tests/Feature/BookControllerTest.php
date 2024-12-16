<?php

namespace Tests\Feature;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class BookControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function create_book()
    {
        $category = Category::factory()->create();

        $response = $this->post('/books', [
            'title' => 'New Book',
            'author' => 'John Doe',
            'category_id' => $category->id,
            'isbn' => '1234567890123',
            'stock' => 10,
            'price' => 100.00,
            'description' => 'A new book description.',
        ]);

        $response->assertRedirect('/books');  // Pastikan redirect ke /books
        $this->assertDatabaseHas('books', [
            'title' => 'New Book',
            'author' => 'John Doe',
        ]);
    }

    #[Test]
    public function update_book()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id]);

        $response = $this->put('/books/' . $book->id, [
            'title' => 'Updated Book',
            'author' => 'Jane Doe',
            'category_id' => $category->id,
            'isbn' => '1234567890123',
            'stock' => 20,
            'price' => 120.00,
            'description' => 'Updated description.',
        ]);

        $response->assertRedirect('/books');  // Pastikan redirect ke /books
        $this->assertDatabaseHas('books', [
            'title' => 'Updated Book',
            'author' => 'Jane Doe',
        ]);
    }

    #[Test]
    public function delete_book()
    {
        $category = Category::factory()->create();
        $book = Book::factory()->create(['category_id' => $category->id]);

        $response = $this->delete('/books/' . $book->id);

        $response->assertRedirect('/books');  // Pastikan redirect ke /books
        $this->assertDatabaseMissing('books', [
            'id' => $book->id,
        ]);
    }
}
