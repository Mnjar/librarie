@extends("layouts.main")

@section('content')
<div class="p-6 sm:ml-64 mt-10 h-auto w-full">
    <div class="flex justify-between items-center my-10">
        <form method="GET" action="{{ route('categories') }}">
            <input class="p-2 border rounded w-1/2" placeholder="Search your book" type="text" name="search" value="{{ request()->search }}"/>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Search</button>
        </form>
    </div>
    <div class="flex mb-6 flex-wrap">
        @foreach ($categories as $category)
            <a href="{{ route('categories', ['category' => $category->name]) }}">
                <button class="bg-white text-purple-600 px-4 py-2 border border-purple-600 rounded mr-2">{{ $category->name }}</button>
            </a>
        @endforeach
    </div>
    <div class="bg-white p-4 rounded shadow w-full">
        <table class="w-full">
            <thead>
                <tr class="text-sm text-gray-600">
                    <th class="py-2 text-center">Book</th>
                    <th class="py-2 text-center">Price</th>
                    <th class="py-2 text-center">Stock</th>
                    <th class="py-2 text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                    <tr class="border-b">
                        <td class="py-2 flex items-center">
                            @if ($book->image)
                                @if (filter_var($book->image, FILTER_VALIDATE_URL))
                                    <!-- Jika image adalah URL eksternal -->
                                    <img src="{{ $book->image }}" alt="Book Image" class="mr-2"
                                        height="150" width="100" />
                                @else
                                    <!-- Jika image adalah file lokal -->
                                    <img src="{{ Storage::url($book->image) }}" alt="Book Image" class=",r-2"
                                        height="150" width="100" />
                                @endif
                            @endif
                            <div>
                                <div>{{ $book->title }}</div>
                                <div class="text-sm text-gray-500">{{ $book->author }}</div>
                            </div>
                        </td>
                        <td class="py-2 text-center">Rp.{{ $book->price }}</td>
                        <td class="py-2 text-center">{{ $book->stock }}</td>
                        <td class="py-2 text-center">
                            <!-- Rent Button Form -->
                            <form action="{{ route('transactions.create') }}" method="GET" class="inline-block">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="transaction_type" value="borrow">
                                <button type="submit" class="text-orange-600 mx-5 border rounded-md border-orange-600 py-2 px-4">
                                    Rent
                                </button>
                            </form>

                            <!-- Buy Button Form -->
                            <form action="{{ route('transactions.create') }}" method="GET" class="inline-block">
                                @csrf
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <input type="hidden" name="transaction_type" value="purchase">
                                <button type="submit" class="text-green-600 mx-5 border rounded-md border-green-600 py-2 px-4">
                                    Buy
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="flex justify-center mt-4">
            <!-- Pagination buttons -->
        </div>
    </div>
</div>
@endsection
