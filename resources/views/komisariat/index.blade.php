<x-publik>
    <x-slot name="title">Komisariat — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }

        .stats-row { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-bottom:48px; }
        .stat-card { background:white; border:1px solid #f0dada; border-radius:14px; padding:24px; text-align:center; }
        .stat-num { font-family:'Playfair Display',serif; font-size:2rem; color:var(--merah-tua); font-weight:700; }
        .stat-lbl { font-size:13px; color:#9ca3af; margin-top:4px; }

        .kom-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:22px; }
        .kom-card { background:white; border:1px solid #ede8e3; border-radius:16px; overflow:hidden; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .kom-card:hover { transform:translateY(-4px); box-shadow:0 14px 36px rgba(44,24,16,.09); border-color:#f0dada; }
        .kom-foto { width:100%; height:160px; object-fit:cover; background:var(--merah-muda); display:flex; align-items:center; justify-content:center; font-size:3rem; }
        .kom-body { padding:22px; }
        .kom-nama { font-family:'Playfair Display',serif; font-size:1.05rem; color:var(--merah-tua); margin-bottom:4px; }
        .kom-kampus { font-size:13px; color:#9ca3af; margin-bottom:14px; display:flex; align-items:center; gap:5px; }
        .kom-info-row { display:flex; justify-content:space-between; font-size:12.5px; color:#6b7280; padding-top:14px; border-top:1px solid #f5f0ed; }
        .kom-info-row span { display:flex; align-items:center; gap:5px; }

        .empty { text-align:center; padding:72px 24px; color:#9ca3af; }

        @media(max-width:900px){
            .stats-row { grid-template-columns:1fr; }
            .kom-grid { grid-template-columns:1fr; }
        }
    </style>
    </x-slot>

    <div class="page-header">
        <svg style="position:absolute;right:-30px;top:10px;width:120px;opacity:.08;transform:rotate(15deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="breadcrumb-sep">›</span>
                <span>Komisariat</span>
            </div>
            <h1>Komisariat Aktif</h1>
            <p>Unit KAMMI di kampus-kampus wilayah Tasikmalaya dan Priangan Timur</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- STATISTIK --}}
            <div class="stats-row fade-up">
                <div class="stat-card">
                    <div class="stat-num">{{ $komisariats->count() }}</div>
                    <div class="stat-lbl">Komisariat Aktif</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">{{ $totalKader }}</div>
                    <div class="stat-lbl">Total Kader Terdaftar</div>
                </div>
                <div class="stat-card">
                    <div class="stat-num">{{ $komisariats->pluck('kampus')->unique()->count() }}</div>
                    <div class="stat-lbl">Kampus Terjangkau</div>
                </div>
            </div>

            {{-- GRID KOMISARIAT --}}
            @if($komisariats->isEmpty())
                <div class="empty">
                    <div style="font-size:3rem;margin-bottom:14px;">🏫</div>
                    <p style="font-size:16px;font-weight:500;color:#6b7280;">Belum ada data komisariat.</p>
                </div>
            @else
                <div class="kom-grid">
                    @foreach($komisariats as $i => $kom)
                    <a href="{{ route('komisariat.show', $kom) }}" class="kom-card fade-up delay-{{ ($i % 3) + 1 }}">
                        @if($kom->foto)
                            <img src="{{ Storage::url($kom->foto) }}" alt="{{ $kom->nama }}" class="kom-foto" style="display:block;">
                        @else
                            <div class="kom-foto">🏛️</div>
                        @endif
                        <div class="kom-body">
                            <div class="kom-nama">{{ $kom->nama }}</div>
                            <div class="kom-kampus">
                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                                {{ $kom->kampus }}
                            </div>
                            <div class="kom-info-row">
                                <span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                                    {{ $kom->ketua ?? 'Ketua belum diisi' }}
                                </span>
                                <span>
                                    <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                    {{ $kom->jumlah_kader }} kader
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
            @endif

        </div>
    </div>
</x-publik>
