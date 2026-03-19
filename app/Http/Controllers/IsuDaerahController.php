<?php

namespace App\Http\Controllers;

use App\Models\IsuDaerah;
use Illuminate\Http\Request;

class IsuDaerahController extends Controller
{
    public function index(Request $request)
    {
        $query = IsuDaerah::with('user')
            ->whereIn('status', ['aktif', 'selesai'])
            ->latest();

        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        if ($request->filled('urgensi')) {
            $query->where('urgensi', $request->urgensi);
        }

        if ($request->filled('cari')) {
            $query->where('judul', 'like', '%' . $request->cari . '%');
        }

        $isuDaerahs = $query->paginate(9)->withQueryString();

        $featured = IsuDaerah::where('status', 'aktif')
            ->where('featured', true)
            ->latest()
            ->take(3)
            ->get();

        return view('isu-daerah.index', compact('isuDaerahs', 'featured'));
    }

    public function show(IsuDaerah $isuDaerah)
    {
        abort_if($isuDaerah->status === 'arsip', 404);

        $isuTerkait = IsuDaerah::with('user')
            ->whereIn('status', ['aktif', 'selesai'])
            ->where('kategori', $isuDaerah->kategori)
            ->where('id', '!=', $isuDaerah->id)
            ->latest()
            ->take(3)
            ->get();

        return view('isu-daerah.show', compact('isuDaerah', 'isuTerkait'));
    }
}
