<x-publik>
    <x-slot name="title">Kontak & Rekrutmen — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }

        .kontak-layout { display:grid; grid-template-columns:1fr 1.6fr; gap:48px; align-items:start; }

        /* Info kontak kiri */
        .info-card { background:var(--merah-tua); border-radius:20px; padding:36px; position:relative; overflow:hidden; }
        .info-card::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .info-card::after { content:''; position:absolute; bottom:-80px; right:-80px; width:240px; height:240px; border-radius:50%; background:radial-gradient(circle,rgba(201,168,76,.1) 0%,transparent 68%); }
        .info-card-inner { position:relative; z-index:1; }
        .info-card h2 { font-family:'Playfair Display',serif; font-size:1.4rem; color:#fff9f0; margin-bottom:6px; }
        .info-card p  { font-size:13.5px; color:rgba(255,249,240,.6); line-height:1.75; margin-bottom:28px; }

        .kontak-item { display:flex; align-items:flex-start; gap:14px; margin-bottom:20px; }
        .kontak-item-icon { width:40px; height:40px; background:rgba(201,168,76,.15); border:1px solid rgba(201,168,76,.25); border-radius:10px; display:flex; align-items:center; justify-content:center; flex-shrink:0; }
        .kontak-item-lbl { font-size:11px; font-weight:600; letter-spacing:.07em; text-transform:uppercase; color:rgba(255,249,240,.4); margin-bottom:3px; }
        .kontak-item-val { font-size:14px; color:#fff9f0; font-weight:500; }
        .kontak-item-val a { color:#fff9f0; text-decoration:none; }
        .kontak-item-val a:hover { color:var(--emas); }

        .sosmed-row { display:flex; gap:10px; margin-top:28px; padding-top:24px; border-top:1px solid rgba(201,168,76,.15); }
        .sosmed-btn { width:40px; height:40px; background:rgba(255,249,240,.08); border-radius:10px; display:flex; align-items:center; justify-content:center; text-decoration:none; transition:all .2s; }
        .sosmed-btn:hover { background:rgba(255,249,240,.15); transform:translateY(-2px); }
        .sosmed-btn svg { fill:rgba(255,249,240,.7); }

        /* Form kanan */
        .form-card { background:white; border:1px solid #ede8e3; border-radius:20px; padding:36px; }
        .form-card h2 { font-family:'Playfair Display',serif; font-size:1.3rem; color:var(--merah-tua); margin-bottom:6px; }
        .form-card p  { font-size:13.5px; color:#9ca3af; margin-bottom:28px; }
        .form-grid { display:grid; grid-template-columns:1fr 1fr; gap:18px; }
        .form-group { display:flex; flex-direction:column; gap:7px; }
        .form-group.full { grid-column:1/-1; }
        .form-label { font-size:13px; font-weight:600; color:#374151; }
        .form-label .req { color:var(--merah); }
        .form-input { border:1.5px solid #e5e7eb; border-radius:9px; padding:11px 14px; font-size:14px; font-family:inherit; color:var(--teks); transition:border-color .2s; background:white; }
        .form-input:focus { outline:none; border-color:var(--merah); }
        .form-input.error { border-color:#ef4444; }
        .form-error { font-size:12px; color:#ef4444; }
        .btn-submit { background:var(--merah); color:white; border:none; border-radius:10px; padding:13px 32px; font-size:14.5px; font-weight:600; cursor:pointer; font-family:inherit; transition:all .2s; }
        .btn-submit:hover { background:var(--merah-tua); transform:translateY(-1px); }

        /* Rekrutmen */
        .rekrutmen-section { background:white; border-radius:20px; border:1px solid #ede8e3; overflow:hidden; margin-top:48px; }
        .rekrutmen-header { background:var(--merah-tua); padding:28px 36px; position:relative; overflow:hidden; }
        .rekrutmen-header::before { content:''; position:absolute; inset:0; background-image:repeating-linear-gradient(135deg,rgba(201,168,76,.04) 0,rgba(201,168,76,.04) 1px,transparent 1px,transparent 24px); }
        .rekrutmen-header h2 { font-family:'Playfair Display',serif; font-size:1.3rem; color:#fff9f0; position:relative; z-index:1; }
        .rekrutmen-header p  { font-size:13.5px; color:rgba(255,249,240,.6); margin-top:5px; position:relative; z-index:1; }
        .rekrutmen-body { padding:36px; display:grid; grid-template-columns:repeat(3,1fr); gap:20px; }
        .rekrutmen-step { text-align:center; }
        .step-num { width:48px; height:48px; background:var(--merah-muda); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:1.2rem; font-weight:700; color:var(--merah); margin:0 auto 14px; }
        .step-title { font-size:14px; font-weight:600; color:var(--merah-tua); margin-bottom:7px; }
        .step-desc  { font-size:13px; color:#7a5050; line-height:1.65; }
        .step-arrow { display:flex; align-items:center; justify-content:center; color:#d1c0c0; margin-top:24px; }

        @media(max-width:900px){
            .kontak-layout { grid-template-columns:1fr; }
            .form-grid { grid-template-columns:1fr; }
            .rekrutmen-body { grid-template-columns:1fr; }
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
                <span>Kontak</span>
            </div>
            <h1>Kontak & Rekrutmen</h1>
            <p>Hubungi kami atau daftarkan diri sebagai anggota baru KAMMI</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            <div class="kontak-layout">

                {{-- INFO KONTAK --}}
                <div class="info-card fade-up">
                    <div class="info-card-inner">
                        <h2>Hubungi Kami</h2>
                        <p>Kami siap menjawab pertanyaan kamu seputar KAMMI, kaderisasi, dan kegiatan daerah Tasikmalaya.</p>

                        <div class="kontak-item">
                            <div class="kontak-item-icon">
                                <svg width="18" height="18" fill="none" stroke="rgba(201,168,76,.9)" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div class="kontak-item-lbl">Sekretariat</div>
                                <div class="kontak-item-val">Kota Tasikmalaya, Jawa Barat</div>
                            </div>
                        </div>

                        <div class="kontak-item">
                            <div class="kontak-item-icon">
                                <svg width="18" height="18" fill="none" stroke="rgba(201,168,76,.9)" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
                            </div>
                            <div>
                                <div class="kontak-item-lbl">Email</div>
                                <div class="kontak-item-val"><a href="mailto:info@kammitasikmalaya.id">info@kammitasikmalaya.id</a></div>
                            </div>
                        </div>

                        <div class="kontak-item">
                            <div class="kontak-item-icon">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="rgba(201,168,76,.9)"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/></svg>
                            </div>
                            <div>
                                <div class="kontak-item-lbl">WhatsApp</div>
                                <div class="kontak-item-val"><a href="https://wa.me/6281234567890" target="_blank">+62 812-3456-7890</a></div>
                            </div>
                        </div>

                        <div class="kontak-item">
                            <div class="kontak-item-icon">
                                <svg width="18" height="18" fill="none" stroke="rgba(201,168,76,.9)" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                            </div>
                            <div>
                                <div class="kontak-item-lbl">Jam Aktif</div>
                                <div class="kontak-item-val">Senin–Jumat, 08.00–17.00 WIB</div>
                            </div>
                        </div>

                        <div class="sosmed-row">
                            {{-- Instagram --}}
                            <a href="#" target="_blank" class="sosmed-btn" title="Instagram">
                                <svg width="18" height="18" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            {{-- Twitter/X --}}
                            <a href="#" target="_blank" class="sosmed-btn" title="Twitter/X">
                                <svg width="16" height="16" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            </a>
                            {{-- YouTube --}}
                            <a href="#" target="_blank" class="sosmed-btn" title="YouTube">
                                <svg width="18" height="18" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>

                {{-- FORM KONTAK --}}
                <div class="form-card fade-up delay-2">
                    <h2>Kirim Pesan</h2>
                    <p>Isi formulir di bawah ini dan tim kami akan membalas dalam 1×24 jam.</p>

                    <form method="POST" action="{{ route('kontak.kirim') }}">
                        @csrf
                        <div class="form-grid">

                            <div class="form-group">
                                <label class="form-label">Nama Lengkap <span class="req">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-input {{ $errors->has('nama') ? 'error' : '' }}" placeholder="Nama kamu" required>
                                @error('nama')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Email <span class="req">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-input {{ $errors->has('email') ? 'error' : '' }}" placeholder="email@contoh.com" required>
                                @error('email')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">No. HP / WhatsApp</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input" placeholder="08xxxxxxxxxx (opsional)">
                            </div>

                            <div class="form-group">
                                <label class="form-label">Subjek <span class="req">*</span></label>
                                <input type="text" name="subjek" value="{{ old('subjek') }}" class="form-input {{ $errors->has('subjek') ? 'error' : '' }}" placeholder="Topik pesan kamu" required>
                                @error('subjek')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                            <div class="form-group full">
                                <label class="form-label">Pesan <span class="req">*</span></label>
                                <textarea name="pesan" rows="5" class="form-input {{ $errors->has('pesan') ? 'error' : '' }}" placeholder="Tulis pesanmu di sini..." required>{{ old('pesan') }}</textarea>
                                @error('pesan')<span class="form-error">{{ $message }}</span>@enderror
                            </div>

                        </div>

                        <div style="margin-top:24px;display:flex;justify-content:flex-end;">
                            <button type="submit" class="btn-submit">
                                Kirim Pesan
                                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" style="display:inline;margin-left:6px;vertical-align:middle;"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            {{-- ALUR REKRUTMEN --}}
            <div class="rekrutmen-section fade-up" style="margin-top:48px;">
                <div class="rekrutmen-header">
                    <svg style="position:absolute;right:20px;top:10px;width:80px;opacity:.1;transform:rotate(15deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
                    <h2>Cara Bergabung KAMMI</h2>
                    <p>Ikuti langkah berikut untuk menjadi kader KAMMI Daerah Tasikmalaya</p>
                </div>
                <div class="rekrutmen-body">
                    <div class="rekrutmen-step">
                        <div class="step-num">1</div>
                        <div class="step-title">Ikuti Daurah Marhalah I</div>
                        <p class="step-desc">Daftarkan diri ke program DM I yang terbuka untuk semua mahasiswa muslim di Tasikmalaya.</p>
                        <div style="margin-top:16px;">
                            <a href="{{ route('kaderisasi.index') }}" style="font-size:13px;font-weight:600;color:var(--merah);text-decoration:none;">Lihat Jadwal DM →</a>
                        </div>
                    </div>
                    <div class="rekrutmen-step">
                        <div class="step-num">2</div>
                        <div class="step-title">Bergabung Komisariat</div>
                        <p class="step-desc">Setelah lulus DM I, bergabunglah ke komisariat KAMMI di kampus kamu dan mulai aktif berkegiatan.</p>
                        <div style="margin-top:16px;">
                            <a href="{{ route('komisariat.index') }}" style="font-size:13px;font-weight:600;color:var(--merah);text-decoration:none;">Lihat Komisariat →</a>
                        </div>
                    </div>
                    <div class="rekrutmen-step">
                        <div class="step-num">3</div>
                        <div class="step-title">Kembangkan Diri</div>
                        <p class="step-desc">Ikuti DM II, DM III, dan berbagai program pengembangan diri KAMMI untuk menjadi kader terbaik.</p>
                        <div style="margin-top:16px;">
                            <a href="{{ route('agenda.index') }}" style="font-size:13px;font-weight:600;color:var(--merah);text-decoration:none;">Lihat Agenda →</a>
                        </div>
                    </div>
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
