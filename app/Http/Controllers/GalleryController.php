<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;
use Artesaos\SEOTools\Facades\SEOTools;

class GalleryController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Galeri Kegiatan');
        SEOTools::setDescription('Dokumentasi kegiatan dan momentum perjuangan KAMMI Daerah Tasikmalaya dalam bingkai visual.');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');

        $galleries = Gallery::where('is_aktif', true)->latest()->paginate(12);
        return view('gallery.index', compact('galleries'));
    }
}
