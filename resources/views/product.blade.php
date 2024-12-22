@extends('layouts.main')

@section('content')
<div class="bg-gray-100 py-8 sm:ml-64 w-full md:mt-48 mt-11">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row -mx-4">
            <div class="md:flex-1 px-4">
                <div class="h-[460px] rounded-lg bg-gray-300">
                    <img class="w-full h-full object-cover rounded-lg" src="{{ $book->image}}" alt="Product Image">
                </div>
                <div class="flex -mx-2 mb-4 mt-5">
                    <div class="w-1/2 px-2">
                        <form action="{{ route('transactions.create') }}" method="GET">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <input type="hidden" name="transaction_type" value="purchase">
                            <button type="submit" class="w-full bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
                                Buy
                            </button>
                        </form>
                    </div>
                    <div class="w-1/2 px-2">
                        <form action="{{ route('transactions.create') }}" method="GET">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <input type="hidden" name="transaction_type" value="borrow">
                            <button type="submit" class="w-full bg-gray-200 text-gray-800 py-2 px-4 rounded-full font-bold hover:bg-gray-300">
                                Rent
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="md:flex-1 px-4">
                <h2 class="text-2xl font-bold text-gray-800  mb-2">{{ $book->title}}</h2>
                <p class="text-gray-600  text-sm mb-4">
                    {{ $book->author}}
                </p>
                <div class="flex mb-4">
                    <div class="mr-4">
                        <span class="font-bold text-gray-700 ">Price:</span>
                        <span class="text-gray-600 ">Rp.{{ $book->price}}</span>
                    </div>
                    <div>
                        <span class="font-bold text-gray-700 ">Stock:</span>
                        <span class="text-gray-600 ">{{ $book->stock}}</span>
                    </div>
                </div>
                <div>
                    <span class="font-bold text-gray-700">Product Description:</span>
                    <p class="text-gray-600 text-sm mt-2">
                        {{ $book->description}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
