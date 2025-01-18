<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    // Menampilkan dashboard admin
    public function dashboard()
    {
        // Mengambil data yang dibutuhkan untuk dashboard
        $books = Book::all();
        $totalBooks = Book::count();
        $totalCategories = Category::count();
        $latestBooks = Book::latest()->take(5)->get();

        // Mengirim data ke view dashboard
        return view('admin.dashboard', compact('totalBooks', 'totalCategories', 'latestBooks', 'books'));
    }

    // Menampilkan daftar buku
    public function index(Request $request)
    {
        // Daftar kategori yang tersedia
        $categories = Category::all();

        // Mendapatkan kategori dan pencarian dari request
        $category = $request->category;
        $search = $request->search;

        // Filter buku berdasarkan kategori dan pencarian
        $books = Book::when($category, function ($query) use ($category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('name', $category);
            });
        })
            ->when($search, function ($query) use ($search) {
                return $query->where('title', 'like', "%{$search}%")
                    ->orWhere('author', 'like', "%{$search}%");
            })
            ->get();

        // Mengirim data ke view
        return view('categories', compact('books', 'categories'));
    }


    // Menampilkan detail buku
    // public function show($id)
    // {
    //     // Ambil data buku berdasarkan ID
    //     $book = Book::findOrFail($id);

    //     // Tampilkan halaman detail buku
    //     return view('product', compact('book'));
    // }

    // Menyimpan buku baru
    // Menampilkan form untuk membuat buku baru
    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function adminIndex()
    {
        $books = Book::all();

        return view('admin.index', compact('books'));
    }

    // Menyimpan buku baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'author' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,avif|max:2048',
            'image_url' => 'nullable|url', // Validasi URL
        ]);

        // Menyimpan gambar jika ada file yang di-upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public'); // Menyimpan di storage/app/public/images
        } elseif ($request->filled('image_url')) {
            // Menyimpan URL gambar jika ada URL yang diberikan
            $imagePath = $request->image_url;
        } else {
            $imagePath = null; // Jika tidak ada gambar atau URL
        }

        // Menyimpan data buku ke database
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id,
            'isbn' => $request->isbn,
            'stock' => $request->stock,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imagePath, // Menyimpan nama file
        ]);

        return redirect()->route('admin.index')->with('success', 'Book created successfully.');
    }


    // Menampilkan form untuk mengedit buku
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('book', 'categories'));
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

        return redirect()->route('admin.index')->with('success', 'Book updated successfully.');
    }

    // Menghapus buku
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('admin.index')->with('success', 'Book deleted successfully.');
    }
}
