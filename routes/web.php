<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('welcome');
});

// AUTH & ROLE CHECK
Route::get('/dashboard', function () {
    if (auth()->user()->role === 'admin') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('diagnosa.index');
    }
})->middleware(['auth'])->name('dashboard');

// ADMIN ROUTE - hanya untuk admin
Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// USER ROUTE - hanya untuk user biasa
Route::middleware(['auth'])->group(function () {
    // Diagnosa
    Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
    Route::post('/diagnosa/proses', [DiagnosaController::class, 'prosesDiagnosa'])->name('diagnosa.proses');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// admin menambah dan menampilkan gejala

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/admin/gejala', [AdminController::class, 'storeGejala'])->name('admin.storeGejala');
    Route::get('/admin/riwayat', [AdminController::class, 'riwayatDiagnosa'])->name('admin.riwayat');
});
