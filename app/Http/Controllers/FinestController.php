<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Midtrans\Snap;
use Midtrans\Config;

class FinestController extends Controller
{
    public function index()
    {
        // Ambil semua reservasi yang terlambat dan hitung dendanya
        $reservations = Reservation::with('book')
            ->whereHas('fine', function ($query) {
                $query->where('status', 'unpaid');
            })
            ->get();

        $totalFine = $reservations->sum(function ($reservation) {
            return $reservation->calculateFine();
        });

        return view('fines.index', compact('reservations', 'totalFine'));
    }

    public function pay(Request $request)
    {
        $fineIds = $request->input('fine_ids'); // ID denda yang dipilih untuk dibayar
        $totalAmount = Fine::whereIn('id', $fineIds)->sum('amount');

        // Set konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Data pembayaran
        $transaction = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $totalAmount,
            ],
            'item_details' => [
                [
                    'id' => 'fine_payment',
                    'name' => 'Denda Buku',
                    'price' => $totalAmount,
                    'quantity' => 1,
                ],
            ],
        ];

        // Membuat pembayaran
        $paymentUrl = Snap::createTransaction($transaction)->redirect_url;

        // Setelah pembayaran berhasil, update status denda menjadi 'paid'
        Fine::whereIn('id', $fineIds)->update(['status' => 'paid']);

        return redirect()->view('fines.index')->with('success', 'Pembayaran denda berhasil.');
    }
}
