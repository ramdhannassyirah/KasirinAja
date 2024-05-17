<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::resource('users', UserController::class)->middleware('auth');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

 

    Route::get('/jenisBarang', function () {
        return view('admin.jenisBarang.list');
    })->name('jenisBarang');

    Route::get('/barang', function () {
        return view('admin.barang.barang');
    })->name('barang');

    Route::get('/detailBarang', function () {
        return view('admin.jenisBarang.detail');
    })->name('detailBarang');

    Route::get('/transaksi', function () {
        return view('kasir.transaksi.list');
    })->name('transaksi');
});
