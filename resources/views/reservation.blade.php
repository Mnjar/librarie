@extends('layouts.main')

@section('content')
    <div class="flex-1 p-6 bg-gray-100 sm:ml-64 mt-12">
        <div class="flex justify-between items-center mb-6">
            <!-- Form pencarian -->
            <form action="{{ route('reservationPage') }}" method="GET">
                <input class="w-1/1 p-2 border border-gray-300 rounded" placeholder="{{ __('messages.search_placeholder') }}"
                    type="text" name="search" value="{{ old('search', $searchTerm) }}" />
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('messages.search') }}</button>
            </form>
        </div>
        <div class="bg-white p-4 rounded shadow">
            <table class="w-full">
                <thead>
                    <tr class="text-left text-gray-600">
                        <th class="py-2">{{ __('messages.book') }}</th>
                        <th class="py-2">{{ __('messages.reserve_date') }}</th>
                        <th class="py-2">{{ __('messages.return_date') }}</th>
                        <th class="py-2">{{ __('messages.reservation_status') }}</th>
                        <th class="py-2">{{ __('messages.price') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reservations as $reservation)
                        <tr class="border-t">
                            <td class="py-2 flex items-center">
                                @if ($reservation->book->image)
                                    @if (filter_var($reservation->book->image, FILTER_VALIDATE_URL))
                                        <!-- Jika image adalah URL eksternal -->
                                        <img src="{{ $reservation->book->image }}" alt="Book Image" class="mr-2"
                                            height="150" width="100" />
                                    @else
                                        <!-- Jika image adalah file lokal -->
                                        <img src="{{ Storage::url($reservation->book->image) }}" alt="Book Image"
                                            class=",r-2" height="150" width="100" />
                                    @endif
                                @else
                                    <span class="text-gray-500">No Image</span>
                                @endif
                                <div>
                                    <div class="font-bold">{{ $reservation->book->title }}</div>
                                    <div class="text-gray-500">{{ $reservation->book->author }}</div>
                                </div>
                            </td>
                            <td class="py-2">{{ $reservation->reservation_date->format('d-m-Y') }}</td>
                            <td class="py-2">{{ $reservation->return_date->format('d-m-Y') }}</td>
                            <td class="py-2">{{ $reservation->reservations_status}}</td>
                            <td class="py-2">Rp.{{ number_format($reservation->book->price * 0.25, 0, ',', '.') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
