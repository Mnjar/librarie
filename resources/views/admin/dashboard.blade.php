<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-blue-600 text-white p-4">
            <div class="flex justify-between items-center">
                <h1 class="text-xl font-bold">Admin Dashboard</h1>
                <a href="{{ route('admin.index') }}" class="text-white hover:text-blue-200">Manage Books</a>
                <a href="{{ route('admin.categories.index') }}" class="text-white hover:text-blue-200">Manage Categories</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-white hover:text-blue-200">
                        Log Out
                    </button>
                </form>
            </div>
        </nav>

        <!-- Dashboard Content -->
        <div class="flex-grow p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Books Stats -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Total Books</h2>
                    <p class="text-2xl">{{ $totalBooks }}</p>
                </div>

                <!-- Categories Stats -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Total Categories</h2>
                    <p class="text-2xl">{{ $totalCategories }}</p>
                </div>

                <!-- Latest Books -->
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-xl font-bold mb-4">Latest Books</h2>
                    <ul>
                        @foreach($latestBooks as $book)
                            <li>{{ $book->title }} by {{ $book->author }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
