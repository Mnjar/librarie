@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-24 text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">{{ __("messages.payment_suc") }}</h1>
        <p class="text-gray-700">{{ __('messages.thanks_purch') }}</p>
        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
            {{ __("messages.back_dash") }}
        </a>
    </div>
@endsection
