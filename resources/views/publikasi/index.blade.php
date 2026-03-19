<x-publik>
    <x-slot name="title">Berita & Publikasi — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }

        .filter-bar { background:white; border:1px solid #ede8e3; border-radius:14px; padding:18px 20px; margin-bottom:32px; }
        .filter-row { display:grid; grid-template-columns:1fr 1fr auto; gap:12px; }
        .filter-row input, .filter-row select { border:1px solid #e5e7eb; border-radius:8px; padding:9px 12px; font-size:13.5px; font-family:inherit; color:var(--teks); background:white; transition:border-color .2s; }
        .filter-row input:focus, .filter-row select:focus { outline:none; border-color:#c9a84c; }
        .btn-filter { background:var(--merah); color:white; border:none; border-radius:8px; padding:9px 20px; font-size:13.5px; font-weight:600; cursor:pointer; font-family:inherit; transition:background .2s; white-space:nowrap; }
        .btn-filter:hover { background:var(--merah-tua); }
        .btn-reset { background:#f3f4f6; color:#6b7280; border:none; border-radius:8px; padding:9px 14px; font-size:13.5px; font-weight:500; cursor:pointer; font-family:inherit; text-decoration:none; display:inline-flex; align-items:center; }

        .pub-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
        .pub-card { background:white; border:1px solid #ede8e3; border-radius:16px; overflow:hidden; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .pub-card:hover { transform:translateY(-4px); box-shadow:0 14px 36px rgba(44,24,16,.09); border-color:#f0dada; }
        .pub-thumb { width:100%; height:180px; object-fit:cover; background:#faf7f2; display:flex; align-items:center; justify-content:center; font-size:38px; }
        .pub-body { padding:20px; }
        .badge-tipe { font-size:10.5px; font-weight:600; padding:3px 11px; border-radius:100px; margin-bottom:11px; display:inline-block; }
        .tipe-berita     { background:#fdf2f2; color:#8b1a1a; }
        .tipe-opini      { background:#fef3c7; color:#92400e; }
        .tipe-laporan    { background:#f0fdf4; color:#166534; }
        .tipe-pengumuman { background:#eff6ff; color:#1d4ed8; }
        .pub-judul { font-family:'Playfair Display',serif; font-size:1rem; color:var(--merah-tua); margin-bottom:8px; line-height:1.45; }
        .pub-ringkasan { font-size:13px; color:#7a5050; line-height:1.65; margin-bottom:14px; }
        .pub-meta { font-size:12px; color:#9ca3af; display:flex; justify-content:space-between; border-top:1px solid #f5f0ed; padding-top:12px; margin-top:auto; }

        .empty { text-align:center; padding:72px 24px; color:#9ca3af; }
        .empty-icon { font-size:3.5rem; margin-bottom:14px; }

        @media(max-width:900px){
            .filter-row { grid-template-columns:1fr; }
            .pub-grid { grid-template-columns:1fr; }
        }
    </style>
    </x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-30px;top:10px;width:120px;opacity:.08;transform:rotate(15deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="breadcrumb-sep">›</span>
                <span>Berita & Publikasi</span>
            </div>
            <h1>Berita & Publikasi</h1>
            <p>Informasi terkini, opini kader, dan laporan kegiatan KAMMI Daerah Tasikmalaya</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- FILTER --}}
            <div class="filter-bar">
                <form method="GET" action="{{ route('publikasi.index') }}">
                    <div class="filter-row">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul artikel...">
                        <select name="tipe">
                            <option value="">Semua Tipe</option>
                            <option value="berita"     @selected(request('tipe')==='berita')>Berita</option>
                            <option value="opini"      @selected(request('tipe')==='opini')>Opini</option>
                            <option value="laporan"    @selected(request('tipe')==='laporan')>Laporan</option>
                            <option value="pengumuman" @selected(request('tipe')==='pengumuman')>Pengumuman</option>
                        </select>
                        <div style="display:flex;gap:8px;">
                            <button type="submit" class="btn-filter">Filter</button>
                            @if(request()->hasAny(['cari','tipe']))
                                <a href="{{ route('publikasi.index') }}" class="btn-reset">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            {{-- GRID --}}
            @if($publikasis->isEmpty())
                <div class="empty">
                    <div class="empty-icon">📰</div>
                    <p style="font-size:16px;font-weight:500;color:#6b7280;">Belum ada publikasi yang tersedia.</p>
                    <p style="font-size:14px;margin-top:6px;">Coba ubah filter pencarian.</p>
                </div>
            @else
                <div class="pub-grid">
                    @foreach($publikasis as $i => $pub)
                    <a href="{{ route('publikasi.show', $pub->slug) }}" class="pub-card fade-up delay-{{ ($i % 3) + 1 }}">
                        @if($pub->gambar)
                            <img src="{{ Storage::url($pub->gambar) }}" alt="{{ $pub->judul }}" class="pub-thumb" style="display:block;">
                        @else
                            <div class="pub-thumb">📰</div>
                        @endif
                        <div class="pub-body" style="display:flex;flex-direction:column;height:calc(100% - 180px);">
                            <span class="badge-tipe tipe-{{ $pub->tipe }}">{{ ucfirst($pub->tipe) }}</span>
                            <div class="pub-judul">{{ $pub->judul }}</div>
                            @if($pub->ringkasan)
                                <div class="pub-ringkasan">{{ Str::limit($pub->ringkasan, 110) }}</div>
                            @endif
                            <div class="pub-meta">
                                <span>{{ $pub->user->name ?? '—' }}</span>
                                <span>{{ ($pub->published_at ?? $pub->created_at)->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div style="margin-top:40px;">{{ $publikasis->links() }}</div>
            @endif

        </div>
    </div>
</x-publik>
