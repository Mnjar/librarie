@extends('layouts.main')

@section('content')
<div class="bg-gray-100 py-8 sm:ml-64 w-full md:mt-48 mt-11">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Transaction Confirmation</h2>

            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:w-1/3 px-4">
                    <img class="w-full h-64 object-cover rounded-lg" src="{{ $book->image }}" alt="Book Image">
                </div>
                <div class="md:w-2/3 px-4">
                    <h3 class="text-xl font-semibold text-gray-700">{{ $book->title }}</h3>
                    <p class="text-gray-600">Author: {{ $book->author }}</p>
                    <p class="text-gray-600 mt-2">Price: <span class="font-bold">Rp. {{ $book->price }}</span></p>
                    <p class="text-gray-600 mt-2">Transaction Type:
                        <span class="font-bold capitalize">{{ $transaction_type }}</span>
                    </p>

                    @if($transaction_type === 'borrow')
                        <p class="text-gray-600 mt-2">Return Due Date:
                            <span class="font-bold">{{ now()->addDays(7)->format('d M Y') }}</span>
                        </p>
                    @endif
                </div>
            </div>

            <form action="{{ $payment_url }}" method="GET" class="mt-6">
                <button type="submit" class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg font-bold hover:bg-purple-700">
                    Proceed to Payment
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
