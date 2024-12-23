<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinestController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Psy\Command\HistoryCommand;

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/categoriesPage', [CategoriesController::class, 'index'])->name('categoriesPage');
// Route::get('/finest', [CategoriesController::class, 'index'])->name('categoriesPage');
Route::get('/categories', [BookController::class, 'index'])->name('categories');

// Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function() {
//     Route::resource('books', BookController::class);
// });
Route::get('/subscription/notice', function () {
    return view('subscription.notice'); // Pastikan Anda membuat view ini
})->name('subscription.notice');

// Route untuk login admin
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [BookController::class, 'dashboard'])->name('admin.dashboard');

    // Route untuk daftar buku
    Route::get('/books', [BookController::class, 'adminIndex'])->name('admin.index');

    // Route untuk form tambah buku
    Route::get('/books/create', [BookController::class, 'create'])->name('admin.create');
    Route::post('/books', [BookController::class, 'store'])->name('admin.store');

    // Route untuk form edit buku
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('admin.edit');
    Route::put('/books/{id}', [BookController::class, 'update'])->name('admin.update');

    // Route untuk hapus buku
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('admin.destroy');

    // Rute Kategori
    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
    Route::get('/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
    Route::put('/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::resource('categories', CategoryController::class);
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
Route::get('/fines', [FinestController::class, 'index'])->name('finestPage');
Route::get('/history', [TransactionController::class, 'index'])->name('historyPage')->middleware('auth');





require __DIR__.'/auth.php';
