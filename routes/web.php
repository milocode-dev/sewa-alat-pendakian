<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ItemController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/about', function () {
    return view('home.about');
})->name('about');

use App\Models\Item; // tambahkan import ini di bagian atas file

Route::get('/katalog', function () {
    $items = Item::with('category')->get();

    return view('katalog.index', compact('items'));
})->name('katalog');

Route::middleware(['auth', 'admin'])->get('/test-admin', fn () => 'Berhasil masuk sebagai admin!');

// Guest only (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Authenticated (siapa aja yang login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// Admin only
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('items', ItemController::class);
    Route::resource('categories', CategoryController::class);
});

// Transaksi only

Route::get('/transaction', [TransactionController::class, 'create'])
    ->name('transaction');
Route::middleware('auth')->group(function () {

    Route::get('/booking', [TransactionController::class, 'create'])
        ->name('transaction');

    Route::post('/booking', [TransactionController::class, 'store'])
        ->name('transaction.store');

});

Route::get('/admin/transactions', [TransactionController::class, 'index'])
    ->name('admin.transaction.index');

Route::get('/admin/transactions/{transaction}',
    [TransactionController::class, 'show'])
    ->name('admin.transaction.show');
