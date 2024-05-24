<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\DetailTransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::resource('users', UserController::class)->middleware('auth');
Route::resource('barang',BarangController::class)->middleware('auth');
Route::resource('JenisBarang',JenisBarangController::class)->middleware('auth');
Route::resource('transaksi', TransaksiController::class)->middleware('auth');


Route::get('/dashboard', function () { return view('dashboard');})->middleware(['auth'])->name('dashboard');
