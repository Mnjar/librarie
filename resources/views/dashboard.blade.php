@extends('layouts.main')

@section('dashboard')
    text-purple-600
@endsection

@section('content')
    <div class="flex-1 p-6 mt-12 sm:ml-64">
        <div class="flex justify-center md:justify-between flex-col md:flex-row items-center mb-6">
            <form id="searchForm" class="w-full md:w-1/2">
                <input class="w-full p-2 border border-gray-300 rounded" placeholder="Search your book" type="text"
                    name="search" value="{{ request('search') }}" />
            </form>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-4">Book List</h2>
            <div class="flex flex-wrap mb-6 justify-center md:justify-start">
                @forelse ($books as $book)
                    <a href="{{ route('product', $book->id) }}">
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
                    <p class="text-gray-500">No books found for "{{ request('search') }}"</p>
                @endforelse
            </div>
        </div>
        <div>
            <h2 class="text-xl font-bold mb-4">My Books</h2>
            <div class="flex flex-wrap justify-center md:justify-start mb-6">
                @foreach ($booksFromTransactions as $book)
                    <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow">
                        @if ($book->image)
                            @if (filter_var($book->image, FILTER_VALIDATE_URL))
                                <!-- Jika image adalah URL eksternal -->
                                <img src="{{ $book->image }}" alt="Book Image" class="w-full h-auto mb-2" height="150"
                                    width="100" />
                            @else
                                <!-- Jika image adalah file lokal -->
                                <img src="{{ Storage::url($book->image) }}" alt="Book Image" class="w-full h-auto mb-2"
                                    height="150" width="100" />
                            @endif
                        @else
                            <span class="text-gray-500">No Image</span>
                        @endif
                        {{-- <div class="max-w-44 m-5 bg-white p-4 rounded-lg shadow"> --}}
                        {{-- <img alt="It Ends with Us book cover" class="w-full h-auto mb-2" height="150"
                            src="{{ $book->image }}" width="100" /> --}}
                        <p class="text-sm">{{ $book->title }}</p>
                        <p class="text-xs text-gray-500">{{ $book->author }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
