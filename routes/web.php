<?php

// =====================================================
// Tambahkan / ganti isi routes/web.php dengan ini
// =====================================================

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IsuDaerahController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\KaderisasiController;
use App\Http\Controllers\KomisariatController;

// -----------------------------------------------
// HALAMAN PUBLIK — tidak perlu login
// -----------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/{slug}', [PublikasiController::class, 'show'])->name('publikasi.show');

Route::get('/isu-daerah', [IsuDaerahController::class, 'index'])->name('isu-daerah.index');
Route::get('/isu-daerah/{isuDaerah}', [IsuDaerahController::class, 'show'])->name('isu-daerah.show');

Route::get('/kaderisasi', [KaderisasiController::class, 'index'])->name('kaderisasi.index');
Route::get('/kaderisasi/{daurahMarhalah}/daftar', [KaderisasiController::class, 'daftar'])->name('kaderisasi.daftar');
Route::post('/kaderisasi/{daurahMarhalah}/daftar', [KaderisasiController::class, 'simpan'])->name('kaderisasi.simpan');

Route::get('/komisariat', [KomisariatController::class, 'index'])->name('komisariat.index');
Route::get('/komisariat/{komisariat}', [KomisariatController::class, 'show'])->name('komisariat.show');
// -----------------------------------------------
// AUTH ROUTES (bawaan Laravel)
// -----------------------------------------------
require __DIR__.'/auth.php';