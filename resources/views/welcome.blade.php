<x-publik>
    <x-slot name="title">KAMMI Daerah Tasikmalaya — Gerakan Mahasiswa Muslim Priangan Timur</x-slot>
    <x-slot name="description">Website resmi Kesatuan Aksi Mahasiswa Muslim Indonesia (KAMMI) Daerah Tasikmalaya. Wadah perjuangan mahasiswa muslim di Priangan Timur.</x-slot>

    <x-slot name="styles">
    <style>
        /* ===== HERO SPECIFIC ===== */
        .hero {
            min-height: 100vh; background: var(--merah-tua);
            display: flex; align-items: center;
            padding: 120px 2.5rem 80px; position: relative; overflow: hidden;
        }
        .hero::before {
            content:''; position:absolute; inset:0;
            background-image: repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 28px);
        }
        .hero::after {
            content:''; position:absolute; top:-200px; right:-200px; width:600px; height:600px; border-radius:50%;
            background:radial-gradient(circle,rgba(201,168,76,.15) 0%,transparent 70%); filter: blur(60px);
        }
        .hero-inner { max-width:1200px; margin:0 auto; width:100%; display:grid; grid-template-columns:1.2fr 1fr; gap:60px; align-items:center; position:relative; z-index:2; }
        
        .hero-tag { 
            display:inline-flex; align-items:center; gap:8px; background:rgba(201,168,76,.15); 
            border:1px solid rgba(201,168,76,.4); color:var(--emas); font-size:11px; font-weight:700; 
            letter-spacing:.15em; text-transform:uppercase; padding:6px 16px; border-radius:100px; margin-bottom:24px; 
        }
        .hero-tag::before { content:''; width:6px; height:6px; background:var(--emas); border-radius:50%; box-shadow: 0 0 10px var(--emas); }
        
        .hero h1 { 
            font-size:clamp(2.5rem, 4.5vw, 4rem); line-height:1.15; color:#fff9f0; margin-bottom:24px; 
            font-weight: 700; text-shadow: 0 4px 20px rgba(0,0,0,0.2);
        }
        .hero h1 em { font-style:italic; color:var(--emas); font-family: 'Playfair Display', serif; }
        
        .hero-desc { 
            font-size:16px; line-height:1.8; color:rgba(255,249,240,.7); margin-bottom:40px; max-width:540px; 
        }
        
        .hero-cta { display:flex; gap:16px; flex-wrap:wrap; }
        
        .btn-outline-putih { 
            display:inline-flex; align-items:center; gap:8px; background:transparent; 
            color:rgba(255,249,240,.9); text-decoration:none; font-size:14px; font-weight:600; 
            padding:12px 28px; border-radius:100px; border:1.5px solid rgba(255,249,240,.3); 
            transition:all .3s; letter-spacing: 0.02em;
        }
        .btn-outline-putih:hover { background:rgba(255,255,255,.1); border-color:white; color:white; }

        /* Kartu Hero Visual */
        .hero-card { 
            background:rgba(255,249,240,.06); border:1px solid rgba(255,255,255,.1); 
            backdrop-filter:blur(16px); -webkit-backdrop-filter: blur(16px);
            border-radius:24px; padding:32px; position:relative; 
            box-shadow: 0 20px 60px rgba(0,0,0,0.2);
        }
        .hero-card-lbl { font-size:11px; font-weight:700; letter-spacing:.15em; text-transform:uppercase; color:var(--emas); margin-bottom:20px; display: flex; align-items: center; gap: 8px; }
        .hero-card-lbl::after { content: ''; flex-grow: 1; height: 1px; background: rgba(255,255,255,0.1); }
        
        .pilar-grid { display:grid; grid-template-columns:1fr 1fr; gap:12px; }
        .pilar-item { 
            background:rgba(0,0,0,.2); border:1px solid rgba(255,255,255,.05); 
            border-radius:16px; padding:16px; transition:all .3s; 
        }
        .pilar-item:hover { background:rgba(255,255,255,.1); transform:translateY(-3px); border-color: rgba(255,255,255,0.2); }
        .pilar-icon { font-size:24px; margin-bottom:8px; }
        .pilar-name { font-size:13px; font-weight:700; color:#fff9f0; margin-bottom: 2px; }
        .pilar-sub  { font-size:11px; color:rgba(255,249,240,.5); }
        
        .hero-stats { display:flex; border-top:1px solid rgba(255,255,255,.1); padding-top:24px; margin-top:24px; }
        .stat-item { flex:1; text-align:center; position: relative; }
        .stat-item:not(:last-child)::after { content:''; position: absolute; right: 0; top: 20%; bottom: 20%; width: 1px; background: rgba(255,255,255,0.1); }
        .stat-num { font-family:'Playfair Display',serif; font-size:26px; color:var(--emas); font-weight:700; line-height: 1; margin-bottom: 4px; }
        .stat-lbl  { font-size:11px; color:rgba(255,249,240,.5); text-transform: uppercase; letter-spacing: 0.05em; font-weight: 500; }
        
        .scroll-hint { position:absolute; bottom:40px; left:50%; transform:translateX(-50%); display:flex; flex-direction:column; align-items:center; gap:8px; color:rgba(255,249,240,.3); font-size:10px; letter-spacing:.2em; text-transform:uppercase; animation:bobble 2.2s ease-in-out infinite; z-index:2; }
        @keyframes bobble { 0%,100%{transform:translateX(-50%) translateY(0)} 50%{transform:translateX(-50%) translateY(8px)} }

        /* ===== DECORATIONS ===== */
        .payung-deco { position: absolute; pointer-events: none; opacity: 0.08; }
        
        .batik-divider { 
            width:100%; height:32px; 
            background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='60' height='26'%3E%3Cpath d='M30 13L0 0v26z' fill='%238b1a1a' fill-opacity='.07'/%3E%3Cpath d='M30 13L60 0v26z' fill='%238b1a1a' fill-opacity='.07'/%3E%3Ccircle cx='30' cy='13' r='3' fill='%23c9a84c' fill-opacity='.3'/%3E%3C/svg%3E"); 
            background-repeat:repeat-x; 
        }

        /* ===== SECTION HEADER ===== */
        .sec-header { display:flex; justify-content:space-between; align-items:flex-end; margin-bottom:48px; flex-wrap:wrap; gap:20px; }
        .lihat-semua { font-size:14px; font-weight:700; color:var(--merah); text-decoration:none; display:inline-flex; align-items:center; gap:6px; transition:gap .2s; }
        .lihat-semua:hover { gap:12px; color: var(--merah-tua); }

        /* ===== PROGRAM SECTION ===== */
        .program-section { background:var(--merah-tua); position:relative; overflow:hidden; }
        .program-section::before { content:''; position:absolute; inset:0; background: radial-gradient(circle at top right, rgba(201,168,76,0.1), transparent 50%); }
        
        .prog-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; margin-top:10px; }
        .prog-card { 
            background:rgba(255,249,240,.05); border:1px solid rgba(255,255,255,.1); 
            border-radius:20px; padding:32px; text-decoration:none; color:inherit; display:block; 
            transition:all .4s cubic-bezier(0.16, 1, 0.3, 1); backdrop-filter: blur(10px);
        }
        .prog-card:hover { background:rgba(255,249,240,.1); transform:translateY(-6px); border-color:rgba(201,168,76,.4); }
        .prog-icon { width:56px; height:56px; background:rgba(201,168,76,.15); border-radius:16px; display:flex; align-items:center; justify-content:center; font-size:24px; margin-bottom:20px; color: var(--emas); }
        .prog-name { font-family:'Playfair Display',serif; font-size:1.4rem; color:#fff9f0; margin-bottom:10px; font-weight: 600; }
        .prog-desc { font-size:14px; line-height:1.7; color:rgba(255,249,240,.6); margin-bottom:24px; }
        .prog-link { font-size:13px; font-weight:700; color:var(--emas); display:inline-flex; align-items:center; gap:6px; letter-spacing: 0.05em; text-transform: uppercase; }

        /* ===== CTA ===== */
        .cta-section { background:var(--krem); border-top:1px solid #f0e0d6; padding-bottom: 120px; }
        .cta-box { 
            background: linear-gradient(135deg, var(--merah-tua), #3a0a0a); 
            border-radius:32px; padding:80px 40px; text-align:center; position:relative; overflow:hidden; 
            box-shadow: 0 30px 60px rgba(139, 26, 26, 0.15); border: 1px solid rgba(255,255,255,0.1);
        }
        .cta-box h2 { font-size:clamp(2rem, 3.5vw, 3rem); color:#fff9f0; margin-bottom:16px; position:relative; z-index:1; }
        .cta-box p  { font-size:16px; color:rgba(255,249,240,.7); margin-bottom:40px; line-height:1.8; max-width:540px; margin-left:auto; margin-right:auto; position:relative; z-index:1; }
        .cta-btns { display:flex; gap:16px; justify-content:center; flex-wrap:wrap; position:relative; z-index:1; }

        /* GRID LAYOUTS */
        .grid-3 { display:grid; grid-template-columns:repeat(3,1fr); gap:24px; }

        @media(max-width:900px){
            .hero-inner { grid-template-columns:1fr; text-align: center; }
            .hero-tag { margin: 0 auto 20px; }
            .hero-desc { margin: 0 auto 30px; }
            .hero-cta { justify-content: center; }
            .hero-visual { display:none; }
            .grid-3, .prog-grid { grid-template-columns:1fr; }
            .sec-header { flex-direction: column; align-items: flex-start; gap: 10px; }
        }
    </style>
    </x-slot>

    {{-- ===== HERO SECTION ===== --}}
    <section class="hero">
        {{-- Decorations --}}
        <svg class="payung-deco" style="width:240px; right:-60px; top:40px; transform:rotate(18deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <svg class="payung-deco" style="width:180px; left:-40px; bottom:80px; transform:rotate(-22deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>

        <div class="hero-inner fade-up">
            <div>
                <div class="hero-tag">Tasikmalaya · Priangan Timur</div>
                <h1>Gerakan Mahasiswa<br>Muslim yang <em>Beradab</em><br>& Berdampak</h1>
                <p class="hero-desc">KAMMI Daerah Tasikmalaya — wadah kader muslim berprestasi yang berkomitmen pada advokasi publik, pemberdayaan masyarakat, dan pengembangan SDM di bumi Priangan Timur.</p>
                <div class="hero-cta">
                    <a href="#program" class="btn-emas">
                        Jelajahi Program
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                    </a>
                    <a href="{{ route('isu-daerah.index') }}" class="btn-outline-putih">Isu Daerah</a>
                </div>
            </div>
            
            <div class="hero-visual fade-up delay-1">
                <div class="hero-card">
                    <div class="hero-card-lbl">Fokus Advokasi Daerah</div>
                    <div class="pilar-grid">
                        <div class="pilar-item"><div class="pilar-icon">🚌</div><div class="pilar-name">Transportasi</div><div class="pilar-sub">Priangan Timur</div></div>
                        <div class="pilar-item"><div class="pilar-icon">📚</div><div class="pilar-name">Pendidikan</div><div class="pilar-sub">Akses & Kualitas</div></div>
                        <div class="pilar-item"><div class="pilar-icon">🌿</div><div class="pilar-name">Lingkungan</div><div class="pilar-sub">Hidup Lestari</div></div>
                        <div class="pilar-item"><div class="pilar-icon">🛒</div><div class="pilar-name">Ekonomi</div><div class="pilar-sub">UMKM Berdaya</div></div>
                    </div>
                    <div class="hero-stats">
                        <div class="stat-item"><div class="stat-num">3</div><div class="stat-lbl">Tingkat DM</div></div>
                        <div class="stat-item"><div class="stat-num">6</div><div class="stat-lbl">Bidang Isu</div></div>
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

    {{-- ===== ISU DAERAH FEATURED ===== --}}
    @if($isuFeatured->isNotEmpty())
    <section class="section" style="background:var(--krem);">
        <svg class="payung-deco" style="width:140px; right:5%; top:40px; transform:rotate(12deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
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
            
            <div class="grid-3">
                @foreach($isuFeatured as $i => $isu)
                <a href="{{ route('isu-daerah.show', $isu) }}" class="card-kammi fade-up delay-{{ $i + 1 }}">
                    @if($isu->gambar)
                        <img src="{{ Storage::url($isu->gambar) }}" alt="{{ $isu->judul }}" class="card-img">
                    @else
                        <div class="card-img" style="display:flex; align-items:center; justify-content:center; font-size:40px;">📣</div>
                    @endif
                    <div class="card-body">
                        <div class="card-meta" style="color:var(--merah);">{{ $isu->label_kategori }}</div>
                        <h3 class="card-title">{{ $isu->judul }}</h3>
                        <p class="card-desc">{{ Str::limit($isu->deskripsi, 90) }}</p>
                        <div class="card-footer">
                            <span style="font-weight:600; color:var(--merah); display:flex; align-items:center; gap:6px;">
                                Baca Selengkapnya <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <div class="batik-divider" style="transform:scaleY(-1);"></div>

    {{-- ===== PUBLIKASI TERBARU ===== --}}
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
            <div class="grid-3">
                @foreach($publikasiTerbaru as $i => $pub)
                <a href="{{ route('publikasi.show', $pub->slug) }}" class="card-kammi fade-up delay-{{ ($i % 3) + 1 }}">
                    @if($pub->gambar)
                        <img src="{{ Storage::url($pub->gambar) }}" alt="{{ $pub->judul }}" class="card-img">
                    @else
                        <div class="card-img" style="display:flex; align-items:center; justify-content:center; font-size:40px;">📰</div>
                    @endif
                    <div class="card-body">
                        <div class="card-meta">{{ ucfirst($pub->tipe) }}</div>
                        <h3 class="card-title">{{ Str::limit($pub->judul, 60) }}</h3>
                        <div class="card-footer">
                            <span>{{ $pub->user->name ?? 'Admin' }}</span>
                            <span>{{ $pub->published_at?->format('d M Y') ?? $pub->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div>
            @else
            <div style="text-align:center;padding:60px; border:2px dashed #e5e7eb; border-radius:16px;">
                <div style="font-size:3rem;margin-bottom:12px; opacity:0.3;">📰</div>
                <p style="color:#6b7280;">Belum ada publikasi yang ditambahkan.</p>
            </div>
            @endif
        </div>
    </section>

    {{-- ===== PROGRAM ===== --}}
    <section class="section program-section" id="program">
        <svg class="payung-deco" style="width:200px; right:5%; top:40px; transform:rotate(14deg); opacity:.05;" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <svg class="payung-deco" style="width:160px; left:5%; bottom:40px; transform:rotate(-14deg); opacity:.05;" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        
        <div class="section-inner">
            <div class="fade-up" style="margin-bottom:10px; text-align:center;">
                <div class="sec-label" style="color:rgba(201,168,76,.9);">Program Unggulan</div>
                <h2 class="sec-title" style="color:#fff9f0; margin-bottom: 40px;">Tiga Pilar Utama<br>Aktivitas KAMMI</h2>
            </div>
            
            <div class="prog-grid">
                <a href="{{ route('publikasi.index') }}" class="prog-card fade-up delay-1">
                    <div class="prog-icon">📰</div>
                    <div class="prog-name">Berita & Publikasi</div>
                    <p class="prog-desc">Informasi terkini, opini kader, laporan advokasi, dan pengumuman resmi KAMMI Daerah Tasikmalaya.</p>
                    <span class="prog-link">Baca Berita <svg width="13" height="13" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg></span>
                </a>
                <a href="{{ route('kaderisasi.index') }}" class="prog-card fade-up delay-2">
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
                <svg style="position:absolute;right:5%;top:20px;width:120px;opacity:.05;transform:rotate(20deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                <svg style="position:absolute;left:5%;bottom:20px;width:120px;opacity:.05;transform:rotate(-20deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                
                <h2>Bergabung Bersama KAMMI</h2>
                <p>Jadilah bagian dari gerakan mahasiswa muslim yang bergerak nyata untuk kemajuan daerah dan umat. Daftarkan diri di Daurah Marhalah terdekat.</p>
                <div class="cta-btns">
                    <a href="{{ route('kaderisasi.index') }}" class="btn-emas">
                        Daftar Daurah Marhalah
                        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
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
            if (h === '#' || !document.querySelector(h)) return;
            e.preventDefault();
            document.querySelector(h)?.scrollIntoView({ behavior: 'smooth' });
        });
    });
    </script>
    </x-slot>
</x-publik>
