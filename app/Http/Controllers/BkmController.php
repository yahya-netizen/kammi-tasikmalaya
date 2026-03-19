<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class BkmController extends Controller
{
    public function index()
    {
        return view('bkm.index');
    }

    public function daftar(Request $request)
    {
        $validated = $request->validate([
            'nama'      => 'required|string|max:255',
            'email'     => 'required|email|max:255',
            'no_hp'     => 'required|string|max:20',
            'kampus'    => 'required|string|max:255',
            'komisariat'=> 'required|string|max:255',
            'pesan'     => 'nullable|string|max:500',
        ]);

        Kontak::create([
            'nama'    => $validated['nama'],
            'email'   => $validated['email'],
            'no_hp'   => $validated['no_hp'],
            'subjek'  => 'Pendaftaran BKM — ' . $validated['kampus'],
            'pesan'   => "Komisariat: {$validated['komisariat']}\n\n" . ($validated['pesan'] ?? '-'),
            'status'  => 'baru',
        ]);

        return back()->with('success', 'Pendaftaran BKM berhasil! Koordinator BKM akan segera menghubungi kamu.');
    }
}