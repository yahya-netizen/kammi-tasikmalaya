<x-publik>
    <x-slot name="title">Visi & Misi KAMMI Tasikmalaya</x-slot>
    <div class="page-header">
        <div class="page-header-inner">
            <div class="breadcrumb"><a href="/">Beranda</a><span class="breadcrumb-sep">›</span><span>Tentang</span><span class="breadcrumb-sep">›</span><span>Visi & Misi</span></div>
            <h1>{{ $konten->judul ?? 'Visi & Misi KAMMI' }}</h1>
        </div>
    </div>
    <div style="padding:56px 2.5rem;max-width:900px;margin:0 auto;">
        @if($konten->konten)
            <div class="fade-up" style="background:white;border-radius:16px;padding:40px;border:1px solid #ede8e3;font-size:15.5px;line-height:1.9;color:#3d2020;">{!! $konten->konten !!}</div>
        @else
            <div style="text-align:center;padding:80px 24px;color:#9ca3af;">
                <div style="font-size:3rem;margin-bottom:16px;">🎯</div>
                <p style="font-size:16px;">Konten visi misi belum diisi. Tambahkan melalui dashboard admin.</p>
                @auth @if(auth()->user()->role === 'admin' || auth()->user()->role === 'super_admin')
                    <a href="/admin/profil-organisasis/create" style="display:inline-flex;margin-top:16px;background:#8b1a1a;color:white;padding:10px 22px;border-radius:8px;font-weight:600;text-decoration:none;">+ Tambah Konten</a>
                @endif @endauth
            </div>
        @endif
    </div>
</x-publik>
