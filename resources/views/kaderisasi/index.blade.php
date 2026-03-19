<x-publik>
    <x-slot name="title">Kaderisasi — Daurah Marhalah KAMMI Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }

        /* Info DM */
        .dm-info-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; margin-bottom:64px; }
        .dm-info-card { background:white; border:1px solid #f0dada; border-radius:18px; padding:32px 28px; position:relative; overflow:hidden; transition:all .3s; }
        .dm-info-card:hover { transform:translateY(-4px); box-shadow:0 16px 40px rgba(139,26,26,.1); }
        .dm-info-card::before { content:''; position:absolute; top:0; left:0; right:0; height:4px; }
        .dm-info-card.dm1::before { background:linear-gradient(90deg,#c9a84c,#e8c96e); }
        .dm-info-card.dm2::before { background:linear-gradient(90deg,#8b1a1a,#c0392b); }
        .dm-info-card.dm3::before { background:linear-gradient(90deg,#5c0f0f,#8b1a1a); }
        .dm-level-badge { display:inline-flex; align-items:center; justify-content:center; width:52px; height:52px; border-radius:14px; font-family:'Playfair Display',serif; font-size:1.1rem; font-weight:700; margin-bottom:18px; }
        .dm1 .dm-level-badge { background:#fdf6e3; color:#c9a84c; }
        .dm2 .dm-level-badge { background:#fdf2f2; color:#8b1a1a; }
        .dm3 .dm-level-badge { background:#f5e8e8; color:#5c0f0f; }
        .dm-name { font-family:'Playfair Display',serif; font-size:1.2rem; color:var(--merah-tua); margin-bottom:10px; }
        .dm-desc { font-size:13.5px; line-height:1.75; color:#7a5050; margin-bottom:20px; }
        .dm-syarat-title { font-size:12px; font-weight:700; letter-spacing:.06em; text-transform:uppercase; color:#9ca3af; margin-bottom:10px; }
        .dm-syarat-list { list-style:none; padding:0; }
        .dm-syarat-list li { font-size:13px; color:#5c3030; padding:5px 0; display:flex; align-items:flex-start; gap:8px; border-bottom:1px solid #fdf2f2; }
        .dm-syarat-list li:last-child { border-bottom:none; }
        .dm-syarat-list li::before { content:'✓'; color:var(--emas); font-weight:700; flex-shrink:0; margin-top:1px; }

        /* Jadwal DM */
        .jadwal-section { background:white; border-radius:20px; border:1px solid #ede8e3; overflow:hidden; }
        .jadwal-header { background:var(--merah-tua); padding:24px 32px; display:flex; justify-content:space-between; align-items:center; }
        .jadwal-header h2 { font-family:'Playfair Display',serif; font-size:1.3rem; color:#fff9f0; }
        .jadwal-header p  { font-size:13px; color:rgba(255,249,240,.6); margin-top:4px; }
        .jadwal-body { padding:0; }
        .jadwal-item { display:grid; grid-template-columns:90px 1fr auto; gap:24px; align-items:center; padding:24px 32px; border-bottom:1px solid #faf7f2; transition:background .2s; }
        .jadwal-item:last-child { border-bottom:none; }
        .jadwal-item:hover { background:#fdfaf5; }
        .jadwal-tgl { text-align:center; background:var(--merah-muda); border-radius:12px; padding:12px 8px; }
        .jadwal-tgl-hari { font-size:11px; font-weight:600; color:#8b1a1a; letter-spacing:.06em; text-transform:uppercase; }
        .jadwal-tgl-angka { font-family:'Playfair Display',serif; font-size:1.6rem; color:var(--merah-tua); font-weight:700; line-height:1; margin:4px 0; }
        .jadwal-tgl-bln { font-size:11px; color:#9ca3af; }
        .jadwal-info {}
        .jadwal-nama { font-weight:600; font-size:15px; color:var(--merah-tua); margin-bottom:6px; }
        .jadwal-meta { display:flex; gap:14px; flex-wrap:wrap; }
        .jadwal-meta span { font-size:12.5px; color:#9ca3af; display:flex; align-items:center; gap:5px; }
        .badge-level { font-size:11px; font-weight:700; padding:3px 12px; border-radius:100px; }
        .badge-DM1 { background:#fdf6e3; color:#c9a84c; }
        .badge-DM2 { background:#fdf2f2; color:#8b1a1a; }
        .badge-DM3 { background:#f5e8e8; color:#5c0f0f; }
        .badge-berlangsung { background:#f0fdf4; color:#166534; font-size:11px; font-weight:600; padding:3px 10px; border-radius:100px; }
        .badge-penuh { background:#f3f4f6; color:#6b7280; font-size:11px; font-weight:600; padding:3px 10px; border-radius:100px; }
        .btn-daftar { background:var(--merah); color:white; text-decoration:none; font-size:13px; font-weight:600; padding:10px 22px; border-radius:8px; transition:all .2s; white-space:nowrap; }
        .btn-daftar:hover { background:var(--merah-tua); transform:translateY(-1px); }
        .btn-daftar.disabled { background:#d1d5db; color:#9ca3af; pointer-events:none; }

        /* Kosong */
        .empty { text-align:center; padding:56px 24px; color:#9ca3af; }

        @media(max-width:900px){
            .dm-info-grid { grid-template-columns:1fr; }
            .jadwal-item { grid-template-columns:1fr; }
            .jadwal-tgl { display:none; }
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
                <span>Kaderisasi</span>
            </div>
            <h1>Daurah Marhalah</h1>
            <p>Program kaderisasi berjenjang KAMMI Daerah Tasikmalaya — DM I, DM II, dan DM III</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- INFO 3 TINGKATAN DM --}}
            <div class="dm-info-grid fade-up">
                <div class="dm-info-card dm1">
                    <div class="dm-level-badge">I</div>
                    <div class="dm-name">Daurah Marhalah I</div>
                    <p class="dm-desc">Pelatihan dasar kader KAMMI. Mengenal Islam, gerakan mahasiswa, dan nilai-nilai dasar perjuangan KAMMI.</p>
                    <div class="dm-syarat-title">Syarat Peserta</div>
                    <ul class="dm-syarat-list">
                        <li>Mahasiswa aktif di kampus Tasikmalaya</li>
                        <li>Muslim/muslimah bersedia mengikuti seluruh rangkaian</li>
                        <li>Mengisi formulir pendaftaran online</li>
                    </ul>
                </div>
                <div class="dm-info-card dm2">
                    <div class="dm-level-badge">II</div>
                    <div class="dm-name">Daurah Marhalah II</div>
                    <p class="dm-desc">Pelatihan menengah bagi kader aktif KAMMI. Pendalaman ideologi, kepemimpinan, dan advokasi publik.</p>
                    <div class="dm-syarat-title">Syarat Peserta</div>
                    <ul class="dm-syarat-list">
                        <li>Telah lulus Daurah Marhalah I</li>
                        <li>Aktif di komisariat minimal 6 bulan</li>
                        <li>Rekomendasi dari ketua komisariat</li>
                    </ul>
                </div>
                <div class="dm-info-card dm3">
                    <div class="dm-level-badge">III</div>
                    <div class="dm-name">Daurah Marhalah III</div>
                    <p class="dm-desc">Pelatihan lanjutan kader senior KAMMI. Membentuk pemimpin daerah yang siap menggerakkan umat.</p>
                    <div class="dm-syarat-title">Syarat Peserta</div>
                    <ul class="dm-syarat-list">
                        <li>Telah lulus Daurah Marhalah II</li>
                        <li>Pernah menjabat pengurus komisariat</li>
                        <li>Rekomendasi dari BPK Daerah</li>
                    </ul>
                </div>
            </div>

            {{-- JADWAL DM MENDATANG --}}
            @if($daurahList->isNotEmpty())
            <div class="jadwal-section fade-up">
                <div class="jadwal-header">
                    <div>
                        <h2>Jadwal Daurah Marhalah</h2>
                        <p>Program yang sedang buka pendaftaran atau akan segera datang</p>
                    </div>
                </div>
                <div class="jadwal-body">
                    @foreach(['DM1','DM2','DM3'] as $level)
                        @if($daurahList->has($level))
                            @foreach($daurahList[$level] as $dm)
                            @php
                                $terisi    = $dm->pendaftarans()->whereNotIn('status',['ditolak'])->count();
                                $sisaKuota = $dm->kuota - $terisi;
                                $penuh     = $sisaKuota <= 0;
                            @endphp
                            <div class="jadwal-item">
                                <div class="jadwal-tgl">
                                    <div class="jadwal-tgl-hari">{{ $dm->tanggal_mulai->isoFormat('ddd') }}</div>
                                    <div class="jadwal-tgl-angka">{{ $dm->tanggal_mulai->format('d') }}</div>
                                    <div class="jadwal-tgl-bln">{{ $dm->tanggal_mulai->isoFormat('MMM YYYY') }}</div>
                                </div>
                                <div class="jadwal-info">
                                    <div class="jadwal-nama">{{ $dm->nama }}</div>
                                    <div class="jadwal-meta">
                                        <span class="badge-level badge-{{ $level }}">{{ $level }}</span>
                                        @if($dm->status === 'berlangsung')
                                            <span class="badge-berlangsung">Berlangsung</span>
                                        @endif
                                        @if($dm->lokasi)
                                            <span>
                                                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ $dm->lokasi }}
                                            </span>
                                        @endif
                                        <span>
                                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                            Sisa {{ $penuh ? 'Penuh' : $sisaKuota . ' kursi' }}
                                        </span>
                                    </div>
                                </div>
                                <div>
                                    @if($penuh)
                                        <span class="btn-daftar disabled">Penuh</span>
                                    @else
                                        <a href="{{ route('kaderisasi.daftar', $dm) }}" class="btn-daftar">Daftar Sekarang</a>
                                    @endif
                                </div>
                            </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>
            </div>
            @else
            <div class="empty fade-up">
                <div style="font-size:3rem;margin-bottom:14px;">🎓</div>
                <p style="font-size:16px;font-weight:500;color:#6b7280;">Belum ada jadwal Daurah Marhalah saat ini.</p>
                <p style="font-size:14px;margin-top:6px;">Pantau terus halaman ini atau ikuti media sosial kami.</p>
            </div>
            @endif

        </div>
    </div>

    @if(session('success'))
    <div style="position:fixed;bottom:24px;right:24px;background:#166534;color:white;padding:16px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:999;box-shadow:0 8px 24px rgba(0,0,0,.2);">
        ✓ {{ session('success') }}
    </div>
    <script>setTimeout(()=>document.querySelector('[style*="position:fixed"]').remove(),4000)</script>
    @endif
</x-publik>
