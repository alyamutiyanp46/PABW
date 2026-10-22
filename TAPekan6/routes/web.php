<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporBanjirController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;

Route::get('/', function () {
    return redirect()->route('lapor.form');
});

Route::get('/form', [LaporBanjirController::class, 'form'])
    ->name('lapor.form');

Route::post('/simpan', [LaporBanjirController::class, 'simpan'])
    ->name('lapor.simpan');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/daftar-laporan', [LaporBanjirController::class, 'daftar'])
        ->name('lapor.daftar');

    Route::get('/profil', [LoginController::class, 'profil'])
        ->name('profil');

    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');
});