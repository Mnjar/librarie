@extends('layouts.main')

@section('content')
    <div class="flex-1 p-6 sm:ml-64 mt-11">
        @if ($totalFine <= 0)
            <div class="bg-white p-6 rounded-lg shadow">
                <p class="text-lg text-green-600">{{ __('messages.no_fines') }}</p>
            </div>
        @else
            <div class="bg-white p-6 rounded-lg shadow">
                <table class="w-full">
                    <thead>
                        <tr class="text-left text-gray-600">
                            <th class="pb-4">{{ __('messages.book') }}</th>
                            <th class="pb-4">{{ __('messages.return_date') }}</th>
                            <th class="pb-4">{{ __('messages.late') }}</th>
                            <th class="pb-4">{{ __('messages.charge') }}</th>
                            <th class="pb-4">{{ __('messages.action') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $reservation)
                            <tr class="border-t">
                                <td class="py-4 flex items-center">
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
                                        <div class="font-semibold">{{ $reservation->book->title }}</div>
                                        <div class="text-sm text-gray-500">{{ $reservation->book->author }}</div>
                                    </div>
                                </td>
                                <td class="py-4">{{ $reservation->return_date->format('d-m-Y') }}</td>
                                <td class="py-4">
                                    @php
                                        $lateDays = now()->diffInDays($reservation->return_date, false);
                                        $lateText = $lateDays > 3 ? $lateDays - 3 . 'd' : '0d';
                                        echo $lateText;
                                    @endphp
                                </td>
                                <td class="py-4">
                                    @php
                                        $fineAmount = $reservation->calculateFine();
                                        echo $fineAmount > 0 ? 'Rp.' . number_format($fineAmount, 0, ',', '.') : '-';
                                    @endphp
                                </td>
                                <td class="py-4">
                                    <input class="mr-2" type="checkbox" name="fine_ids[]"
                                        value="{{ $reservation->fine->id }}" />
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div>
                <div>
                    <p class="text-lg text-purple-600 my-4">Total : Rp.{{ number_format($totalFine, 0, ',', '.') }}</p>
                    <form action="{{ route('fines.pay') }}" method="POST">
                        @csrf
                        <button
                            class="border-purple-600 border rounded-md text-purple-600 hover:text-white hover:bg-purple-600 w-16">
                            <p class="p-3">{{ __('messages.pay') }}</p>
                        </button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
