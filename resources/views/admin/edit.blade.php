<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Edit Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <a href="{{ route('admin.index') }}" class="text-white hover:text-blue-200">Back to Books List</a>
                <a href="{{ route('logout') }}" class="text-white hover:text-blue-200">Logout</a>
            </div>
        </nav>

        <!-- Form Edit Book -->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Edit Book</h2>
            <form action="{{ route('admin.update', $book->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-lg" value="{{ $book->title }}" required>
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-bold mb-2">Author</label>
                    <input type="text" name="author" id="author" class="w-full px-3 py-2 border rounded-lg" value="{{ $book->author }}" required>
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-bold mb-2">Category</label>
                    <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-lg" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $book->category_id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="isbn" class="block text-sm font-bold mb-2">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="w-full px-3 py-2 border rounded-lg" value="{{ $book->isbn }}" required>
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-bold mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" class="w-full px-3 py-2 border rounded-lg" value="{{ $book->stock }}" required>
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-bold mb-2">Price</label>
                    <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-lg" value="{{ $book->price }}">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" class="w-full px-3 py-2 border rounded-lg">{{ $book->description }}</textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Update Book</button>
            </form>
        </div>
    </div>

</body>
</html>
