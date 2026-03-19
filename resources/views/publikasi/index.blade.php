<x-publik>
    <x-slot name="title">Berita & Publikasi — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <svg style="position:absolute;left:-50px;bottom:20px;width:180px;opacity:.05;transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        
        <div class="page-header-inner fade-up">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <span class="current">Publikasi</span>
            </div>
            <h1 class="page-title">Berita & Publikasi</h1>
            <p class="page-subtitle">Informasi terkini, opini kader, laporan kegiatan, dan gagasan KAMMI Daerah Tasikmalaya untuk umat dan bangsa.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            {{-- FILTER BAR --}}
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:16px; padding:24px; margin-bottom:48px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <form method="GET" action="{{ route('publikasi.index') }}" style="display:grid; grid-template-columns: 2fr 1fr auto; gap:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:8px;">Pencarian</label>
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul artikel..." style="width:100%; border:1px solid #e5e7eb; border-radius:8px; padding:10px 14px; font-family:inherit; font-size:14px; color:var(--teks);">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:8px;">Tipe Artikel</label>
                        <select name="tipe" style="width:100%; border:1px solid #e5e7eb; border-radius:8px; padding:10px 14px; font-family:inherit; font-size:14px; color:var(--teks);">
                            <option value="">Semua Tipe</option>
                            <option value="berita"     @selected(request('tipe')==='berita')>Berita</option>
                            <option value="opini"      @selected(request('tipe')==='opini')>Opini</option>
                            <option value="laporan"    @selected(request('tipe')==='laporan')>Laporan</option>
                            <option value="pengumuman" @selected(request('tipe')==='pengumuman')>Pengumuman</option>
                        </select>
                    </div>
                    <div style="display:flex; align-items:flex-end; gap:8px;">
                        <button type="submit" class="btn-merah" style="height:44px;">Filter</button>
                        @if(request()->hasAny(['cari','tipe']))
                            <a href="{{ route('publikasi.index') }}" class="btn-outline" style="height:44px; border-color:#e5e7eb; color:#6b7280;">Reset</a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- LIST ARTIKEL --}}
            @if($publikasis->isEmpty())
                <div class="fade-up" style="text-align:center; padding:80px 24px; color:var(--teks-secondary); border:2px dashed #e5e7eb; border-radius:24px;">
                    <div style="font-size:3.5rem; margin-bottom:16px; opacity:0.3;">📰</div>
                    <h3 style="font-size:18px; font-weight:600; margin-bottom:8px;">Belum ada artikel ditemukan</h3>
                    <p style="font-size:15px;">Coba ubah kata kunci atau filter pencarian Anda.</p>
                </div>
            @else
                <div class="grid-3">
                    @foreach($publikasis as $i => $pub)
                    <a href="{{ route('publikasi.show', $pub->slug) }}" class="card-kammi fade-up delay-{{ ($i % 3) + 1 }}">
                        @if($pub->gambar)
                            <img src="{{ Storage::url($pub->gambar) }}" alt="{{ $pub->judul }}" class="card-img">
                        @else
                            <div class="card-img" style="display:flex; align-items:center; justify-content:center; font-size:48px; background:var(--krem); color:#d1d5db;">📰</div>
                        @endif
                        <div class="card-body">
                            <div style="display:flex; gap:8px; margin-bottom:12px;">
                                <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:var(--emas-muda); color:#92400e;">
                                    {{ ucfirst($pub->tipe) }}
                                </span>
                            </div>
                            
                            <h3 class="card-title">{{ Str::limit($pub->judul, 70) }}</h3>
                            <p class="card-desc">
                                {{ $pub->ringkasan ? Str::limit($pub->ringkasan, 100) : Str::limit(strip_tags($pub->konten), 100) }}
                            </p>
                            
                            <div class="card-footer">
                                <span style="display:flex; align-items:center; gap:6px;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                    {{ Str::limit($pub->user->name ?? 'Admin', 15) }}
                                </span>
                                <span style="font-size:11px;">
                                    {{ ($pub->published_at ?? $pub->created_at)->format('d M Y') }}
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div style="margin-top:48px; display:flex; justify-content:center;">
                    {{ $publikasis->links() }}
                </div>
            @endif

        </div>
    </div>

    <style>
        @media(max-width:900px){
            form { grid-template-columns: 1fr !important; }
            .grid-3 { grid-template-columns: 1fr; }
        }
    </style>
</x-publik>
