<?php

namespace App\Http\Controllers;

use App\Models\IsuDaerah;
use App\Models\Publikasi;
use App\Models\PendaftaranDm;

class HomeController extends Controller
{
    public function index()
    {
        // FR-01: 5 publikasi terbaru (berita + opini)
        $publikasiTerbaru = Publikasi::with('user')
            ->where('status', 'publikasi')
            ->latest('published_at')
            ->take(5)
            ->get();

        // FR-01: Isu daerah featured yang sedang diadvokasi (maks 3)
        $isuFeatured = IsuDaerah::with('user')
            ->where('status', 'aktif')
            ->where('featured', true)
            ->latest()
            ->take(3)
            ->get();

        // Statistik organisasi (FR-01)
        $totalKader = PendaftaranDm::distinct('nama_lengkap')->count('nama_lengkap');

        return view('welcome', compact(
            'publikasiTerbaru',
            'isuFeatured',
            'totalKader'
        ));
    }
}
