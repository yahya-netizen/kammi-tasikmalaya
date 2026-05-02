@props(['title' => null, 'description' => null, 'image' => null, 'styles' => null, 'scripts' => null])

@php
    // Judul & Deskripsi
    if ($title) SEO::setTitle($title);
    if ($description) SEO::setDescription($description);

    // Image SEO (Fallback ke Favicon jika tidak ada)
    $seoImage = $image ?? asset('favicon.ico');
    SEO::opengraph()->addImage($seoImage);
    SEO::twitter()->setImage($seoImage);

    // JSON-LD (Schema.org) untuk Google
    SEO::jsonLd()->setTitle($title ?? SEO::getTitle());
    SEO::jsonLd()->setDescription($description ?? SEO::getDescription());
    SEO::jsonLd()->addImage($seoImage);
    SEO::jsonLd()->setType('WebPage');
@endphp

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    {!! SEO::generate() !!}
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=DM+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    @yield('styles')
    {!! $styles ?? '' !!}
    
    <style>
        :root {
            /* Palette KAMMI - Updated to #FF0000 Base */
            --merah: #FF0000; 
            --merah-tua: #8b0000; 
            --merah-terang: #ff4d4d;
            --merah-muda: #fff5f5; 
            
            --emas: #c9a84c; 
            --emas-tua: #b8943d;
            --emas-muda: #fef3c7;

            --krem: #fcfaf7; 
            --putih-transparan: rgba(255, 255, 255, 0.9);
            
            --teks: #1a0f0a;
            --teks-secondary: #5a3e3e;
            --border: rgba(201,168,76,0.15);
        }

        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body { font-family: 'DM Sans', sans-serif; background: var(--krem); color: var(--teks); overflow-x: hidden; line-height: 1.6; }
        
        /* Typography Standards */
        h1, h2, h3, h4, h5, h6, .font-serif { font-family: 'Playfair Display', serif; }
        p, span, div, li, .font-sans { font-family: 'DM Sans', sans-serif; }

        /* ===== GLOBAL UTILITIES ===== */
        .section { padding: 80px 2.5rem; position: relative; }
        .section-inner { max-width: 1200px; margin: 0 auto; width: 100%; }
        
        /* Section Headers */
        .sec-label { display:inline-flex; align-items:center; gap:8px; font-size:11px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:var(--merah); margin-bottom:12px; }
        .sec-label::before { content:''; width:24px; height:2px; background:var(--emas); border-radius:2px; }
        .sec-title { font-size:clamp(2rem, 3.5vw, 2.8rem); line-height:1.15; color:var(--merah-tua); margin-bottom:18px; }
        .sec-desc { font-size:16px; color:var(--teks-secondary); max-width:640px; margin-bottom:40px; line-height: 1.7; }

        /* Animations */
        .fade-up { opacity:0; transform:translateY(30px); transition: opacity 0.8s cubic-bezier(0.16, 1, 0.3, 1), transform 0.8s cubic-bezier(0.16, 1, 0.3, 1); }
        .fade-up.visible { opacity:1; transform:translateY(0); }
        .delay-1 { transition-delay: 0.1s; }
        .delay-2 { transition-delay: 0.2s; }
        .delay-3 { transition-delay: 0.3s; }

        /* ===== BUTTONS ===== */
        .btn-emas { 
            display:inline-flex; align-items:center; gap:8px; background:var(--emas); color:#2c1810; 
            text-decoration:none; font-size:14px; font-weight:600; padding:12px 26px; border-radius:100px; 
            transition:all .3s; border:none; cursor:pointer; letter-spacing: 0.02em;
        }
        .btn-emas:hover { background:var(--emas-tua); transform:translateY(-2px); box-shadow: 0 8px 20px rgba(201,168,76,0.3); }

        .btn-merah { 
            display:inline-flex; align-items:center; gap:8px; background:var(--merah); color:white; 
            text-decoration:none; font-size:14px; font-weight:600; padding:12px 26px; border-radius:100px; 
            transition:all .3s; border:none; cursor:pointer; letter-spacing: 0.02em;
        }
        .btn-merah:hover { background:var(--merah-tua); transform:translateY(-2px); box-shadow: 0 8px 20px rgba(139,26,26,0.3); }

        .btn-outline {
            display:inline-flex; align-items:center; gap:8px; background:transparent; color:var(--merah); 
            text-decoration:none; font-size:14px; font-weight:600; padding:11px 25px; border-radius:100px; 
            border:1.5px solid var(--border); transition:all .3s; letter-spacing: 0.02em;
        }
        .btn-outline:hover { border-color:var(--merah); color:var(--merah-tua); background: var(--merah-muda); }

        /* ===== CARDS (Standardized) ===== */
        .card-kammi {
            background: white; border: 1px solid var(--border); border-radius: 16px; overflow: hidden;
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1); display: flex; flex-direction: column; height: 100%;
            text-decoration: none; color: inherit;
        }
        .card-kammi:hover { transform: translateY(-6px); box-shadow: 0 20px 40px rgba(139, 26, 26, 0.08); border-color: rgba(201,168,76,0.4); }
        .card-img { height: 200px; width: 100%; object-fit: cover; background: var(--krem); }
        .card-body { padding: 24px; display: flex; flex-direction: column; flex-grow: 1; }
        .card-meta { display: flex; gap: 10px; margin-bottom: 12px; font-size: 11px; font-weight: 600; letter-spacing: 0.05em; text-transform: uppercase; color: var(--emas-tua); }
        .card-title { font-size: 18px; font-weight: 700; color: var(--teks); margin-bottom: 10px; line-height: 1.4; transition: color 0.3s; }
        .card-kammi:hover .card-title { color: var(--merah); }
        .card-desc { font-size: 14px; color: var(--teks-secondary); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; }
        .card-footer { border-top: 1px solid rgba(0,0,0,0.05); padding-top: 16px; display: flex; justify-content: space-between; align-items: center; font-size: 12px; color: #9ca3af; }

        /* ===== PAGE HEADER (Reusable) ===== */
        .page-header { 
            background: #fef3c7; 
            padding: 120px 2.5rem 60px; 
            position: relative; 
            overflow: hidden; 
            text-align: center;
        }
        .page-header::before { 
            content: none;
        }
        .page-header::after {
            content:''; position:absolute; bottom:0; left:0; right:0; height:60px;
            background: linear-gradient(to top, var(--krem) 0%, transparent 100%);
        }
        .page-header-inner { max-width: 800px; margin: 0 auto; position: relative; z-index: 5; }
        .page-title { color: var(--merah-tua); font-size: clamp(2.2rem, 4.5vw, 3.5rem); margin-bottom: 16px; line-height: 1.1; }
        .page-subtitle { color: var(--teks-secondary); font-size: 16px; max-width: 600px; margin: 0 auto; line-height: 1.8; opacity: 0.9; }
        
        .breadcrumb { display: flex; justify-content: center; align-items: center; gap: 10px; margin-bottom: 24px; font-size: 11px; text-transform: uppercase; letter-spacing: 0.15em; font-weight: 600; }
        .breadcrumb a { color: var(--merah-tua); text-decoration: none; transition: all 0.2s; opacity: 0.7; }
        .breadcrumb a:hover { color: var(--merah); opacity: 1; transform: translateY(-1px); }
        .breadcrumb span { color: rgba(139,0,0,0.2); }
        .breadcrumb .current { color: var(--merah-tua); font-weight: 700; }

        /* ===== NAVBAR ===== */
        .nav-publik {
            position: fixed; top: 0; left: 0; right: 0; z-index: 200;
            height: 76px; display: flex; align-items: center; justify-content: space-between;
            padding: 0 3rem; background: rgba(92,15,15,0.9); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255,255,255,0.08); transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .nav-publik.scrolled { height: 66px; background: rgba(92,15,15,0.98); box-shadow: 0 10px 30px rgba(0,0,0,0.2); }
        
        .nav-logo { display: flex; align-items: center; gap: 12px; text-decoration: none; }
        .logo-badge { width:42px; height:42px; background:var(--emas); border-radius:10px; display:flex; align-items:center; justify-content:center; overflow:hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.15); }
        .nav-brand-top { font-size:16px; font-weight:700; color:white; letter-spacing:.02em; line-height:1; font-family: 'Playfair Display', serif; }
        .nav-brand-btm { font-size:11px; color:rgba(255,255,255,.6); font-weight:500; margin-top: 3px; letter-spacing: 0.02em; }

        .nav-menu { display:flex; align-items:center; gap:6px; }
        .nav-menu > a {
            color:rgba(255,255,255,.8); text-decoration:none; font-size:13.5px; font-weight:500;
            padding:8px 16px; border-radius:100px; transition:all .25s;
        }
        .nav-menu > a:hover, .nav-menu > a.aktif { color:white; background:rgba(255,255,255,.1); }

        /* Dropdown Styling */
        .nav-dropdown { position: relative; }
        .nav-dropdown-trigger {
            display: flex; align-items: center; gap: 6px; color:rgba(255,255,255,.8);
            font-size:13.5px; font-weight:500; padding:8px 16px; border-radius:100px;
            cursor:pointer; transition:all .25s; user-select:none;
        }
        .nav-dropdown-trigger:hover, .nav-dropdown.open .nav-dropdown-trigger { color:white; background:rgba(255,255,255,.1); }
        .nav-dropdown-trigger.aktif { color:white; background:rgba(255,255,255,.1); }
        .nav-dropdown-panel {
            display: none; position: absolute; top: calc(100% + 14px); left: 0;
            background: #3d0a0a; border: 1px solid rgba(255,255,255,0.08);
            border-radius: 16px; padding: 12px; min-width: 280px;
            box-shadow: 0 20px 50px rgba(0,0,0,.4); z-index: 300;
        }
        .nav-dropdown.open .nav-dropdown-panel { display: block; animation: navDrop 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        @keyframes navDrop { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .nav-dropdown-panel a {
            display: flex; align-items: center; gap: 12px; padding: 12px 16px;
            border-radius: 10px; color: rgba(255,249,240,.7); text-decoration: none;
            font-size: 13.5px; font-weight: 500; transition: all .2s;
        }
        .nav-dropdown-panel a:hover { background: rgba(255,255,255,.06); color: white; transform: translateX(4px); }
        .nav-dropdown-panel a.aktif { background: rgba(201,168,76,.15); color: var(--emas); }
        .drop-divider { height: 1px; background: rgba(255,255,255,0.08); margin: 8px 12px; }

        /* USER DROPDOWN SPECIFIC */
        .user-dropdown { position: relative; }
        .user-trigger {
            display: flex; align-items: center; gap: 10px; padding: 6px 16px 6px 8px;
            background: rgba(255,255,255,0.08); border: 1px solid rgba(201,168,76,0.3);
            border-radius: 100px; cursor: pointer; transition: all 0.3s;
            margin-left: 10px;
        }
        .user-trigger:hover { background: rgba(255,255,255,0.15); border-color: var(--emas); }
        .user-avatar {
            width: 32px; height: 32px; border-radius: 50%; overflow: hidden;
            background: var(--emas); border: 2px solid rgba(255,255,255,0.2);
            display: flex; align-items: center; justify-content: center;
        }
        .user-avatar img { width: 100%; height: 100%; object-fit: cover; }
        .user-trigger span { font-size: 13.5px; font-weight: 600; color: white; }
        
        .user-panel {
            display: none; position: absolute; top: calc(100% + 14px); right: 0;
            background: #3d0a0a; border: 1px solid rgba(255,255,255,0.1);
            border-radius: 20px; padding: 12px; min-width: 260px;
            box-shadow: 0 25px 60px rgba(0,0,0,0.5); z-index: 300;
        }
        .user-dropdown.open .user-panel { display: block; animation: navDrop 0.3s cubic-bezier(0.16, 1, 0.3, 1); }
        
        .user-panel-header { padding: 16px; border-bottom: 1px solid rgba(255,255,255,0.08); margin-bottom: 8px; }
        .user-name { font-size: 14px; font-weight: 700; color: white; display: block; }
        .user-email { font-size: 11px; color: rgba(255,255,255,0.5); margin-top: 2px; display: block; }
        .user-role-badge { 
            display: inline-block; margin-top: 8px; font-size: 9px; font-weight: 800; 
            text-transform: uppercase; letter-spacing: 0.05em; padding: 3px 10px; 
            border-radius: 6px; background: rgba(201,168,76,0.15); color: var(--emas);
            border: 1px solid rgba(201,168,76,0.2);
        }

        .user-panel a, .logout-btn {
            display: flex; align-items: center; gap: 12px; padding: 12px 16px;
            border-radius: 12px; color: rgba(255,249,240,.7); text-decoration: none;
            font-size: 13.5px; font-weight: 500; transition: all 0.2s;
        }
        .user-panel a:hover { background: rgba(255,255,255,0.06); color: white; transform: translateX(4px); }
        .logout-btn { 
            width: 100%; text-align: left; background: none; border: none; 
            cursor: pointer; font-family: inherit; color: #ff8080;
        }
        .logout-btn:hover { background: rgba(255,0,0,0.08); color: #ff4d4d; }

        /* Mobile Adjustments */
        .nav-toggle { display:none; flex-direction:column; gap:6px; cursor:pointer; padding:8px; }
        .nav-toggle span { display:block; width:26px; height:2px; background:white; border-radius:2px; transition: all .3s; }

        /* ===== FOOTER ===== */
        .footer-publik { background: #2a0505; color:rgba(255,249,240,.5); padding:80px 3rem 40px; border-top: 1px solid var(--border); position: relative; overflow: hidden; }
        .footer-brand-name { font-family:'Playfair Display',serif; font-size:1.4rem; color:#fff9f0; margin-bottom:15px; }
        .footer-col-title { font-size:11px; font-weight:700; letter-spacing:.15em; text-transform:uppercase; color:var(--emas); margin-bottom:24px; }
        .footer-col ul { list-style:none; padding:0; }
        .footer-col ul li { margin-bottom: 14px; }
        .footer-col ul a { color:rgba(255,249,240,.5); text-decoration:none; font-size:14px; transition:all .2s; display: inline-flex; align-items: center; gap: 0; }
        .footer-col ul a:hover { color:white; gap: 8px; color: var(--emas); }
        .footer-bottom { border-top: 1px solid rgba(255,255,255,0.05); padding-top: 30px; margin-top: 60px; display:flex; justify-content:space-between; align-items:center; font-size:13px; color: rgba(255,255,255,0.3); }

        @media(max-width:1024px){
            .nav-publik { padding: 0 1.5rem; }
            .nav-menu {
                display: none; position: absolute; top: 76px; left: 0; right: 0;
                background: #3d0a0a; flex-direction: column; align-items: stretch;
                padding: 24px; border-top: 1px solid rgba(255,255,255,0.08); gap: 8px;
                max-height: calc(100vh - 76px); overflow-y: auto;
            }
            .nav-menu.open { display: flex; }
            .nav-toggle { display: flex; }
            .nav-dropdown-panel, .user-panel { position: static; background: rgba(0,0,0,0.2); border: none; box-shadow: none; margin-top: 5px; padding-left: 15px; min-width: auto; animation: none; }
            .user-trigger { margin: 10px 0 0 0; padding: 10px; width: 100%; justify-content: flex-start; }
            .section { padding: 60px 1.5rem; }
            .footer-publik { padding: 60px 1.5rem 30px; }
            .footer-top { grid-template-columns: 1fr !important; gap: 40px !important; }
            .footer-bottom { flex-direction: column; gap: 12px; text-align: center; }
        }
    </style>
    {!! $styles !!}
</head>
<body>

{{-- Pattern Ornamen Global (Payung Geulis) --}}
<svg style="display:none" xmlns="http://www.w3.org/2000/svg">
    <symbol id="payung-geulis" viewBox="0 0 120 150">
        <ellipse cx="60" cy="12" rx="4" ry="5" fill="#c9a84c"/>
        <path d="M60 8 Q63 2 60 0 Q57 2 60 8Z" fill="#c9a84c"/>
        <line x1="60" y1="14" x2="10"  y2="70" stroke="#8b0000" stroke-width="1.2" stroke-linecap="round"/>
        <line x1="60" y1="14" x2="110" y2="70" stroke="#8b0000" stroke-width="1.2" stroke-linecap="round"/>
        <path d="M10 70 Q16 54 22 60 Q28 66 34 54 Q40 42 46 52 Q50 62 54 50 Q57 40 60 14 Q63 40 66 50 Q70 62 74 52 Q80 42 86 54 Q92 66 98 60 Q104 54 110 70 Q98 80 88 74 Q80 82 74 72 Q68 66 60 74 Q52 66 46 72 Q40 82 32 74 Q22 80 10 70Z" fill="#FF0000" stroke="#8b0000" stroke-width="1"/>
        <path d="M10 70 Q16 78 22 74 Q28 70 34 78 Q40 86 46 78 Q52 70 58 78 Q64 86 70 78 Q76 70 82 78 Q88 86 94 78 Q100 70 106 74 Q112 78 110 70" fill="none" stroke="#c9a84c" stroke-width="1.8" stroke-linecap="round"/>
        <line x1="60" y1="145" x2="60" y2="72" stroke="#c9a84c" stroke-width="3.5" stroke-linecap="round"/>
    </symbol>
</svg>

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

    <div class="nav-toggle" id="navToggle" onclick="toggleNav()">
        <span></span><span></span><span></span>
    </div>

    <div class="nav-menu" id="navMenu">
        <a href="{{ url('/') }}" class="{{ request()->routeIs('home') ? 'aktif' : '' }}">Beranda</a>

        <div class="nav-dropdown" id="drop-kaderisasi">
            <div class="nav-dropdown-trigger {{ request()->is('kaderisasi*') || request()->is('komisariat*') ? 'aktif' : '' }}" onclick="toggleDrop('drop-kaderisasi', event)">
                Kaderisasi <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('kaderisasi.index') }}" class="{{ request()->routeIs('kaderisasi.index') ? 'aktif' : '' }}">📋 Informasi Daurah Marhalah</a>
                <a href="{{ route('kaderisasi.index') }}#jadwal" onclick="closeNav()">✍️ Pendaftaran Daurah Marhalah</a>
                <div class="drop-divider"></div>
                <a href="{{ route('komisariat.index') }}" class="{{ request()->is('komisariat*') ? 'aktif' : '' }}">🏛️ Data Komisariat</a>
            </div>
        </div>

        <div class="nav-dropdown" id="drop-berita">
            <div class="nav-dropdown-trigger {{ request()->is('publikasi*') || request()->is('isu-daerah*') || request()->is('agenda*') ? 'aktif' : '' }}" onclick="toggleDrop('drop-berita', event)">
                Berita <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('publikasi.index') }}" class="{{ request()->is('publikasi*') ? 'aktif' : '' }}">📰 Publikasi & Opini</a>
                <a href="{{ route('isu-daerah.index') }}" class="{{ request()->is('isu-daerah*') ? 'aktif' : '' }}">📣 Isu Daerah</a>
                <a href="{{ route('agenda.index') }}" class="{{ request()->is('agenda*') ? 'aktif' : '' }}">📅 Agenda KAMMI Tasik</a>
            </div>
        </div>

        <a href="{{ route('bkm.index') }}" class="{{ request()->is('bkm*') ? 'aktif' : '' }}">BKM</a>

        <a href="{{ route('gallery.index') }}" class="{{ request()->routeIs('gallery.index') ? 'aktif' : '' }}">Galeri</a>

        <div class="nav-dropdown" id="drop-tentang">
            <div class="nav-dropdown-trigger {{ request()->is('tentang*') ? 'aktif' : '' }}" onclick="toggleDrop('drop-tentang', event)">
                Tentang KAMMI <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
            <div class="nav-dropdown-panel">
                <a href="{{ route('tentang.sejarah') }}" class="{{ request()->routeIs('tentang.sejarah') ? 'aktif' : '' }}">📖 Sejarah KAMMI</a>
                <a href="{{ route('tentang.visi-misi') }}" class="{{ request()->routeIs('tentang.visi-misi') ? 'aktif' : '' }}">🎯 Visi & Misi</a>
                <div class="drop-divider"></div>
                <a href="{{ route('tentang.mars') }}" class="{{ request()->routeIs('tentang.mars') ? 'aktif' : '' }}">🎵 Mars KAMMI</a>
                <a href="{{ route('tentang.hymne') }}" class="{{ request()->routeIs('tentang.hymne') ? 'aktif' : '' }}">🎶 Hymne KAMMI</a>
            </div>
        </div>

        <a href="{{ route('kontak.index') }}" class="{{ request()->routeIs('kontak.index') ? 'aktif' : '' }}">Kontak</a>

        @guest
            <a href="{{ route('login') }}" class="btn-masuk">Masuk</a>
        @else
            @php /** @var \App\Models\User $user */ $user = auth()->user(); @endphp
            <div class="user-dropdown" id="drop-user">
                <div class="user-trigger" onclick="toggleDrop('drop-user', event)">
                    <div class="user-avatar"><img src="{{ $user->avatar_url }}" alt="Avatar"></div>
                    <span>{{ str()->limit($user->name, 10) }}</span>
                    <svg width="10" height="10" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
                </div>
                <div class="user-panel">
                    <div class="user-panel-header">
                        <span class="user-name">{{ $user->name }}</span>
                        <span class="user-email">{{ $user->email }}</span>
                        <span class="user-role-badge">{{ $user->role }}</span>
                    </div>
                    
                    {{-- Menu Dashboard --}}
                    @if($user->hasRole('admin') || $user->hasRole('super_admin'))
                        <a href="{{ url('/admin') }}" style="color: var(--emas);">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/></svg>
                            Panel Admin
                        </a>
                    @else
                        <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'aktif' : '' }}">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
                            Dashboard Saya
                        </a>
                    @endif

                    <a href="{{ route('profil.index') }}" class="{{ request()->routeIs('profil.index') ? 'aktif' : '' }}">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                        Edit Profil
                    </a>

                    <div class="drop-divider"></div>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
                            Keluar
                        </button>
                    </form>
                </div>
            </div>
        @endguest
    </div>
