<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index()
    {
        return view('profil.index', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'name'           => 'required|string|max:255',
            'email'          => 'required|email|unique:users,email,' . Auth::id(),
            'no_hp'          => 'nullable|string|max:20',
            'tanggal_lahir'  => 'nullable|date',
            'alamat'         => 'nullable|string',
            'universitas'    => 'nullable|string|max:255',
            'fakultas'       => 'nullable|string|max:255',
            'jurusan'        => 'nullable|string|max:255',
        ]);

        Auth::user()->update($validated);

        return back()->with('success', 'Profil dan biodata berhasil diperbarui.');
    }
}
