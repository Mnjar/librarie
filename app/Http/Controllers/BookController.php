<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan daftar buku
    public function index()
    {
        return Book::all();
    }

    // Menampilkan detail buku
    public function show($id)
    {
        // Ambil data buku berdasarkan ID
        $book = Book::findOrFail($id);

        // Tampilkan halaman detail buku
        return view('product', compact('book'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'required|string|unique:books,isbn',
            'stock' => 'required|integer',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        $book = Book::create($request->all());

        return redirect()->route('books.index');
    }

    // Mengupdate data buku
    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'isbn' => 'required|string|unique:books,isbn,' . $book->id,
            'stock' => 'required|integer',
            'price' => 'nullable|numeric',
            'description' => 'nullable|string',
        ]);

        $book->update($request->all());

        return redirect()->route('books.index');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }
}
