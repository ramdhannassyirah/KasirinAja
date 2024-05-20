<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::resource('users', UserController::class)->middleware('auth');
Route::resource('barang',BarangController::class)->middleware('auth');
Route::resource('JenisBarang',JenisBarangController::class)->middleware('auth');



Route::resource('transaksi',TransaksiController::class)->middleware('auth');



Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

});
