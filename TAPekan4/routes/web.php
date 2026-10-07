<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/form', [LaporBanjirController::class, 'form'])
    ->name('lapor.form');

Route::post('/simpan', [LaporBanjirController::class, 'simpan'])
    ->name('lapor.simpan');

Route::get('/daftar-laporan', [LaporBanjirController::class, 'daftar'])
    ->name('lapor.daftar');