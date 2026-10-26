<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\BanjirController;

Route::get('/', function () { //endpoint root awal, manggil ke folder view welcome.blade.php
    return view('welcome');
})->name('home.page');
   
Route::get('/home', function () { //manggil ke  folder view home.blade.php
    return view('home');
});

Route::get('/coba', [CobaController::class, 'index']); //endpoint /coba manggil ke controller CobaController method index

Route::get('/final', [CobaController::class, 'index2']);

Route::get('/hello', function () { //langsung nampilin teks tanpa view
    return 'Hello, Alya Mutiya Ningsih Pertiwi';
});

Route::get('/user/{name}', function ($name) { //route parameter, {name} bisa diganti langsung di halaman search web sesuai nama yang diinginkan, nyari parameter yang datanya langsung diambil dari url, misal /user/alyamutiya maka $name = alyamutiya atau dari database, dan bisa juga diambil dari form inputan user
    return "Nama Saya $name"; 
});

Route::get('/greet/{name?}', function ($name = 'Guest') { //route parameter opsional, {name?} bisa diganti langsung di halaman search web sesuai nama yang diinginkan, nyari parameter yang datanya langsung diambil dari url, misal /greet/alyamutiya maka $name = alyamutiya atau dari database, dan bisa juga diambil dari form inputan user, jika tidak ada parameter maka akan menampilkan default value 'Guest'
    return "Halo $name"; 
});

Route::get('/about', function () { //manggil ke  folder view about.blade.php
    return view('about', ['name' => 'Alya Mutiya Ningsih Pertiwi']);
});

Route::get('/profile/{name?}', function ($name = 'Guest') { //route parameter opsional, {name?} bisa diganti langsung di halaman search web sesuai nama yang diinginkan, nyari parameter yang datanya langsung diambil dari url, misal /profile/alyamutiya maka $name = alyamutiya atau dari database, dan bisa juga diambil dari form inputan user, jika tidak ada parameter maka akan menampilkan default value 'Guest'
    return view('profile', ['name' => $name]); //manggil ke  folder view profile.blade.php
});

Route::get('/home', function () { //langsung nampilin teks tanpa view
    return 'Halo, Ini adalah halaman home'; //endpoint /home manggil ke controller CobaController method index
})->name('home.page'); 

Route::get('/form', [DataController::class, 'form']);

Route::post('/proses', [DataController::class, 'proses']);

Route::get('/form2', [MahasiswaController::class, 'form2']);
Route::post('/output', [MahasiswaController::class, 'output']);



Route::get('/lapor-banjir', [BanjirController::class, 'FormBanjir']);
Route::post('/lapor-banjir/proses', [BanjirController::class, 'LaporanBanjir']);