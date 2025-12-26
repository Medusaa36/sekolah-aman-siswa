<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PengaduanController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('LandingPage.index');
// });

// BERANDA
Route::get('/', [LandingPageController::class, 'index'])->name('LandingPage.index');

// CEK STATUS
Route::get('/cek_status', [PengaduanController::class, 'cek_status'])->name('LandingPage.cek_status');

// PENGADUAN
Route::get('/form_pengaduan', [PengaduanController::class, 'index'])->name('LandingPage.form_pengaduan');
Route::get('/form_pengaduan-create', [PengaduanController::class, 'create'])->name('pengaduan.create');
Route::post('/pengaduan', [PengaduanController::class, 'store'])->name('pengaduan.store');

// API
Route::get('/api/sekolah', [PengaduanController::class, 'sekolah']);
Route::get('/api/kategori', [PengaduanController::class, 'kategori']);
