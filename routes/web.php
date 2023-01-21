<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckInController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\PemesananTiketController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// auth
Route::get('/login', [AuthController::class, 'getLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'doLogin'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'doLogout'])->middleware('auth');

// pages
Route::get('/dashboard', [PagesController::class, 'getIndex'])->middleware('auth');

// tiket
Route::resource('tiket', TiketController::class)->middleware('auth');

// pemesanan tiket
Route::get('/', [PemesananTiketController::class, 'index']);
Route::post('/', [PemesananTiketController::class, 'store'])->name('pemesanan-tiket.store');
Route::get('/pesan-tiket/{kode_tiket}', [PemesananTiketController::class, 'show']);
Route::group(['prefix' => 'pemesanan-tiket', 'middleware' => 'auth'], function() {
    Route::get('/', [PemesananTiketController::class, 'indexAdmin'])->name('pemesanan-tiket.index');
});
Route::resource('pemesanan-tiket', PemesananTiketController::class)->except('index', 'show', 'store')->middleware('auth');

// check in
Route::group(['prefix' => 'check-in', 'middleware' => 'auth'], function() {
    Route::get('/', [CheckInController::class, 'index'])->name('check-in.index');
    Route::post('/', [CheckInController::class, 'store'])->name('check-in.store');
    Route::get('/detail', [CheckInController::class, 'show'])->name('check-in.show');
});

// laporan
Route::group(['prefix' => 'laporan', 'middleware' => 'auth'], function() {
    Route::get('/', [LaporanController::class, 'index'])->name('laporan.index');
});