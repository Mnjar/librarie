@extends('layouts.main')

@section('content')
    <div class="max-w-2xl mx-auto mt-24">
        <h2 class="text-2xl font-bold mb-4">{{ __('messages.confirm_trans') }}</h2>
        <form id="paymentForm" action="{{ route('reservations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="book_id" value="{{ $book->id }}">
            <input type="hidden" name="transaction_type" value="{{ $request->transaction_type }}">
            <div class="mb-4">
                <label for="reservation_date" class="block text-gray-700">Reservation Date</label>
                <input type="date" name="reservation_date" id="reservation_date"
                    class="w-full p-2 border rounded" required>
            </div>

            <p><strong>Total Price:</strong> Rp.<span id="total-price">{{ $book->price * 0.25 }}</span></p>

            <!-- Pilihan alamat pengiriman -->
            <div class="mb-4">
                <label for="shipping_address" class="block text-gray-700">{{ __("messages.ship_add") }}</label>
                <select name="shipping_address" id="shipping_address" class="w-full p-2 border rounded">
                    @foreach (Auth::user()->address as $address)
                        <option value="{{ $address->id }}">{{ $address->address }}</option>
                    @endforeach
                </select>
            </div>

            <button type="button" id="pay-button"
                class="w-full bg-purple-600 text-white py-2 px-4 rounded-full font-bold hover:bg-gray-800">
                {{ __('messages.proceed') }}
            </button>
        </form>

    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script>
        // Set tanggal minimum input untuk reservation_date
        const today = new Date();
        const day = String(today.getDate()).padStart(2, '0');
        const month = String(today.getMonth() + 1).padStart(2, '0'); // Bulan mulai dari 0
        const year = today.getFullYear();
        const minDate = `${year}-${month}-${day}`;

        document.getElementById('reservation_date').setAttribute('min', minDate);

        document.getElementById('pay-button').onclick = function() {
            // Kirim permintaan ke backend untuk mendapatkan Snap Token
            fetch('{{ route('reservations.store') }}', {
                    method: 'POST',
                    body: new FormData(document.getElementById('paymentForm'))
                })
                .then(response => response.json())
                .then(data => {
                    // Gunakan Snap JS untuk memulai pembayaran
                    snap.pay(data.snap_token, {
                        onSuccess: function(result) {
                            // Kirim permintaan ke backend untuk memperbarui stok
                            fetch('/reservations/success-update', {
                                method: 'POST',
                                headers: {
                                    'Content-Type': 'application/json',
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                },
                                body: JSON.stringify({
                                    transaction_id: result.order_id
                                })
                            })
                            .then(response => response.json())
                            .then(data => {
                                alert('Payment Success');
                                window.location.href = '/reservations/success';
                            })
                            .catch(error => {
                                console.error('Error updating stock:', error);
                                alert('Payment success, but failed to update stock.');
                            });
                        },
                        onPending: function(result) {
                            alert('Payment Pending');
                            window.location.href = '/reservations/pending';
                        },
                        onError: function(result) {
                            alert('Payment Failed');
                            window.location.href = '/reservations/failed';
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
