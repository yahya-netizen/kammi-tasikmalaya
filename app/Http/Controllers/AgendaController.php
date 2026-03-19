<?php

namespace App\Http\Controllers;

use App\Models\Agenda;

class AgendaController extends Controller
{
    public function index()
    {
        $akanDatang = Agenda::where('status', 'akan_datang')
            ->orderBy('tanggal_mulai')
            ->get();

        $berlangsung = Agenda::where('status', 'berlangsung')
            ->orderBy('tanggal_mulai')
            ->get();

        $lewat = Agenda::where('status', 'selesai')
            ->orderBy('tanggal_mulai', 'desc')
            ->take(6)
            ->get();

        return view('agenda.index', compact('akanDatang', 'berlangsung', 'lewat'));
    }
}