</nav>

<div class="page-wrap">
    @if(isset($slot) && $slot->isNotEmpty())
        {{ $slot }}
    @else
        @yield('content')
    @endif
</div>

<footer class="footer-publik">
    <div class="footer-inner section-inner">
        <div class="footer-top" style="display:grid; grid-template-columns:1.5fr 1fr 1fr; gap:60px;">
            <div>
                <svg width="50" height="65" viewBox="0 0 120 150" style="opacity:.8; margin-bottom:15px;"><use href="#payung-geulis"/></svg>
                <div class="footer-brand-name">KAMMI Daerah Tasikmalaya</div>
                <p style="font-size:14px; line-height:1.7;">Kesatuan Aksi Mahasiswa Muslim Indonesia (KAMMI) Daerah Tasikmalaya — Bergerak menghadirkan solusi untuk umat dan bangsa di bumi Priangan Timur.</p>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Navigasi Utama</div>
                <ul>
                    <li><a href="{{ url('/') }}">Beranda</a></li>
                    <li><a href="{{ route('kaderisasi.index') }}">Informasi Kaderisasi</a></li>
                    <li><a href="{{ route('publikasi.index') }}">Berita & Publikasi</a></li>
                    <li><a href="{{ route('isu-daerah.index') }}">Advokasi Isu Daerah</a></li>
                    <li><a href="{{ route('gallery.index') }}">Galeri Foto</a></li>
                </ul>
            </div>
            <div class="footer-col">
                <div class="footer-col-title">Organisasi</div>
                <ul>
                    <li><a href="{{ route('tentang.sejarah') }}">Sejarah KAMMI</a></li>
                    <li><a href="{{ route('tentang.visi-misi') }}">Visi & Misi</a></li>
                    <li><a href="{{ route('bkm.index') }}">BKM Kemuslimahan</a></li>
                    <li><a href="{{ url('/admin/login') }}">Login Admin</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <span>© {{ date('Y') }} KAMMI Daerah Tasikmalaya. Semua Hak Dilindungi.</span>
            <span>Kota Tasikmalaya, Jawa Barat</span>
        </div>
    </div>
