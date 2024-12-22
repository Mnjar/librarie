@extends('layouts.main')

@section('content')
<div class="max-w-2xl mx-auto mt-24">
    <h2 class="text-2xl font-bold mb-4">Confirm Your Transaction</h2>
    <form id="paymentForm" action="{{ route('transactions.store') }}" method="POST">
        @csrf
        <input type="hidden" name="book_id" value="{{ $book->id }}">
        <input type="hidden" name="transaction_type" value="{{ $request->transaction_type }}">

        <div class="mb-4">
            <label for="quantity" class="block text-gray-700">Quantity</label>
            <input type="number" name="quantity" id="quantity" value="1" min="1" class="w-full p-2 border rounded">
        </div>

        <p><strong>Total Price:</strong> Rp.{{ $book->price * old('quantity', 1) }}</p>

        <!-- Pilihan alamat pengiriman -->
        <div class="mb-4">
            <label for="shipping_address" class="block text-gray-700">Shipping Address</label>
            <select name="shipping_address" id="shipping_address" class="w-full p-2 border rounded">
                @foreach(Auth::user()->address as $address)
                    <option value="{{ $address->id }}">{{ $address->address }}</option>
                @endforeach
            </select>
        </div>

        <button type="button" id="pay-button" class="w-full bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
            Proceed to Payment
        </button>
    </form>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script>
    document.getElementById('pay-button').onclick = function() {
        // Kirim permintaan ke backend untuk mendapatkan Snap Token
        fetch('{{ route('transactions.store') }}', {
            method: 'POST',
            body: new FormData(document.getElementById('paymentForm'))
        })
        .then(response => response.json())
        .then(data => {
            // Gunakan Snap JS untuk memulai pembayaran
            snap.pay(data.snap_token, {
                onSuccess: function(result) {
                    alert('Payment Success');
                    // Update status pembayaran di sini
                },
                onPending: function(result) {
                    alert('Payment Pending');
                    // Update status pembayaran di sini
                },
                onError: function(result) {
                    alert('Payment Failed');
                    // Update status pembayaran di sini
                }
            });
        })
        .catch(error => {
            alert('Payment failed to initiate');
            console.error(error);
        });
    };
</script>
@endsection
