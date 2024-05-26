<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/cetakTransaksi/{no_transaksi}', [TransaksiController::class, 'cetakTransaksi'])->name('cetakTransaksi');

Route::resource('users', UserController::class);
Route::resource('barang',BarangController::class);
Route::resource('JenisBarang',JenisBarangController::class);
Route::resource('transaksi', TransaksiController::class);
