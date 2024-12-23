@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-24 text-center">
        <h1 class="text-3xl font-bold text-green-600 mb-4">Payment Successful!</h1>
        <p class="text-gray-700">Thank you for your purchase. Your transaction has been completed successfully.</p>
        <a href="{{ route('dashboard') }}" class="mt-4 inline-block bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
            Back to Dashboard
        </a>
    </div>
@endsection
