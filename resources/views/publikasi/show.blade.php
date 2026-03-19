<x-publik>
    <x-slot name="title">{{ $publikasi->judul }} — KAMMI Daerah Tasikmalaya</x-slot>
    <x-slot name="description">{{ Str::limit($publikasi->ringkasan ?? strip_tags($publikasi->isi), 160) }}</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:900px; margin:0 auto; }

        .artikel { background:white; border-radius:20px; overflow:hidden; border:1px solid #ede8e3; }
        .artikel-img { width:100%; max-height:400px; object-fit:cover; }
        .artikel-body { padding:40px 44px; }
        .badge-tipe { font-size:11px; font-weight:600; padding:4px 12px; border-radius:100px; margin-bottom:16px; display:inline-block; }
        .tipe-berita     { background:#fdf2f2; color:#8b1a1a; }
        .tipe-opini      { background:#fef3c7; color:#92400e; }
        .tipe-laporan    { background:#f0fdf4; color:#166534; }
        .tipe-pengumuman { background:#eff6ff; color:#1d4ed8; }
        .artikel-judul { font-family:'Playfair Display',serif; font-size:clamp(1.5rem,2.5vw,2.1rem); color:var(--merah-tua); line-height:1.3; margin-bottom:16px; }
        .artikel-meta { display:flex; align-items:center; gap:16px; font-size:13px; color:#9ca3af; padding-bottom:20px; border-bottom:1px solid #f5f0ed; margin-bottom:24px; flex-wrap:wrap; }
        .artikel-ringkasan { background:#fdf2f2; border-left:4px solid var(--merah); border-radius:0 10px 10px 0; padding:18px 22px; margin-bottom:28px; font-size:15px; color:#5c0f0f; line-height:1.8; font-weight:500; }
        .artikel-isi { font-size:15.5px; line-height:1.95; color:#3d2020; }
        .artikel-isi h2 { font-family:'Playfair Display',serif; font-size:1.35rem; color:var(--merah-tua); margin:28px 0 12px; }
        .artikel-isi h3 { font-size:1.1rem; font-weight:600; color:var(--merah-tua); margin:22px 0 10px; }
        .artikel-isi p  { margin-bottom:16px; }
        .artikel-isi ul, .artikel-isi ol { margin:12px 0 16px 24px; }
        .artikel-isi li { margin-bottom:6px; }
        .artikel-isi blockquote { border-left:4px solid var(--emas); padding:12px 20px; margin:20px 0; background:#fdf6e3; border-radius:0 8px 8px 0; font-style:italic; color:#5c3d0a; }
        .artikel-isi img { max-width:100%; border-radius:10px; margin:16px 0; }

        /* Bagikan */
        .bagikan { margin-top:28px; padding-top:22px; border-top:1px solid #f5f0ed; display:flex; align-items:center; gap:12px; flex-wrap:wrap; }
        .bagikan-lbl { font-size:13px; font-weight:600; color:#6b7280; }
        .share-btn { display:inline-flex; align-items:center; gap:7px; font-size:13px; font-weight:600; padding:8px 16px; border-radius:8px; text-decoration:none; transition:all .2s; }
        .share-wa  { background:#25d366; color:white; }
        .share-wa:hover  { background:#1db855; }
        .share-tw  { background:#1da1f2; color:white; }
        .share-tw:hover  { background:#0d8fe0; }
        .share-cp  { background:#f3f4f6; color:#374151; border:none; cursor:pointer; font-family:inherit; }
        .share-cp:hover  { background:#e5e7eb; }

        /* Terkait */
        .terkait { margin-top:48px; }
        .terkait-title { font-family:'Playfair Display',serif; font-size:1.2rem; color:var(--merah-tua); margin-bottom:20px; }
        .terkait-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .terkait-card { background:white; border:1px solid #ede8e3; border-radius:14px; padding:18px; text-decoration:none; color:inherit; display:block; transition:all .2s; }
        .terkait-card:hover { border-color:#f0dada; transform:translateY(-2px); box-shadow:0 8px 20px rgba(44,24,16,.07); }
        .terkait-judul { font-size:14px; font-weight:600; color:var(--merah-tua); margin-bottom:6px; line-height:1.4; margin-top:8px; }
        .terkait-meta  { font-size:11.5px; color:#9ca3af; margin-top:8px; }

        @media(max-width:900px){
            .artikel-body { padding:24px 20px; }
            .terkait-grid { grid-template-columns:1fr; }
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
                <a href="{{ route('publikasi.index') }}">Berita & Publikasi</a>
                <span class="breadcrumb-sep">›</span>
                <span>{{ Str::limit($publikasi->judul, 40) }}</span>
            </div>
            <h1>{{ Str::limit($publikasi->judul, 60) }}</h1>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            <div class="artikel fade-up">
                @if($publikasi->gambar)
                    <img src="{{ Storage::url($publikasi->gambar) }}" alt="{{ $publikasi->judul }}" class="artikel-img">
                @endif

                <div class="artikel-body">
                    <span class="badge-tipe tipe-{{ $publikasi->tipe }}">{{ ucfirst($publikasi->tipe) }}</span>
                    <h1 class="artikel-judul">{{ $publikasi->judul }}</h1>
                    <div class="artikel-meta">
                        <span>Penulis: <strong>{{ $publikasi->user->name ?? '—' }}</strong></span>
                        <span>{{ ($publikasi->published_at ?? $publikasi->created_at)->format('d F Y') }}</span>
                    </div>

                    @if($publikasi->ringkasan)
                        <div class="artikel-ringkasan">{{ $publikasi->ringkasan }}</div>
                    @endif

                    <div class="artikel-isi">{!! $publikasi->isi !!}</div>

                    {{-- Bagikan (FR-06) --}}
                    <div class="bagikan">
                        <span class="bagikan-lbl">Bagikan:</span>
                        <a href="https://wa.me/?text={{ urlencode($publikasi->judul . ' ' . request()->url()) }}"
                           target="_blank" class="share-btn share-wa">
                            <svg width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($publikasi->judul) }}&url={{ urlencode(request()->url()) }}"
                           target="_blank" class="share-btn share-tw">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Twitter/X
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>alert('Link disalin!'))" class="share-btn share-cp">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"/></svg>
                            Salin Link
                        </button>
                    </div>
                </div>
            </div>

            {{-- ARTIKEL TERKAIT --}}
            @if($terkait->isNotEmpty())
            <div class="terkait fade-up">
                <div class="terkait-title">Publikasi Terkait</div>
                <div class="terkait-grid">
                    @foreach($terkait as $pub)
                    <a href="{{ route('publikasi.show', $pub->slug) }}" class="terkait-card">
                        <span class="badge-tipe tipe-{{ $pub->tipe }}" style="font-size:10px;padding:2px 9px;">{{ ucfirst($pub->tipe) }}</span>
                        <div class="terkait-judul">{{ Str::limit($pub->judul, 70) }}</div>
                        <div class="terkait-meta">{{ ($pub->published_at ?? $pub->created_at)->format('d M Y') }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</x-publik>
