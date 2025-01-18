<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Manage Books</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-white hover:text-blue-200">Admin Dashboard</a>
                <a href="{{ route('admin.create') }}" class="text-white hover:text-blue-200">Add New Book</a>
                <!-- Logout Form -->
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-white hover:text-blue-200">Logout</button>
                </form>
            </div>
        </nav>


        <!-- Books List -->
        <div class="p-6">
            <h2 class="text-2xl font-bold mb-4">Books List</h2>
            <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Image</th>
                        <th class="px-4 py-2 text-left">Title</th>
                        <th class="px-4 py-2 text-left">Author</th>
                        <th class="px-4 py-2 text-left">Category</th>
                        <th class="px-4 py-2 text-left">Stock</th>
                        <th class="px-4 py-2 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($books as $book)
                        <tr>
                            <!-- Display Book Image -->
                            <td class="px-4 py-2">
                                @if($book->image)
                                    @if (filter_var($book->image, FILTER_VALIDATE_URL))
                                        <!-- Jika image adalah URL eksternal -->
                                        <img src="{{ $book->image }}" alt="Book Image" class="w-16 h-16 object-cover rounded-md">
                                    @else
                                        <!-- Jika image adalah file lokal -->
                                        <img src="{{ Storage::url($book->image) }}" alt="Book Image" class="w-16 h-16 object-cover rounded-md">
                                    @endif
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                            </td>

                            <td class="px-4 py-2">{{ $book->title }}</td>
                            <td class="px-4 py-2">{{ $book->author }}</td>
                            <td class="px-4 py-2">{{ $book->category->name }}</td>
                            <td class="px-4 py-2">{{ $book->stock }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.edit', $book->id) }}" class="text-blue-600 hover:text-blue-800">Edit</a> |
                                <form action="{{ route('admin.destroy', $book->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
