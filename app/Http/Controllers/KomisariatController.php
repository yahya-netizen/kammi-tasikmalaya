<?php

namespace App\Http\Controllers;

use App\Models\Komisariat;

class KomisariatController extends Controller
{
    public function index()
    {
        $komisariats = Komisariat::aktif()
            ->orderBy('nama')
            ->get();

        $totalKader = $komisariats->sum('jumlah_kader');

        return view('komisariat.index', compact('komisariats', 'totalKader'));
    }

    public function show(Komisariat $komisariat)
    {
        abort_if(!$komisariat->aktif, 404);

        return view('komisariat.show', compact('komisariat'));
    }
}