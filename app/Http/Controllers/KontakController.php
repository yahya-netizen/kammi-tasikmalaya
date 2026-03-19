<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        return view('kontak.index');
    }

    public function kirim(Request $request)
    {
        $validated = $request->validate([
            'nama'   => 'required|string|max:255',
            'email'  => 'required|email|max:255',
            'no_hp'  => 'nullable|string|max:20',
            'subjek' => 'required|string|max:255',
            'pesan'  => 'required|string|max:2000',
        ]);

        Kontak::create($validated);

        return back()->with('success', 'Pesan kamu berhasil dikirim! Kami akan membalas secepatnya.');
    }
}