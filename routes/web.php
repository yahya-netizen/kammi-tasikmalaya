<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\IsuDaerahController;
use App\Http\Controllers\KaderisasiController;
use App\Http\Controllers\KomisariatController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BkmController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\Auth\GoogleController;

use App\Http\Controllers\GalleryController;

// -----------------------------------------------
// HALAMAN PUBLIK
// -----------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home');

// Galeri
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');

// Berita
Route::get('/publikasi', [PublikasiController::class, 'index'])->name('publikasi.index');
Route::get('/publikasi/{slug}', [PublikasiController::class, 'show'])->name('publikasi.show');

// Isu Daerah
Route::get('/isu-daerah', [IsuDaerahController::class, 'index'])->name('isu-daerah.index');
Route::get('/isu-daerah/{isuDaerah}', [IsuDaerahController::class, 'show'])->name('isu-daerah.show');

// Kaderisasi
Route::get('/kaderisasi', [KaderisasiController::class, 'index'])->name('kaderisasi.index');
Route::get('/kaderisasi/{daurahMarhalah}/daftar', [KaderisasiController::class, 'daftar'])->name('kaderisasi.daftar');
Route::post('/kaderisasi/{daurahMarhalah}/daftar', [KaderisasiController::class, 'simpan'])->name('kaderisasi.simpan');

// Komisariat
Route::get('/komisariat', [KomisariatController::class, 'index'])->name('komisariat.index');
Route::get('/komisariat/{komisariat}', [KomisariatController::class, 'show'])->name('komisariat.show');

// Agenda
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

// BKM
Route::get('/bkm', [BkmController::class, 'index'])->name('bkm.index');
Route::post('/bkm/daftar', [BkmController::class, 'daftar'])->name('bkm.daftar');

// Tentang KAMMI
Route::get('/tentang/sejarah',   [TentangController::class, 'sejarah'])->name('tentang.sejarah');
Route::get('/tentang/visi-misi', [TentangController::class, 'visiMisi'])->name('tentang.visi-misi');
Route::get('/tentang/mars',      [TentangController::class, 'mars'])->name('tentang.mars');
Route::get('/tentang/hymne',     [TentangController::class, 'hymne'])->name('tentang.hymne');

// Kontak
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak.index');
Route::post('/kontak', [KontakController::class, 'kirim'])->name('kontak.kirim');

// -----------------------------------------------
// GOOGLE OAUTH
// -----------------------------------------------
Route::get('/auth/google',          [GoogleController::class, 'redirect'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'callback'])->name('auth.google.callback');

// -----------------------------------------------
// PROFIL & DASHBOARD USER (harus login)
// -----------------------------------------------
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profil',    [ProfilController::class, 'index'])->name('profil.index');
    Route::patch('/profil',  [ProfilController::class, 'update'])->name('profil.update');
    Route::delete('/profil', [ProfilController::class, 'destroy'])->name('profil.destroy');
});

// -----------------------------------------------
// AUTH BAWAAN LARAVEL
// -----------------------------------------------
require __DIR__.'/auth.php';
