<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/stok', [ProductController::class, 'index'])->name('stok');
Route::post('/stok', [ProductController::class, 'store'])->name('stok.store');
Route::put('/stok/{id}', [ProductController::class, 'update'])->name('stok.update');
Route::delete('/stok/{id}', [ProductController::class, 'destroy'])->name('stok.destroy');

Route::get('/kasir', [App\Http\Controllers\KasirController::class, 'index'])->name('kasir');
Route::post('/kasir/checkout', [App\Http\Controllers\KasirController::class, 'checkout'])->name('kasir.checkout');

Route::get('/sales', function () { return view('sales'); })->name('sales');

Route::get('/toko', function () {
    return view('toko');
})->name('toko');

Route::get('/pesanan-wa', function () { return view('pesanan-wa'); })->name('pesanan-wa');
Route::get('/pesanan-wa/{id}', function () { return view('pesanan-wa-detail'); })->name('pesanan-wa.detail');

Route::get('/stok-kritis', function () { return view('stok-kritis'); })->name('stok-kritis');

Route::get('/product/{id}', function () { return view('product-detail'); })->name('product.detail');
Route::get('/product/{id}/edit', function () { return view('product-edit'); })->name('product.edit');

Route::get('/forum', function () { return view('forum'); })->name('forum');
Route::get('/forum/{id}', function () { return view('forum-detail'); })->name('forum.detail');

Route::get('/pengaturan', function () { return view('pengaturan'); })->name('pengaturan');
