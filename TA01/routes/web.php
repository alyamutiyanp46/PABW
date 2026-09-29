<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanjirController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/lapor-banjir', [BanjirController::class, 'FormBanjir'])
    ->name('lapor.form');

Route::post('/lapor-banjir/proses', [BanjirController::class, 'LaporanBanjir'])
    ->name('lapor.proses');

Route::get('/daftar-laporan', [BanjirController::class, 'DaftarLaporan'])
    ->name('lapor.daftar');