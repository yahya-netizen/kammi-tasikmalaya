<x-publik>
    <x-slot name="title">Daftar {{ $daurahMarhalah->nama }} — KAMMI Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:760px; margin:0 auto; }

        .dm-summary { background:var(--merah-tua); border-radius:16px; padding:28px 32px; margin-bottom:32px; position:relative; overflow:hidden; }
        .dm-summary::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .dm-summary-inner { position:relative; z-index:1; display:grid; grid-template-columns:1fr 1fr; gap:20px; }
        .dm-summary-nama { font-family:'Playfair Display',serif; font-size:1.4rem; color:#fff9f0; margin-bottom:6px; grid-column:1/-1; }
        .dm-info-item { display:flex; align-items:center; gap:8px; font-size:13px; color:rgba(255,249,240,.7); }
        .dm-info-item svg { flex-shrink:0; }
        .badge-level { font-size:11px; font-weight:700; padding:3px 12px; border-radius:100px; margin-bottom:12px; display:inline-block; }
        .badge-DM1 { background:#fdf6e3; color:#c9a84c; }
        .badge-DM2 { background:#fdf2f2; color:#8b1a1a; }
        .badge-DM3 { background:#f5e8e8; color:#5c0f0f; }
        .kuota-bar { background:rgba(255,255,255,.1); border-radius:100px; height:6px; margin-top:10px; grid-column:1/-1; overflow:hidden; }
        .kuota-fill { background:var(--emas); height:100%; border-radius:100px; transition:width .5s; }
        .kuota-text { font-size:12px; color:rgba(255,249,240,.6); grid-column:1/-1; }

        /* Form */
        .form-card { background:white; border:1px solid #ede8e3; border-radius:18px; padding:36px; }
        .form-title { font-family:'Playfair Display',serif; font-size:1.3rem; color:var(--merah-tua); margin-bottom:6px; }
        .form-subtitle { font-size:13.5px; color:#9ca3af; margin-bottom:28px; }
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

        .radio-group { display:flex; gap:16px; }
        .radio-label { display:flex; align-items:center; gap:8px; cursor:pointer; padding:10px 18px; border:1.5px solid #e5e7eb; border-radius:9px; font-size:14px; transition:all .2s; }
        .radio-label:has(input:checked) { border-color:var(--merah); background:var(--merah-muda); color:var(--merah-tua); }
        .radio-label input { accent-color:var(--merah); }

        .btn-submit { width:100%; background:var(--merah); color:white; border:none; border-radius:10px; padding:14px; font-size:15px; font-weight:600; cursor:pointer; font-family:inherit; transition:all .2s; margin-top:8px; }
        .btn-submit:hover { background:var(--merah-tua); }
        .btn-back { display:inline-flex; align-items:center; gap:6px; color:#9ca3af; text-decoration:none; font-size:13.5px; margin-bottom:20px; transition:color .2s; }
        .btn-back:hover { color:var(--merah-tua); }

        .syarat-box { background:#fdf6e3; border:1px solid rgba(201,168,76,.3); border-radius:12px; padding:16px 20px; margin-bottom:24px; }
        .syarat-box p { font-size:13px; color:#5c3d0a; font-weight:600; margin-bottom:8px; }
        .syarat-box ul { list-style:none; padding:0; }
        .syarat-box ul li { font-size:13px; color:#78520a; display:flex; gap:8px; padding:3px 0; }
        .syarat-box ul li::before { content:'⚠'; flex-shrink:0; }

        @media(max-width:640px){
            .form-grid { grid-template-columns:1fr; }
            .dm-summary-inner { grid-template-columns:1fr; }
            .radio-group { flex-direction:column; }
        }
    </style>
    </x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="breadcrumb-sep">›</span>
                <a href="{{ route('kaderisasi.index') }}">Kaderisasi</a>
                <span class="breadcrumb-sep">›</span>
                <span>Daftar</span>
            </div>
            <h1>Formulir Pendaftaran</h1>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            <a href="{{ route('kaderisasi.index') }}" class="btn-back">
                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M19 12H5M12 19l-7-7 7-7"/></svg>
                Kembali ke Jadwal
            </a>

            {{-- Info DM --}}
            <div class="dm-summary fade-up">
                <div class="dm-summary-inner">
                    <div style="grid-column:1/-1;">
                        <span class="badge-level badge-{{ $daurahMarhalah->level }}">{{ $daurahMarhalah->level }}</span>
                        <div class="dm-summary-nama">{{ $daurahMarhalah->nama }}</div>
                    </div>
                    @if($daurahMarhalah->tanggal_mulai)
                    <div class="dm-info-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                        {{ $daurahMarhalah->tanggal_mulai->format('d M Y') }}
                        @if($daurahMarhalah->tanggal_selesai) — {{ $daurahMarhalah->tanggal_selesai->format('d M Y') }} @endif
                    </div>
                    @endif
                    @if($daurahMarhalah->lokasi)
                    <div class="dm-info-item">
                        <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        {{ $daurahMarhalah->lokasi }}
                    </div>
                    @endif
                    @php $persen = min(100, round((($daurahMarhalah->kuota - $sisaKuota) / $daurahMarhalah->kuota) * 100)); @endphp
                    <div class="kuota-text">Sisa kuota: <strong style="color:#fff9f0;">{{ $sisaKuota }} dari {{ $daurahMarhalah->kuota }}</strong> tempat</div>
                    <div class="kuota-bar">
                        <div class="kuota-fill" style="width:{{ $persen }}%"></div>
                    </div>
                </div>
            </div>

            {{-- Peringatan prasyarat DM2/DM3 --}}
            @if($daurahMarhalah->level === 'DM2')
            <div class="syarat-box fade-up">
                <p>Prasyarat Daurah Marhalah II</p>
                <ul><li>Kamu harus sudah lulus DM I. Sistem akan memverifikasi berdasarkan email yang kamu daftarkan.</li></ul>
            </div>
            @elseif($daurahMarhalah->level === 'DM3')
            <div class="syarat-box fade-up">
                <p>Prasyarat Daurah Marhalah III</p>
                <ul><li>Kamu harus sudah lulus DM II. Sistem akan memverifikasi berdasarkan email yang kamu daftarkan.</li></ul>
            </div>
            @endif

            {{-- FORM --}}
            <div class="form-card fade-up">
                <div class="form-title">Data Diri Pendaftar</div>
                <div class="form-subtitle">Pastikan data yang kamu isi sudah benar. Panitia akan menghubungi melalui nomor HP yang didaftarkan.</div>

                <form method="POST" action="{{ route('kaderisasi.simpan', [$daurahMarhalah->slug, $daurahMarhalah->token]) }}">
                    @csrf
                    <div class="form-grid">

                        <div class="form-group full">
                            <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                            <input type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}" class="form-input {{ $errors->has('nama_lengkap') ? 'error' : '' }}" placeholder="Sesuai KTP/KTM" required>
                            @error('nama_lengkap')<span class="form-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">NIM <span class="req">*</span></label>
                            <input type="text" name="nim" value="{{ old('nim') }}" class="form-input {{ $errors->has('nim') ? 'error' : '' }}" placeholder="Nomor Induk Mahasiswa" required>
                            @error('nim')<span class="form-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Jenis Kelamin <span class="req">*</span></label>
                            <div class="radio-group">
                                <label class="radio-label">
                                    <input type="radio" name="jenis_kelamin" value="ikhwan" {{ old('jenis_kelamin')==='ikhwan' ? 'checked' : '' }}> Ikhwan
                                </label>
                                <label class="radio-label">
                                    <input type="radio" name="jenis_kelamin" value="akhwat" {{ old('jenis_kelamin')==='akhwat' ? 'checked' : '' }}> Akhwat
                                </label>
                            </div>
                            @error('jenis_kelamin')<span class="form-error">{{ $message }}</span>@enderror
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
                            <input type="text" name="kampus" value="{{ old('kampus') }}" class="form-input {{ $errors->has('kampus') ? 'error' : '' }}" placeholder="Universitas / Institut / Politeknik" required>
                            @error('kampus')<span class="form-error">{{ $message }}</span>@enderror
                        </div>

                        <div class="form-group">
                            <label class="form-label">Nama Komisariat <span class="req">*</span></label>
                            <input type="text" name="komisariat" value="{{ old('komisariat') }}" class="form-input {{ $errors->has('komisariat') ? 'error' : '' }}" placeholder="Komisariat KAMMI di kampus kamu" required>
                            <span class="form-hint">Jika belum ada komisariat, isi dengan nama kampus</span>
                            @error('komisariat')<span class="form-error">{{ $message }}</span>@enderror
                        </div>

                    </div>

                    <div style="margin-top:24px;">
                        <button type="submit" class="btn-submit">
                            Kirim Pendaftaran
                        </button>
                        <p style="font-size:12px;color:#9ca3af;text-align:center;margin-top:12px;">
                            Dengan mendaftar, kamu menyetujui mengikuti seluruh rangkaian kegiatan Daurah Marhalah.
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-publik>
