<?php

namespace App\Http\Controllers;

use App\Models\Publikasi;
use Illuminate\Http\Request;

class PublikasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Publikasi::with('user')
            ->where('status', 'publikasi')
            ->latest('published_at');

        if ($request->filled('tipe')) {
            $query->where('tipe', $request->tipe);
        }

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $publikasis = $query->paginate(9)->withQueryString();

        return view('publikasi.index', compact('publikasis'));
    }

    public function show(string $slug)
    {
        $publikasi = Publikasi::with('user')
            ->where('slug', $slug)
            ->where('status', 'publikasi')
            ->firstOrFail();

        $terkait = Publikasi::where('status', 'publikasi')
            ->where('tipe', $publikasi->tipe)
            ->where('id', '!=', $publikasi->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('publikasi.show', compact('publikasi', 'terkait'));
    }
}