</footer>

<script>
const nav = document.getElementById('navPublik');
window.addEventListener('scroll', () => {
    if (nav) nav.classList.toggle('scrolled', window.scrollY > 40);
});

function toggleNav() { 
    const menu = document.getElementById('navMenu');
    if (menu) menu.classList.toggle('open'); 
}

function closeNav() { 
    const menu = document.getElementById('navMenu');
    if (menu) menu.classList.remove('open'); 
}

function toggleDrop(id, event) {
    if (event) event.stopPropagation();
    document.querySelectorAll('.nav-dropdown, .user-dropdown').forEach(d => {
        if (d.id !== id) d.classList.remove('open');
    });
    const el = document.getElementById(id);
    if (el) el.classList.toggle('open');
}

document.addEventListener('click', e => {
    if (!e.target.closest('.nav-dropdown') && !e.target.closest('.user-dropdown')) {
        document.querySelectorAll('.nav-dropdown, .user-dropdown').forEach(d => d.classList.remove('open'));
    }
    const menu = document.getElementById('navMenu');
    const toggle = document.getElementById('navToggle');
    if (menu && menu.classList.contains('open') && !menu.contains(e.target) && toggle && !toggle.contains(e.target)) {
        menu.classList.remove('open');
    }
});

const obs = new IntersectionObserver(entries => {
    entries.forEach(e => { if (e.isIntersecting) e.target.classList.add('visible'); });
}, { threshold: 0.1 });
document.querySelectorAll('.fade-up').forEach(el => obs.observe(el));
</script>
@yield('scripts')
{!! $scripts ?? '' !!}
</body>
</html>
