<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\KasirMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::get('/404',function(){
    return view('404');
});
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cetakTransaksi/{no_transaksi}', [TransaksiController::class, 'cetakTransaksi'])->name('cetakTransaksi')->middleware(KasirMiddleware::class);

Route::resource('users', UserController::class)->middleware(AdminMiddleware::class);
Route::resource('barang',BarangController::class)->middleware(AdminMiddleware::class);
Route::resource('JenisBarang',JenisBarangController::class)->middleware(AdminMiddleware::class);
Route::resource('transaksi', TransaksiController::class)->middleware(KasirMiddleware::class);
