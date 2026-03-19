<x-publik>
    <x-slot name="title">KAMMI Daerah Tasikmalaya — Gerakan Mahasiswa Muslim Priangan Timur</x-slot>

    <x-slot name="styles">
    <style>
        /* ===== HERO ===== */
        .hero {
            min-height: 100vh; background: var(--merah-tua);
            display: flex; align-items: center;
            padding: 100px 2.5rem 80px;
            position: relative; overflow: hidden;
        }
        .hero::before {
            content:''; position:absolute; inset:0;
            background-image: repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 28px);
        }
        .hero::after {
            content:''; position:absolute; top:-180px; right:-180px; width:560px; height:560px; border-radius:50%;
            background:radial-gradient(circle,rgba(201,168,76,.15) 0%,transparent 68%);
        }
        .hero-inner { max-width:1200px; margin:0 auto; width:100%; display:grid; grid-template-columns:1fr 1fr; gap:56px; align-items:center; position:relative; z-index:2; }
        .hero-tag { display:inline-flex; align-items:center; gap:8px; background:rgba(201,168,76,.15); border:1px solid rgba(201,168,76,.4); color:var(--emas); font-size:11px; font-weight:600; letter-spacing:.1em; text-transform:uppercase; padding:5px 14px; border-radius:100px; margin-bottom:22px; }
        .hero-tag::before { content:''; width:6px; height:6px; background:var(--emas); border-radius:50%; }
        .hero h1 { font-family:'Playfair Display',serif; font-size:clamp(2.2rem,3.8vw,3.4rem); line-height:1.18; color:#fff9f0; margin-bottom:22px; }
        .hero h1 em { font-style:italic; color:var(--emas); }
        .hero-desc { font-size:15.5px; line-height:1.8; color:rgba(255,249,240,.65); margin-bottom:34px; max-width:460px; }
        .hero-cta { display:flex; gap:12px; flex-wrap:wrap; }
        .btn-outline-putih { display:inline-flex; align-items:center; gap:8px; background:transparent; color:rgba(255,249,240,.8); text-decoration:none; font-size:14px; font-weight:600; padding:11px 24px; border-radius:8px; border:1.5px solid rgba(255,249,240,.25); transition:all .2s; }
        .btn-outline-putih:hover { background:rgba(255,255,255,.08); border-color:rgba(255,255,255,.45); color:white; }
        /* Kartu hero */
        .hero-card { background:rgba(255,249,240,.06); border:1px solid rgba(201,168,76,.2); backdrop-filter:blur(12px); border-radius:20px; padding:28px; position:relative; }
        .hero-card-lbl { font-size:10px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:var(--emas); margin-bottom:18px; }
        .pilar-grid { display:grid; grid-template-columns:1fr 1fr; gap:10px; }
        .pilar-item { background:rgba(255,249,240,.07); border:1px solid rgba(201,168,76,.15); border-radius:12px; padding:14px; transition:all .2s; }
        .pilar-item:hover { background:rgba(255,249,240,.13); transform:translateY(-2px); }
        .pilar-icon { font-size:20px; margin-bottom:6px; }
        .pilar-name { font-size:12px; font-weight:600; color:#fff9f0; }
        .pilar-sub  { font-size:10.5px; color:rgba(255,249,240,.45); margin-top:2px; }
        .hero-stats { display:flex; border-top:1px solid rgba(201,168,76,.2); padding-top:18px; margin-top:18px; }
        .stat-item { flex:1; text-align:center; }
        .stat-item+.stat-item { border-left:1px solid rgba(201,168,76,.18); }
        .stat-num { font-family:'Playfair Display',serif; font-size:22px; color:var(--emas); font-weight:700; }
        .stat-lbl  { font-size:10px; color:rgba(255,249,240,.45); margin-top:2px; }
        .scroll-hint { position:absolute; bottom:32px; left:50%; transform:translateX(-50%); display:flex; flex-direction:column; align-items:center; gap:7px; color:rgba(255,249,240,.3); font-size:10px; letter-spacing:.1em; text-transform:uppercase; animation:bobble 2.2s ease-in-out infinite; z-index:2; }
        @keyframes bobble { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(7px)} }

        /* ===== DIVIDER ===== */
        .batik-divider { width:100%; height:26px; background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='26'%3E%3Cpath d='M30 13L0 0v26z' fill='%238b1a1a' fill-opacity='.07'/%3E%3Cpath d='M30 13L60 0v26z' fill='%238b1a1a' fill-opacity='.07'/%3E%3Ccircle cx='30' cy='13' r='3' fill='%23c9a84c' fill-opacity='.3'/%3E%3C/svg%3E"); background-repeat:repeat-x; }

        /* ===== SECTIONS ===== */
        .section { padding:80px 2.5rem; position:relative; overflow:hidden; }
        .section-inner { max-width:1200px; margin:0 auto; }
        .sec-label { display:inline-flex; align-items:center; gap:8px; font-size:11px; font-weight:600; letter-spacing:.1em; text-transform:uppercase; color:var(--merah); margin-bottom:10px; }
        .sec-label::before { content:''; width:18px; height:2px; background:var(--emas); border-radius:2px; }
        .sec-title { font-family:'Playfair Display',serif; font-size:clamp(1.7rem,2.5vw,2.2rem); line-height:1.25; color:var(--merah-tua); margin-bottom:14px; }
        .sec-desc  { font-size:15px; line-height:1.8; color:#6b4040; max-width:520px; }
        .sec-header { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:36px; flex-wrap:wrap; gap:16px; }
        .lihat-semua { font-size:13.5px; font-weight:600; color:var(--merah); text-decoration:none; display:inline-flex; align-items:center; gap:5px; transition:gap .2s; }
        .lihat-semua:hover { gap:10px; }

        /* ===== ISU FEATURED ===== */
        .isu-featured-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; }
        .isu-featured-card { background:white; border:1px solid #f0dada; border-radius:16px; overflow:hidden; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .isu-featured-card:hover { transform:translateY(-4px); box-shadow:0 14px 36px rgba(139,26,26,.1); border-color:#f5c0c0; }
        .isu-img { width:100%; height:160px; object-fit:cover; background:#fdf2f2; display:flex; align-items:center; justify-content:center; font-size:36px; }
        .isu-body { padding:20px; }
        .isu-badges { display:flex; gap:6px; flex-wrap:wrap; margin-bottom:10px; }
        .badge { font-size:11px; font-weight:600; padding:3px 10px; border-radius:100px; }
        .badge-kritis  { background:#fde8e8; color:#8b1a1a; }
        .badge-tinggi  { background:#fee2e2; color:#b91c1c; }
        .badge-sedang  { background:#fef3c7; color:#92400e; }
        .badge-rendah  { background:#f3f4f6; color:#4b5563; }
        .badge-kategori { background:#fdf2f2; color:#8b1a1a; }
        .isu-judul { font-family:'Playfair Display',serif; font-size:1rem; color:var(--merah-tua); margin-bottom:8px; line-height:1.4; }
        .isu-desc  { font-size:13px; color:#7a5050; line-height:1.6; }

        /* ===== PUBLIKASI ===== */
        .pub-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; }
        .pub-card { background:white; border:1px solid #ede8e3; border-radius:14px; overflow:hidden; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .pub-card:hover { transform:translateY(-3px); box-shadow:0 12px 32px rgba(44,24,16,.08); }
        .pub-img { width:100%; height:150px; object-fit:cover; background:#faf7f2; display:flex; align-items:center; justify-content:center; font-size:32px; }
        .pub-body { padding:18px; }
        .badge-tipe { font-size:10.5px; font-weight:600; padding:3px 10px; border-radius:100px; margin-bottom:10px; display:inline-block; }
        .tipe-berita     { background:#fdf2f2; color:#8b1a1a; }
        .tipe-opini      { background:#fef3c7; color:#92400e; }
        .tipe-laporan    { background:#f0fdf4; color:#166534; }
        .tipe-pengumuman { background:#eff6ff; color:#1d4ed8; }
        .pub-judul { font-size:14.5px; font-weight:600; color:var(--teks); margin-bottom:7px; line-height:1.45; }
        .pub-meta  { font-size:12px; color:#9ca3af; display:flex; justify-content:space-between; }

        /* ===== PROGRAM ===== */
        .program-section { background:var(--merah-tua); position:relative; overflow:hidden; }
        .prog-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-top:40px; }
        .prog-card { background:rgba(255,249,240,.07); border:1px solid rgba(201,168,76,.18); border-radius:16px; padding:28px; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .prog-card:hover { background:rgba(255,249,240,.13); transform:translateY(-3px); border-color:rgba(201,168,76,.35); }
        .prog-icon { width:48px; height:48px; background:rgba(201,168,76,.15); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px; }
        .prog-name { font-family:'Playfair Display',serif; font-size:1.1rem; color:#fff9f0; margin-bottom:8px; }
        .prog-desc { font-size:13.5px; line-height:1.7; color:rgba(255,249,240,.6); margin-bottom:16px; }
        .prog-link { font-size:13px; font-weight:600; color:var(--emas); display:inline-flex; align-items:center; gap:5px; }

        /* ===== CTA ===== */
        .cta-section { background:var(--krem); border-top:1px solid #f0e0d6; }
        .cta-box { background:var(--merah-tua); border-radius:24px; padding:60px 48px; text-align:center; position:relative; overflow:hidden; }
        .cta-box::before { content:''; position:absolute; top:-120px; right:-120px; width:360px; height:360px; border-radius:50%; background:radial-gradient(circle,rgba(201,168,76,.13) 0%,transparent 68%); }
        .cta-box h2 { font-family:'Playfair Display',serif; font-size:clamp(1.6rem,2.5vw,2.2rem); color:#fff9f0; margin-bottom:12px; position:relative; z-index:1; }
        .cta-box p  { font-size:15px; color:rgba(255,249,240,.6); margin-bottom:30px; line-height:1.8; max-width:500px; margin-left:auto; margin-right:auto; position:relative; z-index:1; }
        .cta-btns { display:flex; gap:12px; justify-content:center; flex-wrap:wrap; position:relative; z-index:1; }

        @media(max-width:900px){
            .hero-inner { grid-template-columns:1fr; }
            .hero-visual { display:none; }
            .isu-featured-grid, .pub-grid, .prog-grid { grid-template-columns:1fr; }
        }
    </style>
    </x-slot>

    {{-- ===== HERO ===== --}}
    <section class="hero">
        <svg class="payung-deco besar"  style="right:-55px;top:50px;transform:rotate(18deg);"   viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <svg class="payung-deco besar"  style="left:-50px;bottom:70px;transform:rotate(-22deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <svg class="payung-deco kecil"  style="right:26%;top:110px;transform:rotate(9deg);"     viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>

        <div class="hero-inner">
            <div>
                <div class="hero-tag">Tasikmalaya · Priangan Timur</div>
                <h1>Gerakan Mahasiswa<br>Muslim yang <em>Beradab</em><br>& Berdampak</h1>
                <p class="hero-desc">KAMMI Daerah Tasikmalaya — wadah kader muslim berprestasi yang berkomitmen pada advokasi publik, pemberdayaan masyarakat, dan pengembangan SDM di bumi Priangan Timur.</p>
                <div class="hero-cta">
                    <a href="#program" class="btn-emas">
                        Jelajahi Program
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('isu-daerah.index') }}" class="btn-outline-putih">Isu Daerah</a>
                </div>
            </div>
            <div class="hero-visual">
                <div class="hero-card">
                    <svg style="position:absolute;right:16px;top:12px;width:44px;opacity:0.18;" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                    <div class="hero-card-lbl">Fokus Advokasi Daerah</div>
                    <div class="pilar-grid">
                        <div class="pilar-item"><div class="pilar-icon">🚌</div><div class="pilar-name">Transportasi</div><div class="pilar-sub">Priangan Timur</div></div>
                        <div class="pilar-item"><div class="pilar-icon">📚</div><div class="pilar-name">Pendidikan</div><div class="pilar-sub">Akses & Kualitas</div></div>
                        <div class="pilar-item"><div class="pilar-icon">🌿</div><div class="pilar-name">Lingkungan</div><div class="pilar-sub">Hidup Lestari</div></div>
                        <div class="pilar-item"><div class="pilar-icon">🛒</div><div class="pilar-name">Ekonomi & UMKM</div><div class="pilar-sub">Lokal Berdaya</div></div>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item"><div class="stat-num">3</div><div class="stat-lbl">Tingkat DM</div></div>
                        <div class="stat-item"><div class="stat-num">6</div><div class="stat-lbl">Kategori Isu</div></div>
                        <div class="stat-item">
                            <div class="stat-num">{{ $totalKader ?? '—' }}</div>
                            <div class="stat-lbl">Kader Aktif</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-hint">
            <span>Scroll</span>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="none" stroke="currentColor" stroke-width="1.5">
                <rect x="1" y="1" width="14" height="18" rx="7"/>
                <circle cx="8" cy="5" r="2" fill="currentColor" stroke="none">
                    <animateTransform attributeName="transform" type="translate" values="0 0;0 6;0 0" dur="1.8s" repeatCount="indefinite"/>
                </circle>
            </svg>
        </div>
    </section>

    <div class="batik-divider"></div>

    {{-- ===== ISU DAERAH FEATURED (FR-01) ===== --}}
    @if($isuFeatured->isNotEmpty())
    <section class="section" style="background:var(--krem);">
        <svg class="payung-deco sedang" style="right:3%;top:30px;transform:rotate(12deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <div class="section-inner">
            <div class="sec-header fade-up">
                <div>
                    <div class="sec-label">Advokasi Aktif</div>
                    <h2 class="sec-title">Isu Daerah yang Sedang<br>Diadvokasi KAMMI</h2>
                </div>
                <a href="{{ route('isu-daerah.index') }}" class="lihat-semua">
                    Lihat Semua Isu
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>
            <div class="isu-featured-grid">
                @foreach($isuFeatured as $i => $isu)
                <a href="{{ route('isu-daerah.show', $isu) }}" class="isu-featured-card fade-up delay-{{ $i + 1 }}">
                    @if($isu->gambar)
                        <img src="{{ Storage::url($isu->gambar) }}" alt="{{ $isu->judul }}" class="isu-img" style="display:block;">
                    @else
                        <div class="isu-img">📣</div>
                    @endif
                    <div class="isu-body">
                        <div class="isu-badges">
                            <span class="badge badge-{{ $isu->urgensi }}">{{ ucfirst($isu->urgensi) }}</span>
                            <span class="badge badge-kategori">{{ $isu->label_kategori }}</span>
                        </div>
                        <div class="isu-judul">{{ $isu->judul }}</div>
                        <div class="isu-desc">{{ Str::limit($isu->deskripsi, 100) }}</div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <div class="batik-divider" style="transform:scaleY(-1);"></div>

    {{-- ===== PUBLIKASI TERBARU (FR-01: 5 terbaru) ===== --}}
    <section class="section" style="background:white;">
        <div class="section-inner">
            <div class="sec-header fade-up">
                <div>
                    <div class="sec-label">Berita & Opini</div>
                    <h2 class="sec-title">Publikasi Terbaru</h2>
                </div>
                <a href="{{ route('publikasi.index') }}" class="lihat-semua">
                    Lihat Semua
                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            @if($publikasiTerbaru->isNotEmpty())
            <div class="pub-grid">
                @foreach($publikasiTerbaru as $i => $pub)
                <a href="{{ route('publikasi.show', $pub->slug) }}" class="pub-card fade-up delay-{{ ($i % 3) + 1 }}">
                    @if($pub->gambar)
                        <img src="{{ Storage::url($pub->gambar) }}" alt="{{ $pub->judul }}" class="pub-img" style="display:block;">
                    @else
                        <div class="pub-img">📰</div>
                    @endif
                    <div class="pub-body">
                        <span class="badge-tipe tipe-{{ $pub->tipe }}">{{ ucfirst($pub->tipe) }}</span>
                        <div class="pub-judul">{{ Str::limit($pub->judul, 70) }}</div>
                        <div class="pub-meta">
                            <span>{{ $pub->user->name ?? '—' }}</span>
                            <span>{{ $pub->published_at?->format('d M Y') ?? $pub->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div style="text-align:center;padding:48px;color:#9ca3af;">
                <div style="font-size:3rem;margin-bottom:12px;">📰</div>
                <p>Belum ada publikasi. Tambahkan dari dashboard admin.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- ===== PROGRAM (ID: program) ===== --}}
    <section class="section program-section" id="program">
        <svg class="payung-deco sedang" style="right:4%;top:36px;transform:rotate(14deg);opacity:.09;" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <svg class="payung-deco sedang" style="left:4%;bottom:36px;transform:rotate(-14deg);opacity:.09;" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <div class="section-inner">
            <div class="fade-up" style="margin-bottom:0;">
                <div class="sec-label" style="color:rgba(201,168,76,.8);">Program Unggulan</div>
                <h2 class="sec-title" style="color:#fff9f0;">Tiga Pilar Utama<br>Aktivitas KAMMI</h2>
            </div>
            <div class="prog-grid">
                <a href="{{ route('publikasi.index') }}" class="prog-card fade-up delay-1">
                    <div class="prog-icon">📰</div>
                    <div class="prog-name">Berita & Publikasi</div>
                    <p class="prog-desc">Informasi terkini, opini kader, laporan advokasi, dan pengumuman resmi KAMMI Daerah Tasikmalaya.</p>
                    <span class="prog-link">Baca Berita <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </a>
                <a href="#" class="prog-card fade-up delay-2">
                    <div class="prog-icon">🎓</div>
                    <div class="prog-name">Daurah Marhalah</div>
                    <p class="prog-desc">Kaderisasi berjenjang DM I, DM II, dan DM III — pondasi pembentukan karakter kader KAMMI yang tangguh.</p>
                    <span class="prog-link">Daftar Sekarang <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </a>
                <a href="{{ route('isu-daerah.index') }}" class="prog-card fade-up delay-3">
                    <div class="prog-icon">📣</div>
                    <div class="prog-name">Isu Daerah</div>
                    <p class="prog-desc">Advokasi isu-isu publik strategis di Tasikmalaya dan wilayah Priangan Timur yang memerlukan perhatian.</p>
                    <span class="prog-link">Lihat Isu <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </a>
            </div>
        </div>
    </section>

    {{-- ===== CTA ===== --}}
    <section class="section cta-section">
        <div class="section-inner">
            <div class="cta-box fade-up">
                <svg style="position:absolute;right:5%;top:20px;width:90px;opacity:.09;transform:rotate(20deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                <svg style="position:absolute;left:5%;bottom:20px;width:90px;opacity:.09;transform:rotate(-20deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                <h2>Bergabung Bersama KAMMI Tasikmalaya</h2>
                <p>Jadilah bagian dari gerakan mahasiswa muslim yang bergerak nyata untuk kemajuan daerah dan umat. Daftarkan diri di Daurah Marhalah terdekat.</p>
                <div class="cta-btns">
                    <a href="#" class="btn-emas">
                        Daftar Daurah Marhalah
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('isu-daerah.index') }}" class="btn-outline-putih">Pantau Isu Daerah</a>
                </div>
            </div>
        </div>
    </section>

    <x-slot name="scripts">
    <script>
    document.querySelectorAll('a[href^="#"]').forEach(a => {
        a.addEventListener('click', e => {
            const h = a.getAttribute('href');
            if (h === '#') return;
            e.preventDefault();
            document.querySelector(h)?.scrollIntoView({ behavior: 'smooth' });
        });
    });
    </script>
    </x-slot>
</x-publik>
