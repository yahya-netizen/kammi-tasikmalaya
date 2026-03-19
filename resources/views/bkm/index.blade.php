<x-publik>
    <x-slot name="title">BKM — Biro Kemuslimahan KAMMI Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }
        .inner-sm { max-width:800px; margin:0 auto; }

        /* Hero BKM */
        .bkm-hero { background:var(--merah-tua); border-radius:20px; padding:52px 48px; position:relative; overflow:hidden; margin-bottom:56px; }
        .bkm-hero::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .bkm-hero::after { content:''; position:absolute; top:-100px; right:-100px; width:320px; height:320px; border-radius:50%; background:radial-gradient(circle,rgba(201,168,76,.12) 0%,transparent 68%); }
        .bkm-hero-inner { position:relative; z-index:1; display:grid; grid-template-columns:1fr 1fr; gap:40px; align-items:center; }
        .bkm-tag { display:inline-flex; align-items:center; gap:7px; background:rgba(201,168,76,.15); border:1px solid rgba(201,168,76,.35); color:var(--emas); font-size:11px; font-weight:600; letter-spacing:.1em; text-transform:uppercase; padding:4px 14px; border-radius:100px; margin-bottom:16px; }
        .bkm-hero h2 { font-family:'Playfair Display',serif; font-size:clamp(1.6rem,2.5vw,2.2rem); color:#fff9f0; line-height:1.25; margin-bottom:14px; }
        .bkm-hero p  { font-size:14.5px; color:rgba(255,249,240,.65); line-height:1.8; }
        .bkm-visual { background:rgba(255,249,240,.07); border:1px solid rgba(201,168,76,.2); border-radius:16px; padding:24px; }
        .bkm-visual-title { font-size:10px; font-weight:700; letter-spacing:.12em; text-transform:uppercase; color:var(--emas); margin-bottom:16px; }
        .bkm-pilar { display:flex; flex-direction:column; gap:10px; }
        .bkm-pilar-item { display:flex; align-items:center; gap:12px; background:rgba(255,249,240,.07); border-radius:10px; padding:12px 14px; }
        .bkm-pilar-icon { font-size:20px; flex-shrink:0; }
        .bkm-pilar-name { font-size:13px; font-weight:600; color:#fff9f0; }
        .bkm-pilar-sub  { font-size:11.5px; color:rgba(255,249,240,.45); }

        /* Program */
        .prog-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-bottom:56px; }
        .prog-card { background:white; border:1px solid #f0dada; border-radius:16px; padding:28px 24px; transition:all .3s; }
        .prog-card:hover { transform:translateY(-3px); box-shadow:0 12px 32px rgba(139,26,26,.09); }
        .prog-icon { width:48px; height:48px; background:#fdf2f2; border-radius:12px; display:flex; align-items:center; justify-content:center; font-size:22px; margin-bottom:16px; }
        .prog-name { font-family:'Playfair Display',serif; font-size:1.05rem; color:var(--merah-tua); margin-bottom:8px; }
        .prog-desc { font-size:13.5px; color:#7a5050; line-height:1.7; }

        /* Form pendaftaran */
        .form-section { background:white; border:1px solid #ede8e3; border-radius:20px; overflow:hidden; }
        .form-header { background:var(--merah-tua); padding:28px 36px; position:relative; overflow:hidden; }
        .form-header::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .form-header h2 { font-family:'Playfair Display',serif; font-size:1.3rem; color:#fff9f0; position:relative; z-index:1; }
        .form-header p  { font-size:13.5px; color:rgba(255,249,240,.6); margin-top:5px; position:relative; z-index:1; }
        .form-body { padding:36px; }
        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:18px; }
        .form-group { display:flex; flex-direction:column; gap:7px; }
        .form-group.full { grid-column:1/-1; }
        .form-label { font-size:13px; font-weight:600; color:#374151; }
        .form-label .req { color:var(--merah); }
        .form-input { border:1.5px solid #e5e7eb; border-radius:9px; padding:11px 14px; font-size:14px; font-family:inherit; color:var(--teks); transition:border-color .2s; background:white; }
        .form-input:focus { outline:none; border-color:var(--merah); }
        .form-input.error { border-color:#ef4444; }
        .form-error { font-size:12px; color:#ef4444; }
        .form-hint  { font-size:12px; color:#9ca3af; }
        .btn-submit { background:var(--merah); color:white; border:none; border-radius:10px; padding:13px 32px; font-size:14.5px; font-weight:600; cursor:pointer; font-family:inherit; transition:all .2s; }
        .btn-submit:hover { background:var(--merah-tua); transform:translateY(-1px); }

        /* Catatan khusus akhwat */
        .catatan-akhwat { background:#fdf6e3; border:1px solid rgba(201,168,76,.3); border-radius:12px; padding:16px 20px; margin-bottom:24px; display:flex; gap:12px; align-items:flex-start; }
        .catatan-akhwat-icon { font-size:20px; flex-shrink:0; }
        .catatan-akhwat p { font-size:13.5px; color:#78520a; line-height:1.7; }

        @media(max-width:900px){
            .bkm-hero-inner { grid-template-columns:1fr; }
            .bkm-visual { display:none; }
            .prog-grid { grid-template-columns:1fr; }
            .form-grid { grid-template-columns:1fr; }
            .form-body { padding:24px 20px; }
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
                <span>BKM</span>
            </div>
            <h1>Biro Kemuslimahan</h1>
            <p>Divisi khusus kader akhwat KAMMI Daerah Tasikmalaya</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- HERO BKM --}}
            <div class="bkm-hero fade-up">
                <div class="bkm-hero-inner">
                    <div>
                        <div class="bkm-tag">Khusus Akhwat</div>
                        <h2>Biro Kemuslimahan<br>KAMMI Tasikmalaya</h2>
                        <p>BKM adalah divisi yang menaungi, memberdayakan, dan menggerakkan kader akhwat KAMMI Daerah Tasikmalaya dalam kegiatan dakwah, sosial, dan advokasi yang sesuai dengan nilai-nilai keislaman.</p>
                    </div>
                    <div class="bkm-visual">
                        <div class="bkm-visual-title">Fokus Program BKM</div>
                        <div class="bkm-pilar">
                            <div class="bkm-pilar-item">
                                <div class="bkm-pilar-icon">📖</div>
                                <div><div class="bkm-pilar-name">Pembinaan Ruhiyah</div><div class="bkm-pilar-sub">Kajian & tarbiyah akhwat</div></div>
                            </div>
                            <div class="bkm-pilar-item">
                                <div class="bkm-pilar-icon">🤝</div>
                                <div><div class="bkm-pilar-name">Sosial & Advokasi</div><div class="bkm-pilar-sub">Isu perempuan & keluarga</div></div>
                            </div>
                            <div class="bkm-pilar-item">
                                <div class="bkm-pilar-icon">💡</div>
                                <div><div class="bkm-pilar-name">Pengembangan Diri</div><div class="bkm-pilar-sub">Skill & kepemimpinan akhwat</div></div>
                            </div>
                            <div class="bkm-pilar-item">
                                <div class="bkm-pilar-icon">🌸</div>
                                <div><div class="bkm-pilar-name">Komunitas Akhwat</div><div class="bkm-pilar-sub">Silaturahmi antar komisariat</div></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- PROGRAM KERJA --}}
            <div class="fade-up" style="margin-bottom:32px;">
                <div style="display:inline-flex;align-items:center;gap:8px;font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:var(--merah);margin-bottom:10px;">
                    <span style="width:18px;height:2px;background:var(--emas);border-radius:2px;display:block;"></span>
                    Program Kerja
                </div>
                <h2 style="font-family:'Playfair Display',serif;font-size:clamp(1.5rem,2vw,2rem);color:var(--merah-tua);margin-bottom:32px;">Kegiatan Unggulan BKM</h2>
            </div>

            <div class="prog-grid">
                <div class="prog-card fade-up delay-1">
                    <div class="prog-icon">📖</div>
                    <div class="prog-name">Halaqah Akhwat</div>
                    <p class="prog-desc">Kajian rutin mingguan untuk pembinaan ruhiyah dan pemahaman Islam kader akhwat KAMMI.</p>
                </div>
                <div class="prog-card fade-up delay-2">
                    <div class="prog-icon">🎓</div>
                    <div class="prog-name">Sekolah Muslimah</div>
                    <p class="prog-desc">Program pelatihan dan pengembangan diri akhwat meliputi kepemimpinan, public speaking, dan literasi.</p>
                </div>
                <div class="prog-card fade-up delay-3">
                    <div class="prog-icon">🤲</div>
                    <div class="prog-name">Bakti Sosial Akhwat</div>
                    <p class="prog-desc">Kegiatan sosial dan pemberdayaan perempuan di masyarakat Tasikmalaya dan Priangan Timur.</p>
                </div>
                <div class="prog-card fade-up delay-1">
                    <div class="prog-icon">✍️</div>
                    <div class="prog-name">Pelatihan Literasi</div>
                    <p class="prog-desc">Pelatihan menulis opini, jurnalistik, dan media sosial untuk kader akhwat yang produktif.</p>
                </div>
                <div class="prog-card fade-up delay-2">
                    <div class="prog-icon">🌸</div>
                    <div class="prog-name">Gathering Akhwat</div>
                    <p class="prog-desc">Silaturahmi dan konsolidasi kader akhwat antar komisariat se-Tasikmalaya.</p>
                </div>
                <div class="prog-card fade-up delay-3">
                    <div class="prog-icon">📣</div>
                    <div class="prog-name">Advokasi Perempuan</div>
                    <p class="prog-desc">Pemantauan dan advokasi isu-isu perempuan dan keluarga di wilayah Priangan Timur.</p>
                </div>
            </div>

        </div>

        {{-- FORM PENDAFTARAN --}}
        <div class="inner-sm">
            <div class="form-section fade-up">
                <div class="form-header">
                    <svg style="position:absolute;right:20px;top:10px;width:80px;opacity:.12;transform:rotate(15deg);z-index:0;" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                    <h2>Daftar Bergabung BKM</h2>
                    <p>Khusus kader akhwat (perempuan) KAMMI Daerah Tasikmalaya</p>
                </div>
                <div class="form-body">
                    <div class="catatan-akhwat">
                        <div class="catatan-akhwat-icon">ℹ️</div>
                        <p>Formulir ini khusus untuk kader <strong>akhwat (perempuan)</strong>. Setelah mendaftar, koordinator BKM akan menghubungi kamu via WhatsApp untuk proses selanjutnya.</p>
                    </div>

                    <form method="POST" action="{{ route('bkm.daftar') }}">
                        @csrf
                        <div class="form-grid">

                            <div class="form-group full">
                                <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-input {{ $errors->has('nama') ? 'error' : '' }}" placeholder="Nama lengkap kamu" required>
                                @error('nama')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-input {{ $errors->has('email') ? 'error' : '' }}" placeholder="email@kampus.ac.id" required>
                                @error('email')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">No. HP / WhatsApp <span class="req">*</span></label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input {{ $errors->has('no_hp') ? 'error' : '' }}" placeholder="08xxxxxxxxxx" required>
                                @error('no_hp')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Nama Kampus <span class="req">*</span></label>
                                <input type="text" name="kampus" value="{{ old('kampus') }}" class="form-input {{ $errors->has('kampus') ? 'error' : '' }}" placeholder="Universitas / Institut" required>
                                @error('kampus')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Komisariat <span class="req">*</span></label>
                                <input type="text" name="komisariat" value="{{ old('komisariat') }}" class="form-input {{ $errors->has('komisariat') ? 'error' : '' }}" placeholder="Komisariat KAMMI di kampus kamu" required>
                                <span class="form-hint">Jika belum ada, isi nama kampus</span>
                                @error('komisariat')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Motivasi / Pesan (opsional)</label>
                                <textarea name="pesan" rows="3" class="form-input" placeholder="Ceritakan motivasi kamu bergabung BKM...">{{ old('pesan') }}</textarea>
                            </div>

                        </div>

                        <div style="margin-top:24px;display:flex;justify-content:flex-end;">
                            <button type="submit" class="btn-submit">
                                Kirim Pendaftaran BKM
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @if(session('success'))
    <div style="position:fixed;bottom:24px;right:24px;background:#166534;color:white;padding:16px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:999;box-shadow:0 8px 24px rgba(0,0,0,.2);">
        ✓ {{ session('success') }}
    </div>
    <script>setTimeout(()=>document.querySelector('[style*="position:fixed"]')?.remove(),4000)</script>
    @endif
</x-publik>
