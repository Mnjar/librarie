@extends('layouts.main')

@section('content')
    <div class="flex-1 p-6 sm:ml-64 mt-12">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center p-2">
                <form action="{{ route('historyPage') }}" method="GET">
                    <input class="w-1/1 p-2 border border-gray-300 rounded" placeholder="{{ __('messages.search_placeholder') }}"
                        type="text" name="search" value="{{ old('search', $searchTerm) }}" />
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('messages.search') }}</button>
                </form>
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
