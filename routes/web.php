<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AddressController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategoryController::class);
Route::resource('books', BookController::class);
// routes/web.php

Route::middleware(['auth'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
});



Route::middleware(['auth'])->group(function () {
    Route::get('/reservations', [ReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');

    // Pembaruan status manual oleh admin
    Route::patch('/reservations/{id}/status', [ReservationController::class, 'updateStatus'])->name('reservations.updateStatus');

    // Pembaruan status otomatis oleh sistem
    Route::get('/reservations/update-status-by-system', [ReservationController::class, 'updateStatusBySystem']);
});


Route::middleware(['auth'])->group(function () {
    Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
    Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
    Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
});

Route::post('/payment/create', [PaymentController::class, 'createTransaction']);
Route::post('/payment/notification', [PaymentController::class, 'notification']);



require __DIR__.'/auth.php';
