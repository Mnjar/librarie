<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
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
                <a href="{{ route('admin.categories.index') }}" class="text-white hover:text-blue-200">Manage
                    Categories</a>
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
                        @foreach ($latestBooks as $book)
                            <li>{{ $book->title }} by {{ $book->author }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="flex-grow p-6">
            <div>
                <h2 class="text-xl font-bold mb-4">{{ __('messages.book_list') }}</h2>
                <div class="flex flex-wrap mb-6 justify-center md:justify-start">
                    @forelse ($books as $book)
                        <a href="{{ route('admin.index', $book->id) }}">
                            <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
                                @if ($book->image)
                                    @if (filter_var($book->image, FILTER_VALIDATE_URL))
                                        <!-- Jika image adalah URL eksternal -->
                                        <img src="{{ $book->image }}" alt="Book Image" class="w-full h-auto mb-2"
                                            height="150" width="100" />
                                    @else
                                        <!-- Jika image adalah file lokal -->
                                        <img src="{{ Storage::url($book->image) }}" alt="Book Image" class="w-full h-auto mb-2"
                                            height="150" width="100" />
                                    @endif
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                                <p class="text-sm">{{ $book->title }}</p>
                                <p class="text-xs text-gray-500">{{ $book->author }}</p>
                            </div>
                        </a>
                    @empty
                        <p class="text-gray-500">No books found</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>

</body>

</html>
