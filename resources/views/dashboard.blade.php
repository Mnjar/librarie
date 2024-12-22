<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>
        Library Dashboard
    </title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&amp;display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100 flex">
    <!-- Sidebar -->
    <div class="bg-indigo-100 w-1/5 min-h-screen p-4">
        <div class="flex items-center mb-8">
            <img alt="" class="w-10 h-10 mr-2" height="40" src="{{ asset('assets/Logo.png')}}" width="40" />
            <h1 class="text-xl font-bold text-indigo-600">Librarie</h1>
        </div>
        <nav>
            <ul>
                <li class="mb-4 flex items-center text-orange-500">
                    <i class="fas fa-tachometer-alt mr-2"></i>
                    <a href="dashboard.html">Dashboard</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-th-large mr-2"></i>
                    <a href="category.html">Categories</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-heart mr-2"></i>
                    <a href="favorite.html">Favourites</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-star mr-2"></i>
                    <a href="finest.html">Finest</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-calendar-alt mr-2"></i>
                    <a href="reservetion.html">Reservation</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-history mr-2"></i>
                    <a href="history.html">History</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-cog mr-2"></i>
                    <a href="setting.html">Settings</a>
                </li>
                <li class="mb-4 flex items-center text-gray-600">
                    <i class="fas fa-sign-out-alt mr-2"></i>
                    <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="bg-transparent border-0 cursor-pointer text-gray-600">
                            Logout
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
    </div>
    <!-- Main Content -->
    <div class="flex-1 p-6">
        <div class="flex justify-between items-center mb-6">
            <input class="w-1/2 p-2 border border-gray-300 rounded" placeholder="Search your book" type="text" />
        </div>
        <div>
            <h2 class="text-xl font-bold mb-4">Popular</h2>
            <div class="flex space-x-4 mb-6">
                @foreach ($books as $book)
                    <div class="w-1/5">
                        <img alt="{{ $book->title }} book cover" class="w-full h-auto mb-2" height="150" src="{{ $book->image }}" width="100" />
                        <p class="text-sm">{{ $book->title }}<br />{{ $book->author }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-4">My Books</h2>
            <div class="flex space-x-4 mb-6">
                @foreach ($booksFromTransactions as $book)
                    <div class="w-1/4 bg-white p-4 rounded-lg shadow">
                        <img alt="{{ $book->title }} book cover" class="w-full h-auto mb-2" height="150" src="{{ $book->image }}" width="100" />
                        <p class="text-sm">{{ $book->title }}<br />{{ $book->author }}</p>
                        <p class="text-sm">{{ $book->pages }} Pages</p>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- Right Sidebar -->
<div class="bg-white w-1/4 min-h-screen p-6">
    <div class="flex items-center mb-6">
        <img alt="User Avatar" class="w-10 h-10 rounded-full mr-2" height="40" src="" width="40" />
        <div>
            <p class="text-sm font-bold">{{ $user->name }}</p>
            <p class="text-xs text-gray-500">Books this week</p>
            <div class="flex items-center">
                {{-- <span class="text-sm font-bold text-blue-600">{{ $user->books->count() }}/5</span> --}}
                <i class="fas fa-book-open text-blue-600 ml-2"></i>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
