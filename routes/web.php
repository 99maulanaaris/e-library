<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Laporan\LaporanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {

    Route::get('/', [HomeController::class, 'index']);
    Route::prefix('buku')->group(function () {

        Route::get('', [BookController::class, 'index'])->name('table.buku');
        Route::get('tambah', [BookController::class, 'tambah'])->name('add.buku');
        Route::post('tambah', [BookController::class, 'store']);
    });

    Route::prefix('user')->group(function () {
        Route::get('', [UserController::class, 'index'])->name('show.user');
        Route::get('/buku', [UserController::class, 'showBuku'])->name('user.book');
        Route::post('buku/{id}', [UserController::class, 'store']);
        Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
        Route::patch('profile/{id}', [UserController::class, 'update']);
    });

    Route::prefix('checkout')->group(function () {
        Route::get('', [CheckoutController::class, 'index'])->name('checkout.table');
        Route::post('loan/{id}', [CheckoutController::class, 'checkout'])->name('user.checkout');
        Route::put('/kembali/{id}', [CheckoutController::class, 'konfirmasi']);
    });

    Route::prefix('laporan')->group(function () {
        Route::get('', [LaporanController::class, 'laporan'])->name('table.laporan');
        Route::get('/pengembalian', [LaporanController::class, 'pengembalian'])->name('table.pengembalian');
        Route::get('user', [LaporanController::class, 'userLaporan'])->name('laporan.user');
    });

    Route::prefix('history')->group(function () {
        Route::get('', [HistoryController::class, 'index'])->name('history');
        Route::get('user', [HistoryController::class, 'userHistory'])->name('history.user');
    });

    Route::prefix('cetak')->group(function () {
        Route::get('', [CetakController::class, 'index'])->name('cetak.pdf');
        Route::get('download', [CetakController::class, 'download'])->name('download.pdf');
    });
});


Route::middleware('guest')->group(function () {

    Route::post('login', LoginController::class);
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('/register', [RegisterController::class, 'index'])->name('form.register');
    Route::post('register', RegisterController::class);
});
Route::post('/logout', LogoutController::class)->name('logout');
