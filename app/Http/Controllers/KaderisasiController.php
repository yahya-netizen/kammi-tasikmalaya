<?php

namespace App\Http\Controllers;

use App\Models\DaurahMarhalah;
use App\Models\PendaftaranDm;
use Illuminate\Http\Request;

class KaderisasiController extends Controller
{
    public function index()
    {
        $daurahList = DaurahMarhalah::whereIn('status', ['akan_datang', 'berlangsung'])
            ->orderBy('tanggal_mulai')
            ->get()
            ->groupBy('level');

        return view('kaderisasi.index', compact('daurahList'));
    }

    public function daftar(DaurahMarhalah $daurahMarhalah)
    {
        $terisi    = $daurahMarhalah->pendaftarans()->whereNotIn('status', ['ditolak'])->count();
        $sisaKuota = $daurahMarhalah->kuota - $terisi;

        return view('kaderisasi.daftar', compact('daurahMarhalah', 'sisaKuota'));
    }

    public function simpan(Request $request, DaurahMarhalah $daurahMarhalah)
    {
        $validated = $request->validate([
            'nama_lengkap'  => 'required|string|max:255',
            'nim'           => 'required|string|max:50',
            'email'         => 'required|email|max:255',
            'no_hp'         => 'required|string|max:20',
            'komisariat'    => 'required|string|max:255',
            'kampus'        => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:ikhwan,akhwat',
        ]);

        // Cek prasyarat DM2 harus lulus DM1
        if ($daurahMarhalah->level === 'DM2') {
            $lulus = PendaftaranDm::where('email', $validated['email'])
                ->whereHas('daurahMarhalah', fn($q) => $q->where('level', 'DM1'))
                ->where('status', 'diterima')->exists();

            if (!$lulus) {
                return back()->withErrors(['email' => 'Pendaftaran DM II memerlukan kelulusan DM I.'])->withInput();
            }
        }

        // Cek prasyarat DM3 harus lulus DM2
        if ($daurahMarhalah->level === 'DM3') {
            $lulus = PendaftaranDm::where('email', $validated['email'])
                ->whereHas('daurahMarhalah', fn($q) => $q->where('level', 'DM2'))
                ->where('status', 'diterima')->exists();

            if (!$lulus) {
                return back()->withErrors(['email' => 'Pendaftaran DM III memerlukan kelulusan DM II.'])->withInput();
            }
        }

        PendaftaranDm::create([
            ...$validated,
            'daurah_marhalah_id' => $daurahMarhalah->id,
            'status'             => 'menunggu',
        ]);

        return redirect()->route('kaderisasi.index')
            ->with('success', 'Pendaftaran berhasil! Panitia akan menghubungi kamu segera.');
    }
}