<x-publik>
    <x-slot name="title">BKM — Biro Kemuslimahan KAMMI Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <svg style="position:absolute;left:-50px;bottom:20px;width:180px;opacity:.05;transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        
        <div class="page-header-inner fade-up">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <span class="current">BKM</span>
            </div>
            <h1 class="page-title">Biro Kemuslimahan</h1>
            <p class="page-subtitle">Divisi khusus yang menaungi, memberdayakan, dan menggerakkan potensi kader akhwat KAMMI Daerah Tasikmalaya.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            {{-- HERO BKM --}}
            <div class="fade-up" style="background:white; border-radius:24px; padding:48px; border:1px solid var(--border); box-shadow: 0 10px 40px rgba(0,0,0,0.03); margin-bottom:60px; position:relative; overflow:hidden;">
                {{-- Decoration --}}
                <svg style="position:absolute; right:0; bottom:0; width:300px; opacity:0.03; transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>

                <div style="display:grid; grid-template-columns:1fr 1fr; gap:48px; align-items:center;">
                    <div>
                        <div style="display:inline-flex; align-items:center; gap:8px; background:var(--merah-muda); border:1px solid var(--merah-terang); color:var(--merah); font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:6px 14px; border-radius:100px; margin-bottom:20px;">
                            Khusus Akhwat
                        </div>
                        <h2 style="font-family:'Playfair Display',serif; font-size:32px; color:var(--merah-tua); margin-bottom:16px; line-height:1.2;">Wadah Pemberdayaan<br>Muslimah Negarawan</h2>
                        <p style="font-size:16px; color:var(--teks-secondary); line-height:1.7; margin-bottom:32px;">BKM berkomitmen mencetak muslimah yang tidak hanya shalihah secara pribadi, tetapi juga berdaya, intelektual, dan berkontribusi nyata bagi masyarakat.</p>
                        
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:16px;">
                            <div style="display:flex; gap:12px; align-items:center; padding:12px; background:var(--krem); border-radius:12px;">
                                <div style="width:40px; height:40px; background:white; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px;">📖</div>
                                <div><div style="font-size:14px; font-weight:700; color:var(--teks);">Ruhiyah</div><div style="font-size:12px; color:var(--teks-secondary);">Kajian rutin</div></div>
                            </div>
                            <div style="display:flex; gap:12px; align-items:center; padding:12px; background:var(--krem); border-radius:12px;">
                                <div style="width:40px; height:40px; background:white; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px;">💡</div>
                                <div><div style="font-size:14px; font-weight:700; color:var(--teks);">Intelektual</div><div style="font-size:12px; color:var(--teks-secondary);">Diskusi isu</div></div>
                            </div>
                            <div style="display:flex; gap:12px; align-items:center; padding:12px; background:var(--krem); border-radius:12px;">
                                <div style="width:40px; height:40px; background:white; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px;">🤝</div>
                                <div><div style="font-size:14px; font-weight:700; color:var(--teks);">Sosial</div><div style="font-size:12px; color:var(--teks-secondary);">Aksi peduli</div></div>
                            </div>
                            <div style="display:flex; gap:12px; align-items:center; padding:12px; background:var(--krem); border-radius:12px;">
                                <div style="width:40px; height:40px; background:white; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:20px;">🌸</div>
                                <div><div style="font-size:14px; font-weight:700; color:var(--teks);">Ukhuwah</div><div style="font-size:12px; color:var(--teks-secondary);">Jaringan luas</div></div>
                            </div>
                        </div>
                    </div>
                    <div style="display:none; @media(min-width:900px){display:block;}">
                        {{-- Placeholder visual (bisa diganti foto kegiatan nanti) --}}
                        <div style="width:100%; height:320px; background:linear-gradient(135deg, #fdf2f2, #fff); border-radius:24px; border:1px solid #f0dada; display:flex; align-items:center; justify-content:center;">
                            <div style="text-align:center; color:var(--merah-tua); opacity:0.2;">
                                <svg width="80" height="80" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24"><path d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                                <div style="margin-top:10px; font-weight:700;">Foto Kegiatan BKM</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PROGRAM KERJA --}}
            <div class="fade-up" style="margin-bottom:60px;">
                <div class="sec-label">Program Unggulan</div>
                <h2 class="sec-title">Kegiatan BKM Tasikmalaya</h2>
                
                <div class="grid-3">
                    <div class="card-kammi fade-up delay-1" style="height:auto;">
                        <div class="card-body">
                            <div style="width:48px; height:48px; background:var(--merah-muda); border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:24px; color:var(--merah); margin-bottom:16px;">📖</div>
                            <h3 class="card-title">Halaqah Akhwat</h3>
                            <p class="card-desc" style="margin-bottom:0;">Kajian rutin mingguan sebagai sarana pembinaan ruhiyah, perbaikan bacaan Quran, dan penguatan pemahaman keislaman kader.</p>
                        </div>
                    </div>
                    <div class="card-kammi fade-up delay-2" style="height:auto;">
                        <div class="card-body">
                            <div style="width:48px; height:48px; background:#fef3c7; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:24px; color:#b45309; margin-bottom:16px;">🎓</div>
                            <h3 class="card-title">Sekolah Muslimah</h3>
                            <p class="card-desc" style="margin-bottom:0;">Pelatihan intensif pengembangan soft-skill, kepemimpinan perempuan, manajemen diri, dan wawasan kebangsaan.</p>
                        </div>
                    </div>
                    <div class="card-kammi fade-up delay-3" style="height:auto;">
                        <div class="card-body">
                            <div style="width:48px; height:48px; background:#dcfce7; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:24px; color:#15803d; margin-bottom:16px;">🤲</div>
                            <h3 class="card-title">Bakti Sosial</h3>
                            <p class="card-desc" style="margin-bottom:0;">Aksi nyata kepedulian sosial, pemberdayaan masyarakat, dan advokasi isu-isu perempuan di Tasikmalaya.</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- FORM PENDAFTARAN --}}
            <div class="inner-sm fade-up delay-1" style="max-width:800px; margin:0 auto;">
                <div style="background:white; border-radius:24px; border:1px solid var(--border); overflow:hidden; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                    <div style="background:var(--merah-tua); padding:32px 40px; text-align:center; position:relative; overflow:hidden;">
                        <svg style="position:absolute; left:50%; top:50%; transform:translate(-50%,-50%); width:300px; opacity:0.05;" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                        <h2 style="font-family:'Playfair Display',serif; font-size:24px; color:white; margin-bottom:8px; position:relative; z-index:1;">Daftar Anggota BKM</h2>
                        <p style="font-size:14px; color:rgba(255,255,255,0.7); position:relative; z-index:1;">Formulir khusus kader akhwat KAMMI Daerah Tasikmalaya</p>
                    </div>
                    
                    <div style="padding:40px;">
                        <div style="background:var(--emas-muda); border:1px solid #fcd34d; border-radius:12px; padding:16px; margin-bottom:32px; display:flex; gap:12px; align-items:flex-start;">
                            <div style="color:#b45309; font-size:20px;">ℹ️</div>
                            <p style="font-size:13px; color:#92400e; line-height:1.6; margin:0;">Pastikan kamu sudah terdaftar sebagai kader (lulus minimal DM 1). Tim BKM akan memverifikasi data dan menghubungimu via WhatsApp.</p>
                        </div>

                        <form method="POST" action="{{ route('bkm.daftar') }}">
                            @csrf
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">
                                <div style="display:flex; flex-direction:column; gap:8px; grid-column:1/-1;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">Nama Lengkap <span style="color:var(--merah);">*</span></label>
                                    <input type="text" name="nama" value="{{ old('nama') }}" class="form-input {{ $errors->has('nama') ? 'error' : '' }}" placeholder="Sesuai KTP" required>
                                    @error('nama')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                                </div>

                                <div style="display:flex; flex-direction:column; gap:8px;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">Email <span style="color:var(--merah);">*</span></label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-input {{ $errors->has('email') ? 'error' : '' }}" placeholder="email@kamus.ac.id" required>
                                    @error('email')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                                </div>

                                <div style="display:flex; flex-direction:column; gap:8px;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">No. WhatsApp <span style="color:var(--merah);">*</span></label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input {{ $errors->has('no_hp') ? 'error' : '' }}" placeholder="08xxxxxxxxxx" required>
                                    @error('no_hp')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                                </div>

                                <div style="display:flex; flex-direction:column; gap:8px;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">Asal Kampus <span style="color:var(--merah);">*</span></label>
                                    <input type="text" name="kampus" value="{{ old('kampus') }}" class="form-input {{ $errors->has('kampus') ? 'error' : '' }}" placeholder="Nama Universitas / Institut" required>
                                    @error('kampus')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                                </div>

                                <div style="display:flex; flex-direction:column; gap:8px;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">Komisariat <span style="color:var(--merah);">*</span></label>
                                    <input type="text" name="komisariat" value="{{ old('komisariat') }}" class="form-input {{ $errors->has('komisariat') ? 'error' : '' }}" placeholder="Nama Komisariat" required>
                                    @error('komisariat')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                                </div>

                                <div style="display:flex; flex-direction:column; gap:8px; grid-column:1/-1;">
                                    <label style="font-size:13px; font-weight:700; color:var(--teks);">Motivasi (Opsional)</label>
                                    <textarea name="pesan" rows="3" class="form-input" placeholder="Apa harapan kamu bergabung di BKM?">{{ old('pesan') }}</textarea>
                                </div>
                            </div>

                            <div style="margin-top:32px; text-align:right;">
                                <button type="submit" class="btn-merah" style="width:100%;">
                                    Kirim Pendaftaran
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .form-input { width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; color:var(--teks); transition:border-color 0.2s; outline:none; }
        .form-input:focus { border-color:var(--merah); }
        .form-input.error { border-color:#ef4444; }

        @media(max-width:900px){
            div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns:1fr !important; gap: 32px !important; }
            .grid-3 { grid-template-columns:1fr !important; }
            .form-grid { grid-template-columns:1fr !important; }
        }
    </style>

    @if(session('success'))
    <div style="position:fixed;bottom:30px;right:30px;background:#15803d;color:white;padding:16px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:999;box-shadow:0 10px 30px rgba(0,0,0,.2); display:flex; align-items:center; gap:10px; animation: slideUp 0.4s ease-out;">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    <style>@keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }</style>
    <script>setTimeout(()=>document.querySelector('[style*="position:fixed"]')?.remove(),5000)</script>
    @endif
</x-publik>
