<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MonitoringController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
    })->name('home');

Route::get('/tentang', function () {
    return view('tentang');
    })->name('tentang');   

Route::get('/monitoring', [MonitoringController::class, 'form'])->name('monitoring.form');

Route::post('/hasil-monitoring', [MonitoringController::class, 'prosesData'])->name('monitoring.proses');

Route::get('/riwayat', [MonitoringController::class, 'riwayat'])->name('monitoring.riwayat');