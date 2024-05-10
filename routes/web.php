<?php

use Illuminate\Support\Facades\Route;
 

Route::get('/', function () {
    return view('index');
});

Route::get('/data-user', function () {
    return view('admin.user.list');
})->name('data-user');

Route::get('/data-barang', function () {
    return view('admin.barang.barang');
})->name('barang');

Route::get('/detail-barang', function () {
    return view('admin.jenisBarang.detail');
})->name('detailBarang');






