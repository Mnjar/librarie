@extends('layouts.main')

@section('content')
<div class="bg-gray-100 py-8 sm:ml-64 w-full md:mt-48 mt-11">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Transaction Details</h2>

            <div class="flex flex-col md:flex-row -mx-4">
                <div class="md:w-1/3 px-4">
                    <img class="w-full h-64 object-cover rounded-lg" src="{{ $transaction->book->image }}" alt="Book Image">
                </div>
                <div class="md:w-2/3 px-4">
                    <h3 class="text-xl font-semibold text-gray-700">{{ $transaction->book->title }}</h3>
                    <p class="text-gray-600">Author: {{ $transaction->book->author }}</p>
                    <p class="text-gray-600 mt-2">Price: <span class="font-bold">Rp. {{ $transaction->book->price }}</span></p>
                    <p class="text-gray-600 mt-2">Transaction Type:
                        <span class="font-bold capitalize">{{ $transaction->transaction_type }}</span>
                    </p>
                    <p class="text-gray-600 mt-2">Transaction Date:
                        <span class="font-bold">{{ $transaction->transaction_date->format('d M Y') }}</span>
                    </p>

                    @if($transaction->transaction_type === 'borrow')
                        <p class="text-gray-600 mt-2">Return Due Date:
                            <span class="font-bold">{{ $transaction->due_date ? $transaction->due_date->format('d M Y') : 'N/A' }}</span>
                        </p>
                        <p class="text-gray-600 mt-2">Return Date:
                            <span class="font-bold">{{ $transaction->return_date ? $transaction->return_date->format('d M Y') : 'Not Returned' }}</span>
                        </p>
                    @endif

                    <p class="text-gray-600 mt-2">Payment Status:
                        <span class="font-bold">{{ ucfirst($transaction->payment_status) }}</span>
                    </p>
                </div>
            </div>

            @if($transaction->payment_status !== 'paid')
                <form action="{{ $transaction->payment_url }}" method="GET" class="mt-6">
                    <button type="submit" class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg font-bold hover:bg-purple-700">
                        Complete Payment
                    </button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
