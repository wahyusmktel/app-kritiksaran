<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KritikSaranController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/kritik-saran/store', [KritikSaranController::class, 'store'])->name('kritik-saran.store');