<x-publik>
    <x-slot name="title">Agenda & Kalender — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }

        .sec-label { display:inline-flex; align-items:center; gap:8px; font-size:11px; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:var(--merah); margin-bottom:10px; }
        .sec-label::before { content:''; width:18px; height:2px; background:var(--emas); border-radius:2px; display:block; }
        .sec-title { font-family:'Playfair Display',serif; font-size:clamp(1.5rem,2vw,2rem); color:var(--merah-tua); margin-bottom:28px; }

        /* Berlangsung */
        .berlangsung-grid { display:grid; grid-template-columns:repeat(2,1fr); gap:18px; margin-bottom:56px; }
        .berlangsung-card { background:var(--merah-tua); border-radius:16px; padding:26px 28px; position:relative; overflow:hidden; }
        .berlangsung-card::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .berlangsung-badge { display:inline-flex; align-items:center; gap:6px; background:rgba(34,197,94,.2); border:1px solid rgba(34,197,94,.4); color:#86efac; font-size:11px; font-weight:600; padding:3px 12px; border-radius:100px; margin-bottom:12px; position:relative; z-index:1; }
        .berlangsung-badge::before { content:''; width:6px; height:6px; background:#4ade80; border-radius:50%; animation:pulse 1.5s infinite; }
        @keyframes pulse { 0%,100%{opacity:1} 50%{opacity:.4} }
        .berlangsung-judul { font-family:'Playfair Display',serif; font-size:1.15rem; color:#fff9f0; margin-bottom:10px; position:relative; z-index:1; }
        .berlangsung-meta { display:flex; gap:14px; flex-wrap:wrap; position:relative; z-index:1; }
        .berlangsung-meta span { font-size:12.5px; color:rgba(255,249,240,.6); display:flex; align-items:center; gap:5px; }

        /* Akan Datang */
        .agenda-list { display:flex; flex-direction:column; gap:16px; margin-bottom:56px; }
        .agenda-item { display:grid; grid-template-columns:80px 1fr auto; gap:20px; align-items:center; background:white; border:1px solid #ede8e3; border-radius:14px; padding:20px 24px; transition:all .2s; }
        .agenda-item:hover { border-color:#f0dada; box-shadow:0 6px 20px rgba(44,24,16,.07); transform:translateX(4px); }
        .agenda-tgl { text-align:center; background:var(--merah-muda); border-radius:10px; padding:10px 6px; }
        .agenda-tgl-angka { font-family:'Playfair Display',serif; font-size:1.5rem; color:var(--merah-tua); font-weight:700; line-height:1; }
        .agenda-tgl-bln { font-size:10.5px; color:#9ca3af; margin-top:3px; }
        .agenda-tgl-thn { font-size:10px; color:#c4b5b5; }
        .agenda-info {}
        .agenda-judul { font-weight:600; font-size:15px; color:var(--merah-tua); margin-bottom:7px; }
        .agenda-meta { display:flex; gap:14px; flex-wrap:wrap; }
        .agenda-meta span { font-size:12.5px; color:#9ca3af; display:flex; align-items:center; gap:5px; }
        .badge-kat { font-size:10.5px; font-weight:600; padding:2px 10px; border-radius:100px; }
        .kat-daerah     { background:#fdf2f2; color:#8b1a1a; }
        .kat-komisariat { background:#fef3c7; color:#92400e; }
        .kat-kaderisasi { background:#f0fdf4; color:#166534; }
        .kat-advokasi   { background:#fdf2f2; color:#7c3aed; }
        .kat-bkm        { background:#fce7f3; color:#be185d; }
        .kat-lainnya    { background:#f3f4f6; color:#6b7280; }
        .countdown { text-align:right; }
        .countdown-num { font-family:'Playfair Display',serif; font-size:1.3rem; color:var(--merah-tua); font-weight:700; }
        .countdown-lbl { font-size:10.5px; color:#9ca3af; }

        /* Lewat */
        .lewat-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .lewat-card { background:white; border:1px solid #ede8e3; border-radius:12px; padding:18px 20px; opacity:.75; transition:opacity .2s; }
        .lewat-card:hover { opacity:1; }
        .lewat-tgl { font-size:11.5px; color:#9ca3af; margin-bottom:6px; }
        .lewat-judul { font-size:14px; font-weight:600; color:#5c3030; margin-bottom:6px; line-height:1.4; }
        .lewat-lokasi { font-size:12px; color:#9ca3af; display:flex; align-items:center; gap:5px; }

        .empty { text-align:center; padding:40px; color:#9ca3af; border:1px dashed #e5e7eb; border-radius:14px; }

        @media(max-width:900px){
            .berlangsung-grid { grid-template-columns:1fr; }
            .agenda-item { grid-template-columns:1fr; }
            .agenda-tgl, .countdown { display:none; }
            .lewat-grid { grid-template-columns:1fr; }
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
                <span>Agenda</span>
            </div>
            <h1>Agenda & Kalender</h1>
            <p>Jadwal kegiatan KAMMI Daerah Tasikmalaya dan komisariat</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- SEDANG BERLANGSUNG --}}
            @if($berlangsung->isNotEmpty())
            <div style="margin-bottom:48px;">
                <div class="sec-label">Sedang Berlangsung</div>
                <div class="berlangsung-grid">
                    @foreach($berlangsung as $agenda)
                    <div class="berlangsung-card fade-up">
                        <div class="berlangsung-badge">Berlangsung</div>
                        <div class="berlangsung-judul">{{ $agenda->judul }}</div>
                        <div class="berlangsung-meta">
                            <span class="badge-kat kat-{{ $agenda->kategori }}">{{ $agenda->label_kategori }}</span>
                            @if($agenda->lokasi)
                            <span>
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $agenda->lokasi }}
                            </span>
                            @endif
                            <span>
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                s/d {{ $agenda->tanggal_selesai?->format('d M Y') ?? '—' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- AKAN DATANG --}}
            <div class="sec-label">Akan Datang</div>
            <h2 class="sec-title">Jadwal Kegiatan Mendatang</h2>

            @if($akanDatang->isEmpty())
                <div class="empty fade-up">
                    <div style="font-size:2.5rem;margin-bottom:12px;">📅</div>
                    <p>Belum ada agenda yang dijadwalkan.</p>
                </div>
            @else
                <div class="agenda-list">
                    @foreach($akanDatang as $agenda)
                    @php $hariLagi = now()->diffInDays($agenda->tanggal_mulai, false); @endphp
                    <div class="agenda-item fade-up">
                        <div class="agenda-tgl">
                            <div class="agenda-tgl-angka">{{ $agenda->tanggal_mulai->format('d') }}</div>
                            <div class="agenda-tgl-bln">{{ $agenda->tanggal_mulai->isoFormat('MMM') }}</div>
                            <div class="agenda-tgl-thn">{{ $agenda->tanggal_mulai->format('Y') }}</div>
                        </div>
                        <div class="agenda-info">
                            <div class="agenda-judul">{{ $agenda->judul }}</div>
                            <div class="agenda-meta">
                                <span class="badge-kat kat-{{ $agenda->kategori }}">{{ $agenda->label_kategori }}</span>
                                @if($agenda->lokasi)
                                <span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $agenda->lokasi }}
                                </span>
                                @endif
                                <span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ $agenda->tanggal_mulai->format('H:i') }} WIB
                                </span>
                            </div>
                        </div>
                        <div class="countdown">
                            <div class="countdown-num">{{ $hariLagi }}</div>
                            <div class="countdown-lbl">hari lagi</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            {{-- KEGIATAN LEWAT --}}
            @if($lewat->isNotEmpty())
            <div style="margin-top:56px;">
                <div class="sec-label">Arsip</div>
                <h2 class="sec-title">Kegiatan Sebelumnya</h2>
                <div class="lewat-grid">
                    @foreach($lewat as $agenda)
                    <div class="lewat-card fade-up">
                        <div class="lewat-tgl">{{ $agenda->tanggal_mulai->format('d M Y') }}</div>
                        <div class="lewat-judul">{{ $agenda->judul }}</div>
                        @if($agenda->lokasi)
                        <div class="lewat-lokasi">
                            <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $agenda->lokasi }}
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>
</x-publik>
