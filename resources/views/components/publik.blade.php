<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'KAMMI Daerah Tasikmalaya' }}</title>
    <meta name="description" content="{{ $description ?? 'Website Resmi KAMMI Daerah Tasikmalaya — Kesatuan Aksi Mahasiswa Muslim Indonesia Priangan Timur' }}">
    <meta property="og:title" content="{{ $title ?? 'KAMMI Daerah Tasikmalaya' }}">
    <meta property="og:description" content="{{ $description ?? 'Website Resmi KAMMI Daerah Tasikmalaya' }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --merah: #8b1a1a;
            --merah-tua: #5c0f0f;
            --merah-terang: #c0392b;
            --merah-muda: #fdf2f2;
            --emas: #c9a84c;
            --krem: #faf7f2;
            --teks: #2c1810;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--krem); color: var(--teks); overflow-x: hidden; }

        /* ===== PAYUNG GEULIS SVG ===== */
        .payung-deco { position: absolute; pointer-events: none; }
        .payung-deco.besar  { width: 220px; opacity: 0.08; }
        .payung-deco.sedang { width: 140px; opacity: 0.10; }
        .payung-deco.kecil  { width:  80px; opacity: 0.14; }

        /* ===== NAVBAR PUBLIK ===== */
        .nav-publik {
            position: fixed; top: 0; left: 0; right: 0; z-index: 200;
            height: 66px; display: flex; align-items: center; justify-content: space-between;
            padding: 0 2.5rem;
            background: rgba(92,15,15,0.97);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(201,168,76,0.18);
            transition: box-shadow 0.3s;
        }
        .nav-publik.scrolled { box-shadow: 0 4px 28px rgba(0,0,0,0.35); }
        .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; }
        .logo-badge { width:38px; height:38px; background:var(--emas); border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden; flex-shrink:0; }
        .nav-brand-top { font-size:14px; font-weight:600; color:white; letter-spacing:.04em; line-height:1.2; }
        .nav-brand-btm { font-size:10.5px; color:rgba(255,255,255,.5); }
        .nav-menu { display:flex; align-items:center; gap:4px; }
        .nav-menu a { color:rgba(255,255,255,.7); text-decoration:none; font-size:13.5px; font-weight:500; padding:7px 14px; border-radius:6px; transition:all .2s; }
        .nav-menu a:hover, .nav-menu a.aktif { color:white; background:rgba(255,255,255,.1); }
        .nav-menu .btn-masuk { background:var(--emas); color:#2c1810 !important; font-weight:600; }
        .nav-menu .btn-masuk:hover { background:#b8943d !important; }
        .nav-toggle { display:none; flex-direction:column; gap:5px; cursor:pointer; padding:6px; }
        .nav-toggle span { display:block; width:22px; height:2px; background:white; border-radius:2px; }

        /* ===== KONTEN ===== */
        .page-wrap { padding-top: 66px; }

        /* ===== PAGE HEADER ===== */
        .page-header {
            background: var(--merah-tua); padding: 52px 2.5rem 44px;
            position: relative; overflow: hidden;
        }
        .page-header::before {
            content:''; position:absolute; inset:0;
            background-image: repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 28px);
        }
        .page-header-inner { max-width:1200px; margin:0 auto; position:relative; z-index:1; }
        .breadcrumb { display:flex; align-items:center; gap:8px; margin-bottom:12px; font-size:13px; color:rgba(255,249,240,.5); }
        .breadcrumb a { color:rgba(255,249,240,.6); text-decoration:none; transition:color .2s; }
        .breadcrumb a:hover { color:#fff9f0; }
        .breadcrumb-sep { font-size:11px; opacity:.4; }
        .page-header h1 { font-family:'Playfair Display',serif; font-size:clamp(1.6rem,2.5vw,2.2rem); color:#fff9f0; }
        .page-header p { margin-top:8px; font-size:14px; color:rgba(255,249,240,.6); }

        /* ===== FOOTER ===== */
        .footer-publik { background: #3a0a0a; color:rgba(255,249,240,.55); padding:52px 2.5rem 28px; }
        .footer-inner  { max-width:1200px; margin:0 auto; }
        .footer-top { display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:48px; padding-bottom:36px; border-bottom:1px solid rgba(201,168,76,.12); margin-bottom:24px; }
        .footer-brand-name { font-family:'Playfair Display',serif; font-size:1.1rem; color:#fff9f0; margin:12px 0 8px; }
        .footer-brand-desc { font-size:13px; line-height:1.75; color:rgba(255,249,240,.4); }
        .footer-col-title  { font-size:11px; font-weight:600; letter-spacing:.09em; text-transform:uppercase; color:rgba(255,249,240,.3); margin-bottom:14px; }
        .footer-col ul { list-style:none; }
        .footer-col ul li+li { margin-top:8px; }
        .footer-col ul a { color:rgba(255,249,240,.5); text-decoration:none; font-size:13.5px; transition:color .2s; }
        .footer-col ul a:hover { color:#fff9f0; }
        .footer-bottom { display:flex; justify-content:space-between; align-items:center; font-size:12px; color:rgba(255,249,240,.25); }

        /* ===== UTILITIES ===== */
        .fade-up { opacity:0; transform:translateY(26px); transition:opacity .65s ease, transform .65s ease; }
        .fade-up.visible { opacity:1; transform:translateY(0); }
        .delay-1 { transition-delay:.1s; }
        .delay-2 { transition-delay:.2s; }
        .delay-3 { transition-delay:.32s; }
        .btn-emas {
            display:inline-flex; align-items:center; gap:8px;
            background:var(--emas); color:#2c1810; text-decoration:none;
            font-size:14px; font-weight:600; padding:11px 24px; border-radius:8px; transition:all .2s;
        }
        .btn-emas:hover { background:#b8943d; transform:translateY(-1px); }
        .btn-merah {
            display:inline-flex; align-items:center; gap:8px;
            background:var(--merah); color:white; text-decoration:none;
            font-size:14px; font-weight:600; padding:11px 24px; border-radius:8px; transition:all .2s;
            box-shadow:0 4px 14px rgba(139,26,26,.3);
        }
        .btn-merah:hover { background:var(--merah-tua); transform:translateY(-1px); }

        @media(max-width:900px){
            .footer-top { grid-template-columns:1fr; gap:24px; }
            .footer-bottom { flex-direction:column; gap:6px; text-align:center; }
            .nav-menu { display:none; position:absolute; top:66px; left:0; right:0; background:var(--merah-tua); flex-direction:column; padding:14px; border-top:1px solid rgba(201,168,76,.15); gap:4px; }
            .nav-menu.open { display:flex; }
            .nav-toggle { display:flex; }
        }
    </style>
    {{ $styles ?? '' }}
</head>
<body>

{{-- SVG Payung Geulis (reusable) --}}
<svg style="display:none" xmlns="http://www.w3.org/2000/svg">
    <defs>
        <symbol id="payung-geulis" viewBox="0 0 120 150">
            <ellipse cx="60" cy="12" rx="4" ry="5" fill="#c9a84c"/>
            <path d="M60 8 Q63 2 60 0 Q57 2 60 8Z" fill="#c9a84c"/>
            <line x1="60" y1="14" x2="10"  y2="70" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="25"  y2="64" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="42"  y2="60" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="60"  y2="70" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="78"  y2="60" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="95"  y2="64" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <line x1="60" y1="14" x2="110" y2="70" stroke="#5c0f0f" stroke-width="1.2" stroke-linecap="round"/>
            <path d="M10 70 Q16 54 22 60 Q28 66 34 54 Q40 42 46 52 Q50 62 54 50 Q57 40 60 14 Q63 40 66 50 Q70 62 74 52 Q80 42 86 54 Q92 66 98 60 Q104 54 110 70 Q98 80 88 74 Q80 82 74 72 Q68 66 60 74 Q52 66 46 72 Q40 82 32 74 Q22 80 10 70Z" fill="#8b1a1a" stroke="#5c0f0f" stroke-width="1"/>
            <path d="M10 70 Q16 58 22 62 Q28 68 34 58 Q40 48 46 56 Q52 64 60 56 Q68 64 74 56 Q80 48 86 58 Q92 68 98 62 Q104 58 110 70 Q98 76 88 70 Q80 78 74 68 Q68 62 60 70 Q52 62 46 68 Q40 78 32 70 Q22 76 10 70Z" fill="#c0392b" opacity="0.55"/>
            <circle cx="60" cy="16" r="6" fill="#c9a84c"/>
            <circle cx="60" cy="16" r="3.5" fill="#fff9f0"/>
            <circle cx="60" cy="16" r="1.5" fill="#c9a84c"/>
            <circle cx="28" cy="65" r="4" fill="#c9a84c" opacity=".85"/>
            <circle cx="28" cy="65" r="2" fill="#fff9f0" opacity=".8"/>
            <circle cx="92" cy="65" r="4" fill="#c9a84c" opacity=".85"/>
            <circle cx="92" cy="65" r="2" fill="#fff9f0" opacity=".8"/>
            <circle cx="60" cy="72" r="4" fill="#c9a84c" opacity=".85"/>
            <circle cx="60" cy="72" r="2" fill="#fff9f0" opacity=".8"/>
            <path d="M10 70 Q16 78 22 74 Q28 70 34 78 Q40 86 46 78 Q52 70 58 78 Q64 86 70 78 Q76 70 82 78 Q88 86 94 78 Q100 70 106 74 Q112 78 110 70" fill="none" stroke="#c9a84c" stroke-width="1.8" stroke-linecap="round"/>
            <line x1="60" y1="145" x2="60" y2="72" stroke="#c9a84c" stroke-width="3.5" stroke-linecap="round"/>
            <path d="M60 145 Q47 145 47 132 Q47 118 60 118" fill="none" stroke="#c9a84c" stroke-width="3.5" stroke-linecap="round"/>
            <circle cx="47" cy="132" r="4" fill="#c9a84c"/>
        </symbol>
    </defs>
</svg>

{{-- NAVBAR PUBLIK --}}
<nav class="nav-publik" id="navPubik">
    <a href="{{ url('/') }}" class="nav-logo">
        <div class="logo-badge">
            <svg viewBox="0 0 120 150" width="30" height="38"><use href="#payung-geulis"/></svg>
        </div>
        <div>
            <div class="nav-brand-top">KAMMI</div>
            <div class="nav-brand-btm">Daerah Tasikmalaya</div>
        </div>
    </a>
    <div class="nav-menu" id="navMenu">
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'aktif' : '' }}">Beranda</a>
        <a href="{{ route('publikasi.index') }}" class="{{ request()->is('publikasi*') ? 'aktif' : '' }}">Berita</a>
        <a href="{{ route('isu-daerah.index') }}" class="{{ request()->is('isu-daerah*') ? 'aktif' : '' }}">Isu Daerah</a>
        <a href="#">Kaderisasi</a>
        <a href="#">Tentang</a>
        @auth
            <a href="{{ url('/admin') }}" class="btn-masuk">Dashboard</a>
        @else
            <a href="{{ route('login') }}" class="btn-masuk">Masuk Admin</a>
        @endauth
    </div>
    <div class="nav-toggle" onclick="document.getElementById('navMenu').classList.toggle('open')">
        <span></span><span></span><span></span>
    </div>
</nav>

<div class="page-wrap">
    {{ $slot }}
</div>

{{-- FOOTER --}}
<footer class="footer-publik">
    <div class="footer-inner">
        <div class="footer-top">
            <div>
                <svg width="44" height="55" viewBox="0 0 120 150" style="opacity:.6;" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                <div class="footer-brand-name">KAMMI Daerah Tasikmalaya</div>
                <p class="footer-brand-desc">Kesatuan Aksi Mahasiswa Muslim Indonesia Daerah Tasikmalaya — bergerak untuk keadilan, kebenaran, dan kebermanfaatan umat di Priangan Timur.</p>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Navigasi</div>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('publikasi.index') }}">Berita & Publikasi</a></li>
                    <li><a href="{{ route('isu-daerah.index') }}">Isu Daerah</a></li>
                    <li><a href="#">Daurah Marhalah</a></li>
                    <li><a href="#">Komisariat</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Tentang</div>
                <ul>
                    <li><a href="#">Visi & Misi</a></li>
                    <li><a href="#">Struktur Pengurus</a></li>
                    <li><a href="#">BKM (Biro Kemuslimahan)</a></li>
                    <li><a href="#">Kontak & Lokasi</a></li>
                    <li><a href="{{ route('login') }}">Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} KAMMI Daerah Tasikmalaya. Hak cipta dilindungi.</span>
            <span>Kota Tasikmalaya, Jawa Barat</span>
        </div>
    </div>
</footer>

<script>
const nav = document.getElementById('navPubik');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 40));
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.fade-up').forEach(el => obs.observe(el));
</script>
{{ $scripts ?? '' }}
</body>
</html>
