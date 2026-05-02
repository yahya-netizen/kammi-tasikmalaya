@extends('components.publik')

@section('title', 'Galeri - KAMMI Daerah Tasikmalaya')

@section('content')
<header class="page-header">
    <div class="page-header-inner">
        <div class="breadcrumb">
            <a href="{{ url('/') }}">Beranda</a>
            <span>/</span>
            <span class="current">Galeri</span>
        </div>
        <h1 class="page-title">Galeri Dokumentasi</h1>
        <p class="page-subtitle">Rekam jejak perjuangan dan aksi Kesatuan Aksi Mahasiswa Muslim Indonesia (KAMMI) Daerah Tasikmalaya.</p>
    </div>
</header>

<div class="section">
    <div class="section-inner">
        @if($galleries->count() > 0)
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:30px;">
            @foreach($galleries as $item)
            <div class="card-kammi">
                <div style="height:250px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Galeri KAMMI" class="card-img" style="height:100%; transition:transform .5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
                <div class="card-body" style="text-align:center;">
                    <p style="font-style:italic; font-size:14px; color:var(--teks-secondary); line-height:1.6;">
                        "{{ $item->keterangan ?? 'Dokumentasi KAMMI' }}"
                    </p>
                </div>
            </div>
            @endforeach
        </div>

        <div style="margin-top:50px;">
            {{ $galleries->links() }}
        </div>
        @else
        <div style="text-align:center; padding:100px 0; background:white; border-radius:20px; border:1px solid var(--border);">
            <div style="font-size:48px; margin-bottom:20px; opacity:0.3;">📸</div>
            <h3 class="font-serif" style="font-size:24px; color:var(--merah-tua);">Galeri Masih Kosong</h3>
            <p style="color:var(--teks-secondary); margin-top:10px;">Belum ada foto kegiatan yang diunggah.</p>
        </div>
        @endif
    </div>
</div>
@endsection
