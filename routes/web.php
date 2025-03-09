<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KritikSaranController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminKritikSaranController;

Route::get('/', [HomeController::class, 'index']);
Route::post('/kritik-saran/store', [KritikSaranController::class, 'store'])->name('kritik-saran.store');

Route::prefix('admin')->group(function () {
    Route::get('login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('login', [AdminAuthController::class, 'login'])->name('admin.login.submit');
    Route::post('logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

    Route::middleware('role:super_admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('kritik-saran', [AdminKritikSaranController::class, 'index'])->name('admin.kritik-saran.index');
        Route::get('kritik-saran/{id}', [AdminKritikSaranController::class, 'show'])->name('admin.kritik-saran.show');
        Route::delete('kritik-saran/{id}', [AdminKritikSaranController::class, 'destroy'])->name('admin.kritik-saran.destroy');
        Route::post('kritik-saran/{id}/tanggapan', [AdminKritikSaranController::class, 'storeTanggapan'])->name('admin.kritik-saran.tanggapan.store');
    });
});