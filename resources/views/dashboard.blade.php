<x-publik>
    <x-slot name="title">Dashboard — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Dashboard Anggota</h1>
            <p class="page-subtitle">Selamat datang kembali, <strong>{{ auth()->user()->name }}</strong>. Pantau aktivitas dan status kaderisasi Anda di sini.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03); text-align:center;">
                <div style="font-size:3rem; margin-bottom:20px;">👋</div>
                <h2 style="font-family:'Playfair Display',serif; font-size:24px; color:var(--merah-tua); margin-bottom:12px;">Assalamu'alaikum, Akh/Ukh!</h2>
                <p style="font-size:16px; color:var(--teks-secondary); line-height:1.7; max-width:600px; margin:0 auto 32px;">
                    Anda telah berhasil login ke sistem KAMMI Daerah Tasikmalaya. Saat ini fitur dashboard masih dalam tahap pengembangan untuk memberikan pengalaman terbaik bagi seluruh kader.
                </p>
                
                <div style="display:flex; justify-content:center; gap:16px; flex-wrap:wrap;">
                    <a href="{{ route('profil.index') }}" class="btn-emas">Lengkapi Profil Saya</a>
                    <a href="{{ url('/') }}" class="btn-outline">Kembali ke Beranda</a>
                </div>
            </div>

        </div>
    </div>
</x-publik>
