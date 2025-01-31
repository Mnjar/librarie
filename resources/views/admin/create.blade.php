<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Add New Book</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <a href="{{ route('admin.index') }}" class="text-white hover:text-blue-200">Back to Books List</a>
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-white hover:text-blue-200">Logout</button>
                </form>
            </div>
        </nav>

        <!-- Form Add Book -->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Add New Book</h2>
            <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Title</label>
                    <input type="text" name="title" id="title" class="w-full px-3 py-2 border rounded-lg @error('title') border-red-500 @enderror" value="{{ old('title') }}" required>
                    @error('title')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="author" class="block text-sm font-bold mb-2">Author</label>
                    <input type="text" name="author" id="author" class="w-full px-3 py-2 border rounded-lg @error('author') border-red-500 @enderror" value="{{ old('author') }}" required>
                    @error('author')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category_id" class="block text-sm font-bold mb-2">Category</label>
                    <select name="category_id" id="category_id" class="w-full px-3 py-2 border rounded-lg @error('category_id') border-red-500 @enderror" required>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="isbn" class="block text-sm font-bold mb-2">ISBN</label>
                    <input type="text" name="isbn" id="isbn" class="w-full px-3 py-2 border rounded-lg @error('isbn') border-red-500 @enderror" value="{{ old('isbn') }}" required>
                    @error('isbn')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="stock" class="block text-sm font-bold mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" class="w-full px-3 py-2 border rounded-lg @error('stock') border-red-500 @enderror" value="{{ old('stock') }}" required>
                    @error('stock')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="block text-sm font-bold mb-2">Price</label>
                    <input type="number" name="price" id="price" class="w-full px-3 py-2 border rounded-lg @error('price') border-red-500 @enderror" value="{{ old('price') }}">
                    @error('price')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-bold mb-2">Description</label>
                    <textarea name="description" id="description" class="w-full px-3 py-2 border rounded-lg @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="image" class="block text-sm font-bold mb-2">Book Image (Upload or URL)</label>
                    <input type="file" name="image" id="image" class="w-full px-3 py-2 border rounded-lg @error('image') border-red-500 @enderror" accept="image/*">
                    <div class="mt-2">
                        <label for="image_url" class="block text-sm font-bold mb-2">Or Enter Image URL</label>
                        <input type="text" name="image_url" id="image_url" class="w-full px-3 py-2 border rounded-lg" placeholder="https://example.com/image.jpg">
                    </div>
                    @error('image')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded-lg">Save Book</button>
            </form>
        </div>
    </div>

</body>
</html>
