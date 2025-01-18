<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinestController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LocaleController;
use Illuminate\Support\Facades\Route;

// Grup middleware untuk lokalisasi
Route::middleware('localization')->group(function () {
    // Rute untuk home dan setLocale
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('locale/{lang}', [LocaleController::class, 'setLocale'])->name('locale');

    // Route untuk login admin
    Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

    // Grup middleware untuk admin
    Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
        Route::get('/dashboard', [BookController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/books', [BookController::class, 'adminIndex'])->name('admin.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('admin.create');
        Route::post('/books', [BookController::class, 'store'])->name('admin.store');
        Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.edit');
        Route::put('/books/{id}', [BookController::class, 'update'])->name('admin.update');
        Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('admin.destroy');

        Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });

    Route::get('/userdashboard', [DashboardController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/reservations/create', [ReservationController::class, 'create'])->name('reservations.create');
        Route::post('/reservations/store', [ReservationController::class, 'store'])->name('reservations.store');
        Route::post('/reservations/notification', [ReservationController::class, 'notificationHandler'])->name('reservations.notification');
        Route::get('/reservations/success', [ReservationController::class, 'success'])->name('reservations.success');
        Route::post('/reservations/success-update', [ReservationController::class, 'successUpdate']);

        Route::get('/fines', [FinestController::class, 'index'])->name('finesIndex');
        Route::post('/fines/pay', [FinestController::class, 'pay'])->name('fines.pay');
    });

    Route::get('/product/{id}', [ProductController::class, 'index'])->name('product');

    Route::middleware(['auth'])->group(function () {
        Route::get('/addresses', [AddressController::class, 'index'])->name('addresses.index');
        Route::get('/addresses/create', [AddressController::class, 'create'])->name('addresses.create');
        Route::post('/addresses', [AddressController::class, 'store'])->name('addresses.store');
    });

    Route::post('/payment/create', [PaymentController::class, 'createTransaction']);
    Route::post('/payment/notification', [PaymentController::class, 'notification']);

    Route::middleware(['auth'])->group(function () {
        Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
        Route::post('/transactions/store', [TransactionController::class, 'store'])->name('transactions.store');
        Route::get('/transactions/success', [TransactionController::class, 'success'])->name('transactions.success');
        Route::post('/transaction/notification', [TransactionController::class, 'notificationHandler']);
        Route::post('/transactions/success-update', [TransactionController::class, 'successUpdate']);
    });

    Route::get('/reservation', [ReservationController::class, 'index'])->name('reservationPage');
    Route::get('/history', [TransactionController::class, 'index'])->name('historyPage')->middleware('auth');
    Route::get('/categories', [BookController::class, 'index'])->name('categories');});


require_once __DIR__.'/auth.php';
