@extends('layouts.main')

@section('content')
    <div class="flex-1 p-6 sm:ml-64 mt-12">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center p-2">
                <input class="w-full p-2 border border-gray-300 rounded" placeholder="{{ __("messages.search_placeholder") }}" type="text" />
                <i class="fas fa-search text-gray-500">
                </i>
            </div>
            <div class="flex items-center space-x-4">
                {{-- <span class="text-gray-600">Thursday, 4 Desember 2024</span> --}}
            </div>
        </div>
        <div class="bg-white p-6 rounded shadow">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600">
                        <th class="pb-4">{{ __("messages.book") }}</th>
                        <th class="pb-4">{{ __("messages.trans_date") }}</th>
                        <th class="pb-4">{{ __("messages.trans") }}</th>
                        <th class="pb-4">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $transaction)
                    <tr class="border-t">
                        <td class="py-4 flex items-center">
                            @if ($transaction->book->image)
                                @if (filter_var($transaction->book->image, FILTER_VALIDATE_URL))
                                    <!-- Jika image adalah URL eksternal -->
                                    <img src="{{ $transaction->book->image }}" alt="Book Image" class="mr-2"
                                        height="150" width="100" />
                                @else
                                    <!-- Jika image adalah file lokal -->
                                    <img src="{{ Storage::url($transaction->book->image) }}" alt="Book Image" class=",r-2"
                                        height="150" width="100" />
                                @endif
                            @else
                                <span class="text-gray-500">No Image</span>
                            @endif
                            <div>
                                <div>
                                    {{$transaction->book->title}}
                                </div>
                                <div class="text-gray-500">
                                    {{$transaction->book->author}}
                                </div>
                            </div>
                        </td>
                        <td class="py-4">{{ $transaction->transaction_date}}</td>
                        <td class="py-4">{{ $transaction->transaction_type}}</td>
                        @if ($transaction->payment_status == 'paid')
                            <td class="py-4 text-green-500">{{ $transaction->payment_status}}</td>
                        @else
                            <td class="py-4 text-red-500">{{ $transaction->payment_status}}</td>
                        @endif
                    </tr>
                    @endforeach
            </table>
        </div>
    </div>
@endsection
