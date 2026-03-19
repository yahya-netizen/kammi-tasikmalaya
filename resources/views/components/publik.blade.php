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
            --merah: #8b1a1a; --merah-tua: #5c0f0f; --merah-terang: #c0392b;
            --merah-muda: #fdf2f2; --emas: #c9a84c; --krem: #faf7f2; --teks: #2c1810;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--krem); color: var(--teks); overflow-x: hidden; }
        .payung-deco { position: absolute; pointer-events: none; }
        .payung-deco.besar  { width: 220px; opacity: 0.08; }
        .payung-deco.sedang { width: 140px; opacity: 0.10; }
        .payung-deco.kecil  { width:  80px; opacity: 0.14; }

        /* ===== NAVBAR ===== */
        .nav-publik {
            position: fixed; top: 0; left: 0; right: 0; z-index: 200;
            height: 66px; display: flex; align-items: center; justify-content: space-between;
            padding: 0 2rem;
            background: rgba(92,15,15,0.98);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(201,168,76,0.18);
            transition: box-shadow 0.3s;
        }
        .nav-publik.scrolled { box-shadow: 0 4px 28px rgba(0,0,0,0.35); }
        .nav-logo { display: flex; align-items: center; gap: 10px; text-decoration: none; flex-shrink: 0; }
        .logo-badge { width:38px; height:38px; background:var(--emas); border-radius:8px; display:flex; align-items:center; justify-content:center; overflow:hidden; flex-shrink:0; }
        .nav-brand-top { font-size:14px; font-weight:600; color:white; letter-spacing:.04em; line-height:1.2; }
        .nav-brand-btm { font-size:10.5px; color:rgba(255,255,255,.5); }

        /* Menu utama */
        .nav-menu { display:flex; align-items:center; gap:2px; }

        /* Item biasa */
        .nav-menu > a {
            color:rgba(255,255,255,.75); text-decoration:none; font-size:13px; font-weight:500;
            padding:8px 12px; border-radius:6px; transition:all .2s; white-space:nowrap;
        }
        .nav-menu > a:hover, .nav-menu > a.aktif {
            color:white; background:rgba(255,255,255,.1);
        }

        /* DROPDOWN */
        .nav-dropdown { position: relative; }
        .nav-dropdown-trigger {
            display: flex; align-items: center; gap: 5px;
            color:rgba(255,255,255,.75); font-size:13px; font-weight:500;
            padding:8px 12px; border-radius:6px; cursor:pointer;
            transition:all .2s; white-space:nowrap; user-select:none;
        }
        .nav-dropdown-trigger:hover,
        .nav-dropdown.open .nav-dropdown-trigger {
            color:white; background:rgba(255,255,255,.1);
        }
        .nav-dropdown-trigger.aktif { color:white; background:rgba(255,255,255,.1); }
        .nav-dropdown-trigger svg { transition: transform .2s; flex-shrink:0; }
        .nav-dropdown.open .nav-dropdown-trigger svg { transform: rotate(180deg); }

        .nav-dropdown-panel {
            display: none;
            position: absolute; top: calc(100% + 10px); left: 0;
            background: #3d0a0a;
            border: 1px solid rgba(201,168,76,.2);
            border-radius: 12px;
            padding: 8px;
            min-width: 220px;
            box-shadow: 0 16px 40px rgba(0,0,0,.4);
            z-index: 300;
        }
        .nav-dropdown.open .nav-dropdown-panel { display: block; }
        .nav-dropdown-panel a {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 8px;
            color: rgba(255,249,240,.75); text-decoration: none;
            font-size: 13px; font-weight: 500;
            transition: all .2s;
        }
        .nav-dropdown-panel a:hover { background: rgba(255,255,255,.08); color: #fff9f0; }
        .nav-dropdown-panel a.aktif { background: rgba(201,168,76,.15); color: var(--emas); }
        .nav-dropdown-panel .drop-icon {
            width: 28px; height: 28px; background: rgba(201,168,76,.12);
            border-radius: 6px; display: flex; align-items: center; justify-content: center;
            font-size: 14px; flex-shrink: 0;
        }
        .nav-dropdown-panel .drop-divider {
            height: 1px; background: rgba(201,168,76,.12); margin: 6px 8px;
        }

        /* Tombol auth */
        .btn-masuk {
            display: inline-flex; align-items: center; gap: 7px;
            background: var(--emas); color: #2c1810 !important;
            font-size: 13px; font-weight: 600;
            padding: 8px 16px; border-radius: 8px;
            text-decoration: none; transition: all .2s;
            margin-left: 6px; white-space: nowrap;
        }
        .btn-masuk:hover { background: #b8943d; }

        /* User dropdown (sudah login) */
        .user-dropdown { position: relative; }
        .user-trigger {
            display: flex; align-items: center; gap: 8px;
            background: rgba(255,255,255,.08); border: 1px solid rgba(201,168,76,.25);
            border-radius: 8px; padding: 6px 12px 6px 8px;
            cursor: pointer; color: rgba(255,249,240,.85); font-size: 13px;
            font-weight: 500; transition: all .2s; margin-left: 6px;
        }
        .user-trigger:hover { background: rgba(255,255,255,.13); }
        .user-avatar {
            width: 26px; height: 26px; border-radius: 50%;
            background: var(--emas); display: flex; align-items: center;
            justify-content: center; font-size: 11px; font-weight: 700; color: #2c1810;
            overflow: hidden; flex-shrink: 0;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-panel {
            display: none; position: absolute; top: calc(100% + 10px); right: 0;
            background: #3d0a0a; border: 1px solid rgba(201,168,76,.2);
            border-radius: 12px; padding: 8px; min-width: 200px;
            box-shadow: 0 16px 40px rgba(0,0,0,.4); z-index: 300;
        }
        .user-dropdown.open .user-panel { display: block; }
        .user-panel-header { padding: 10px 14px 12px; border-bottom: 1px solid rgba(201,168,76,.12); margin-bottom: 6px; }
        .user-panel-name  { font-size: 13.5px; font-weight: 600; color: #fff9f0; }
        .user-panel-email { font-size: 11.5px; color: rgba(255,249,240,.45); margin-top: 2px; }
        .user-panel a {
            display: flex; align-items: center; gap: 10px; padding: 9px 14px;
            border-radius: 8px; color: rgba(255,249,240,.75); text-decoration: none;
            font-size: 13px; font-weight: 500; transition: all .2s;
        }
        .user-panel a:hover { background: rgba(255,255,255,.08); color: #fff9f0; }
        .user-panel .logout-btn {
            width: 100%; text-align: left; background: none; border: none;
            cursor: pointer; font-family: inherit;
            display: flex; align-items: center; gap: 10px; padding: 9px 14px;
            border-radius: 8px; color: rgba(255,100,100,.8); font-size: 13px; font-weight: 500;
            transition: all .2s;
        }
        .user-panel .logout-btn:hover { background: rgba(255,0,0,.08); color: #ff8080; }

        /* Hamburger */
        .nav-toggle { display:none; flex-direction:column; gap:5px; cursor:pointer; padding:6px; flex-shrink:0; }
        .nav-toggle span { display:block; width:22px; height:2px; background:white; border-radius:2px; transition: all .3s; }

        /* PAGE WRAP */
        .page-wrap { padding-top: 66px; }

        /* PAGE HEADER */
        .page-header { background: var(--merah-tua); padding: 52px 2.5rem 44px; position: relative; overflow: hidden; }
        .page-header::before { content:''; position:absolute; inset:0; background-image: repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 28px); }
        .page-header-inner { max-width:1200px; margin:0 auto; position:relative; z-index:1; }
        .breadcrumb { display:flex; align-items:center; gap:8px; margin-bottom:12px; font-size:13px; color:rgba(255,249,240,.5); }
        .breadcrumb a { color:rgba(255,249,240,.6); text-decoration:none; transition:color .2s; }
        .breadcrumb a:hover { color:#fff9f0; }
        .breadcrumb-sep { font-size:11px; opacity:.4; }
        .page-header h1 { font-family:'Playfair Display',serif; font-size:clamp(1.6rem,2.5vw,2.2rem); color:#fff9f0; }
        .page-header p { margin-top:8px; font-size:14px; color:rgba(255,249,240,.6); }

        /* FOOTER */
        .footer-publik { background: #3a0a0a; color:rgba(255,249,240,.55); padding:52px 2.5rem 28px; }
        .footer-inner  { max-width:1200px; margin:0 auto; }
        .footer-top { display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:48px; padding-bottom:36px; border-bottom:1px solid rgba(201,168,76,.12); margin-bottom:24px; }
        .footer-brand-name { font-family:'Playfair Display',serif; font-size:1.1rem; color:#fff9f0; margin:12px 0 8px; }
        .footer-brand-desc { font-size:13px; line-height:1.75; color:rgba(255,249,240,.4); }
        .footer-col-title { font-size:11px; font-weight:600; letter-spacing:.09em; text-transform:uppercase; color:rgba(255,249,240,.3); margin-bottom:14px; }
        .footer-col ul { list-style:none; }
        .footer-col ul li+li { margin-top:8px; }
        .footer-col ul a { color:rgba(255,249,240,.5); text-decoration:none; font-size:13.5px; transition:color .2s; }
        .footer-col ul a:hover { color:#fff9f0; }
        .footer-bottom { display:flex; justify-content:space-between; align-items:center; font-size:12px; color:rgba(255,249,240,.25); }

        /* UTILITIES */
        .fade-up { opacity:0; transform:translateY(26px); transition:opacity .65s ease, transform .65s ease; }
        .fade-up.visible { opacity:1; transform:translateY(0); }
        .delay-1 { transition-delay:.1s; } .delay-2 { transition-delay:.2s; } .delay-3 { transition-delay:.32s; }
        .btn-emas { display:inline-flex; align-items:center; gap:8px; background:var(--emas); color:#2c1810; text-decoration:none; font-size:14px; font-weight:600; padding:11px 24px; border-radius:8px; transition:all .2s; }
        .btn-emas:hover { background:#b8943d; transform:translateY(-1px); }
        .btn-merah { display:inline-flex; align-items:center; gap:8px; background:var(--merah); color:white; text-decoration:none; font-size:14px; font-weight:600; padding:11px 24px; border-radius:8px; transition:all .2s; box-shadow:0 4px 14px rgba(139,26,26,.3); }
        .btn-merah:hover { background:var(--merah-tua); transform:translateY(-1px); }

        /* MOBILE NAV */
        @media(max-width:1024px){
            .nav-menu {
                display: none; position: absolute; top: 66px; left: 0; right: 0;
                background: #3d0a0a; flex-direction: column; align-items: stretch;
                padding: 12px; border-top: 1px solid rgba(201,168,76,.15);
                gap: 2px; max-height: calc(100vh - 66px); overflow-y: auto;
            }
            .nav-menu.open { display: flex; }
            .nav-menu > a { font-size: 14px; padding: 10px 14px; }
            .nav-dropdown-trigger { font-size: 14px; padding: 10px 14px; }
            .nav-dropdown-panel {
                position: static; background: rgba(255,255,255,.05);
                border: none; border-radius: 8px; padding: 4px 0 4px 12px;
                box-shadow: none; margin-top: 2px;
            }
            .nav-dropdown-panel a { font-size: 13.5px; }
            .nav-dropdown.open .nav-dropdown-panel { display: block; }
            .user-trigger { margin-left: 0; margin-top: 4px; }
            .user-panel { position: static; box-shadow: none; border: none; background: rgba(255,255,255,.05); border-radius: 8px; margin-top: 4px; }
            .btn-masuk { margin-left: 0; margin-top: 4px; }
            .nav-toggle { display: flex; }
        }
        @media(max-width:900px){
            .footer-top { grid-template-columns:1fr; gap:24px; }
            .footer-bottom { flex-direction:column; gap:6px; text-align:center; }
        }
    </style>
    {{ $styles ?? '' }}
</head>
<body>

{{-- SVG Payung Geulis --}}
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

{{-- ===== NAVBAR ===== --}}
<nav class="nav-publik" id="navPublik">
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

        {{-- Beranda --}}
        <a href="{{ url('/') }}" class="{{ request()->is('/') ? 'aktif' : '' }}">Beranda</a>

        {{-- Kaderisasi dropdown --}}
        <div class="nav-dropdown" id="drop-kaderisasi">
            <div class="nav-dropdown-trigger {{ request()->is('kaderisasi*') ? 'aktif' : '' }}"
                 onclick="toggleDrop('drop-kaderisasi')">
                Kaderisasi
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('kaderisasi.index') }}" class="{{ request()->is('kaderisasi') ? 'aktif' : '' }}">
                    <span class="drop-icon">📋</span> Informasi Daurah Marhalah
                </a>
                <a href="{{ route('kaderisasi.index') }}#jadwal" class="{{ request()->is('kaderisasi*daftar*') ? 'aktif' : '' }}">
                    <span class="drop-icon">✍️</span> Pendaftaran Daurah Marhalah
                </a>
                <div class="drop-divider"></div>
                <a href="{{ route('komisariat.index') }}">
                    <span class="drop-icon">🏛️</span> Data Komisariat
                </a>
            </div>
        </div>

        {{-- Berita dropdown --}}
        <div class="nav-dropdown" id="drop-berita">
            <div class="nav-dropdown-trigger {{ request()->is('publikasi*') || request()->is('isu-daerah*') || request()->is('agenda*') ? 'aktif' : '' }}"
                 onclick="toggleDrop('drop-berita')">
                Berita
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('publikasi.index') }}" class="{{ request()->is('publikasi*') ? 'aktif' : '' }}">
                    <span class="drop-icon">📰</span> Publikasi & Opini
                </a>
                <a href="{{ route('isu-daerah.index') }}" class="{{ request()->is('isu-daerah*') ? 'aktif' : '' }}">
                    <span class="drop-icon">📣</span> Isu Daerah
                </a>
                <a href="{{ route('agenda.index') }}" class="{{ request()->is('agenda*') ? 'aktif' : '' }}">
                    <span class="drop-icon">📅</span> Agenda KAMMI Tasik
                </a>
            </div>
        </div>

        {{-- BKM --}}
        <a href="{{ route('bkm.index') }}" class="{{ request()->is('bkm*') ? 'aktif' : '' }}">BKM</a>

        {{-- Tentang dropdown --}}
        <div class="nav-dropdown" id="drop-tentang">
            <div class="nav-dropdown-trigger {{ request()->is('tentang*') ? 'aktif' : '' }}"
                 onclick="toggleDrop('drop-tentang')">
                Tentang KAMMI
                <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('tentang.sejarah') }}" class="{{ request()->is('tentang/sejarah') ? 'aktif' : '' }}">
                    <span class="drop-icon">📖</span> Sejarah KAMMI Tasikmalaya
                </a>
                <a href="{{ route('tentang.visi-misi') }}" class="{{ request()->is('tentang/visi-misi') ? 'aktif' : '' }}">
                    <span class="drop-icon">🎯</span> Visi & Misi
                </a>
                <div class="drop-divider"></div>
                <a href="{{ route('tentang.mars') }}" class="{{ request()->is('tentang/mars') ? 'aktif' : '' }}">
                    <span class="drop-icon">🎵</span> Mars KAMMI
                </a>
                <a href="{{ route('tentang.hymne') }}" class="{{ request()->is('tentang/hymne') ? 'aktif' : '' }}">
                    <span class="drop-icon">🎶</span> Hymne KAMMI
                </a>
            </div>
        </div>

        {{-- Kontak --}}
        <a href="{{ route('kontak.index') }}" class="{{ request()->is('kontak*') ? 'aktif' : '' }}">Kontak</a>

        {{-- AUTH --}}
        @guest
            <a href="{{ route('login') }}" class="btn-masuk">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4"/><polyline points="10 17 15 12 10 7"/><line x1="15" y1="12" x2="3" y2="12"/></svg>
                Masuk
            </a>
        @else
            <div class="user-dropdown" id="drop-user">
                <div class="user-trigger" onclick="toggleDrop('drop-user')">
                    <div class="user-avatar">
                        @if(Auth::user()->avatar)
                            <img src="{{ Auth::user()->avatar }}" alt="">
                        @else
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        @endif
                    </div>
                    {{ Str::limit(Auth::user()->name, 14) }}
                    <svg width="11" height="11" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                </div>
                <div class="user-panel">
                    <div class="user-panel-header">
                        <div class="user-panel-name">{{ Auth::user()->name }}</div>
                        <div class="user-panel-email">{{ Auth::user()->email }}</div>
                    </div>
                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('super_admin'))
                        <a href="{{ url('/admin') }}">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            Dashboard Admin
                        </a>
                    @endif
                    <a href="{{ route('profil.index') }}">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                        Profil Saya
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        @endguest

    </div>

    <div class="nav-toggle" id="navToggle" onclick="document.getElementById('navMenu').classList.toggle('open')">
        <span></span><span></span><span></span>
    </div>
</nav>

{{-- KONTEN --}}
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
                    <li><a href="{{ route('kaderisasi.index') }}">Daurah Marhalah</a></li>
                    <li><a href="{{ route('komisariat.index') }}">Komisariat</a></li>
                    <li><a href="{{ route('agenda.index') }}">Agenda</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Tentang</div>
                <ul>
                    <li><a href="{{ route('tentang.sejarah') }}">Sejarah KAMMI</a></li>
                    <li><a href="{{ route('tentang.visi-misi') }}">Visi & Misi</a></li>
                    <li><a href="{{ route('bkm.index') }}">BKM Kemuslimahan</a></li>
                    <li><a href="{{ route('kontak.index') }}">Kontak Kami</a></li>
                    <li><a href="{{ route('login') }}">Login Admin</a></li>
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
// Navbar scroll
const nav = document.getElementById('navPublik');
window.addEventListener('scroll', () => nav.classList.toggle('scrolled', scrollY > 40));

// Dropdown toggle
function toggleDrop(id) {
    const el = document.getElementById(id);
    const isOpen = el.classList.contains('open');
    // Tutup semua dropdown lain
    document.querySelectorAll('.nav-dropdown, .user-dropdown').forEach(d => d.classList.remove('open'));
    if (!isOpen) el.classList.add('open');
}

// Tutup dropdown kalau klik di luar
document.addEventListener('click', e => {
    if (!e.target.closest('.nav-dropdown') && !e.target.closest('.user-dropdown')) {
        document.querySelectorAll('.nav-dropdown, .user-dropdown').forEach(d => d.classList.remove('open'));
    }
});

// Fade up observer
const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.fade-up').forEach(el => obs.observe(el));
</script>
{{ $scripts ?? '' }}
</body>
</html>
