<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanjirController;

Route::get('/lapor-banjir', [BanjirController::class, 'FormBanjir']);
Route::post('/lapor-banjir/proses', [BanjirController::class, 'LaporanBanjir']);