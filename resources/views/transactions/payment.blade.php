@extends('layouts.main')

@section('content')
<div class="bg-gray-100 py-8 sm:ml-64 w-full md:mt-48 mt-11">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Payment</h2>
        <p>Total Price: <strong>Rp. {{ number_format($totalPrice, 0, ',', '.') }}</strong></p>
        <button id="pay-button" class="w-full bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
            Pay Now
        </button>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('pay-button').addEventListener('click', function () {
        snap.pay('{{ $snapToken }}');
    });
</script>
@endsection
