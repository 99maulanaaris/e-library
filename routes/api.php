<?php

use App\Http\Controllers\API\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [UserController::class, 'fetch']);
    Route::post('user', [UserController::class, 'updateProfile']);
    Route::post('user/photo', [UserController::class, 'uploadPhoto']);
    Route::post('logout', [UserController::class, 'logout']);
    Route::post('loan', [UserController::class, 'pinjamBuku']);
    Route::post('checkout', [UserController::class, 'kembali']);
    Route::get('check', [UserController::class, 'returnBook']);
    Route::get('telat', [UserController::class, 'telat']);
    Route::get('check-return', [UserController::class, 'jumlahKembali']);
    Route::get('check-pinjam', [UserController::class, 'jumlahPinjaman']);
    Route::get('loan', [UserController::class, 'pinjaman']);
});

Route::post('login', [UserController::class, 'login']);
Route::post('register', [UserController::class, 'register']);
Route::get('book', [UserController::class, 'fetchBook']);
