<?php
namespace App\Http\Controllers;
use App\Models\ProfilOrganisasi;

class TentangController extends Controller
{
    public function sejarah()  { return view('tentang.sejarah',   ['konten' => ProfilOrganisasi::firstOrNew(['kunci' => 'sejarah'])]); }
    public function visiMisi() { return view('tentang.visi-misi', ['konten' => ProfilOrganisasi::firstOrNew(['kunci' => 'visi_misi'])]); }
    public function mars()     { return view('tentang.mars',      ['konten' => ProfilOrganisasi::firstOrNew(['kunci' => 'mars'])]); }
    public function hymne()    { return view('tentang.hymne',     ['konten' => ProfilOrganisasi::firstOrNew(['kunci' => 'hymne'])]); }
}
