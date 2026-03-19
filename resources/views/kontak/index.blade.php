<x-publik>
    <x-slot name="title">Kontak & Rekrutmen — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <svg style="position:absolute;left:-50px;bottom:20px;width:180px;opacity:.05;transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        
        <div class="page-header-inner fade-up">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <span class="current">Kontak</span>
            </div>
            <h1 class="page-title">Hubungi Kami</h1>
            <p class="page-subtitle">Punya pertanyaan seputar KAMMI, kaderisasi, atau ingin berkolaborasi? Kami siap mendengar aspirasi dan masukan Anda.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            <div class="kontak-layout fade-up">

                {{-- INFO KONTAK --}}
                <div class="info-card" style="background:linear-gradient(135deg, var(--merah-tua), #3a0a0a); border-radius:24px; padding:40px; position:relative; overflow:hidden; color:white; box-shadow: 0 20px 60px rgba(139,26,26,0.2);">
                    {{-- Decoration --}}
                    <svg style="position:absolute; right:-20px; bottom:-20px; width:180px; opacity:0.05; transform:rotate(-15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                    
                    <h2 style="font-family:'Playfair Display',serif; font-size:28px; margin-bottom:12px; position:relative; z-index:2;">Kantor Sekretariat</h2>
                    <p style="font-size:15px; color:rgba(255,255,255,0.7); margin-bottom:40px; line-height:1.7; position:relative; z-index:2;">
                        Silakan kunjungi kami atau hubungi melalui kanal resmi di bawah ini.
                    </p>

                    <div style="display:flex; flex-direction:column; gap:24px; position:relative; z-index:2;">
                        <div style="display:flex; gap:16px;">
                            <div style="width:48px; height:48px; background:rgba(255,255,255,0.1); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; color:var(--emas);">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:rgba(255,255,255,0.5); margin-bottom:4px;">Alamat</div>
                                <div style="font-size:15px; font-weight:500;">Kota Tasikmalaya, Jawa Barat</div>
                            </div>
                        </div>

                        <div style="display:flex; gap:16px;">
                            <div style="width:48px; height:48px; background:rgba(255,255,255,0.1); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; color:var(--emas);">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:rgba(255,255,255,0.5); margin-bottom:4px;">Email</div>
                                <div style="font-size:15px; font-weight:500;"><a href="mailto:info@kammitasik.org" style="color:white; text-decoration:none;">info@kammitasik.org</a></div>
                            </div>
                        </div>

                        <div style="display:flex; gap:16px;">
                            <div style="width:48px; height:48px; background:rgba(255,255,255,0.1); border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; color:var(--emas);">
                                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:rgba(255,255,255,0.5); margin-bottom:4px;">Jam Operasional</div>
                                <div style="font-size:15px; font-weight:500;">Senin – Jumat, 09.00 – 17.00 WIB</div>
                            </div>
                        </div>
                    </div>

                    {{-- Social Media --}}
                    <div style="margin-top:48px; padding-top:32px; border-top:1px solid rgba(255,255,255,0.1); display:flex; gap:12px; position:relative; z-index:2;">
                        <a href="#" class="sosmed-btn" title="Instagram">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                        </a>
                        <a href="#" class="sosmed-btn" title="Twitter/X">
                            <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                        </a>
                        <a href="#" class="sosmed-btn" title="YouTube">
                            <svg width="20" height="20" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                        </a>
                    </div>
                </div>

                {{-- FORM KONTAK --}}
                <div class="form-card" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                    <h2 style="font-family:'Playfair Display',serif; font-size:24px; color:var(--merah-tua); margin-bottom:8px;">Kirim Pesan</h2>
                    <p style="font-size:14px; color:var(--teks-secondary); margin-bottom:32px;">Isi formulir di bawah ini, tim humas kami akan merespons secepatnya.</p>

                    <form method="POST" action="{{ route('kontak.kirim') }}">
                        @csrf
                        <div style="display:grid; grid-template-columns:1fr 1fr; gap:20px;">

                            <div style="display:flex; flex-direction:column; gap:8px;">
                                <label style="font-size:13px; font-weight:700; color:var(--teks);">Nama Lengkap <span style="color:var(--merah);">*</span></label>
                                <input type="text" name="nama" value="{{ old('nama') }}" class="form-input {{ $errors->has('nama') ? 'error' : '' }}" placeholder="Nama Anda" required>
                                @error('nama')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                            </div>

                            <div style="display:flex; flex-direction:column; gap:8px;">
                                <label style="font-size:13px; font-weight:700; color:var(--teks);">Email <span style="color:var(--merah);">*</span></label>
                                <input type="email" name="email" value="{{ old('email') }}" class="form-input {{ $errors->has('email') ? 'error' : '' }}" placeholder="email@contoh.com" required>
                                @error('email')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                            </div>

                            <div style="display:flex; flex-direction:column; gap:8px;">
                                <label style="font-size:13px; font-weight:700; color:var(--teks);">No. WhatsApp</label>
                                <input type="text" name="no_hp" value="{{ old('no_hp') }}" class="form-input" placeholder="08xxxxxxxxxx">
                            </div>

                            <div style="display:flex; flex-direction:column; gap:8px;">
                                <label style="font-size:13px; font-weight:700; color:var(--teks);">Subjek <span style="color:var(--merah);">*</span></label>
                                <input type="text" name="subjek" value="{{ old('subjek') }}" class="form-input {{ $errors->has('subjek') ? 'error' : '' }}" placeholder="Judul pesan" required>
                                @error('subjek')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                            </div>

                            <div style="grid-column:1/-1; display:flex; flex-direction:column; gap:8px;">
                                <label style="font-size:13px; font-weight:700; color:var(--teks);">Pesan <span style="color:var(--merah);">*</span></label>
                                <textarea name="pesan" rows="5" class="form-input {{ $errors->has('pesan') ? 'error' : '' }}" placeholder="Tulis pesan Anda di sini..." required>{{ old('pesan') }}</textarea>
                                @error('pesan')<span style="font-size:12px; color:#ef4444;">{{ $message }}</span>@enderror
                            </div>

                        </div>

                        <div style="margin-top:32px; text-align:right;">
                            <button type="submit" class="btn-merah">
                                Kirim Pesan
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                            </button>
                        </div>
                    </form>
                </div>

            </div>

            {{-- SECTION REKRUTMEN --}}
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; overflow:hidden; margin-top:64px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                <div style="background:var(--merah-tua); padding:32px 40px; position:relative; overflow:hidden;">
                    <svg style="position:absolute; right:20px; top:10px; width:100px; opacity:0.1; transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                    <h2 style="font-family:'Playfair Display',serif; font-size:24px; color:#fff9f0; position:relative; z-index:1; margin-bottom:8px;">Bergabung Menjadi Kader</h2>
                    <p style="font-size:15px; color:rgba(255,249,240,.7); position:relative; z-index:1;">Langkah-langkah untuk menjadi bagian dari keluarga besar KAMMI Daerah Tasikmalaya</p>
                </div>
                
                <div class="grid-3" style="padding:40px; gap:32px;">
                    <div style="text-align:center;">
                        <div style="width:56px; height:56px; background:var(--merah-muda); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:var(--merah); margin:0 auto 16px;">1</div>
                        <h4 style="font-size:16px; font-weight:700; color:var(--teks); margin-bottom:8px;">Daftar Daurah Marhalah 1</h4>
                        <p style="font-size:14px; color:var(--teks-secondary); line-height:1.6; margin-bottom:16px;">Ikuti pelatihan dasar kepemimpinan dan keislaman (DM 1) sebagai gerbang awal.</p>
                        <a href="{{ route('kaderisasi.index') }}" style="font-size:13px; font-weight:700; color:var(--merah); text-decoration:none; text-transform:uppercase; letter-spacing:0.05em;">Cek Jadwal DM →</a>
                    </div>

                    <div style="text-align:center;">
                        <div style="width:56px; height:56px; background:var(--merah-muda); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:var(--merah); margin:0 auto 16px;">2</div>
                        <h4 style="font-size:16px; font-weight:700; color:var(--teks); margin-bottom:8px;">Aktif di Komisariat</h4>
                        <p style="font-size:14px; color:var(--teks-secondary); line-height:1.6; margin-bottom:16px;">Bergabung dengan komisariat di kampusmu dan mulai berkontribusi dalam kegiatan.</p>
                        <a href="{{ route('komisariat.index') }}" style="font-size:13px; font-weight:700; color:var(--merah); text-decoration:none; text-transform:uppercase; letter-spacing:0.05em;">Lihat Komisariat →</a>
                    </div>

                    <div style="text-align:center;">
                        <div style="width:56px; height:56px; background:var(--merah-muda); border-radius:50%; display:flex; align-items:center; justify-content:center; font-family:'Playfair Display',serif; font-size:24px; font-weight:700; color:var(--merah); margin:0 auto 16px;">3</div>
                        <h4 style="font-size:16px; font-weight:700; color:var(--teks); margin-bottom:8px;">Kembangkan Potensi</h4>
                        <p style="font-size:14px; color:var(--teks-secondary); line-height:1.6; margin-bottom:16px;">Ikuti jenjang kaderisasi lanjut dan berbagai pelatihan skill untuk menjadi Muslim Negarawan.</p>
                        <a href="{{ route('agenda.index') }}" style="font-size:13px; font-weight:700; color:var(--merah); text-decoration:none; text-transform:uppercase; letter-spacing:0.05em;">Lihat Agenda →</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <style>
        .kontak-layout { display:grid; grid-template-columns:1fr 1.5fr; gap:40px; align-items:start; }
        .form-input { width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; color:var(--teks); transition:border-color 0.2s; outline:none; }
        .form-input:focus { border-color:var(--merah); }
        .form-input.error { border-color:#ef4444; }
        .sosmed-btn { width:44px; height:44px; background:rgba(255,255,255,0.1); border-radius:12px; display:flex; align-items:center; justify-content:center; color:white; transition:all 0.2s; }
        .sosmed-btn:hover { background:white; color:var(--merah-tua); transform:translateY(-3px); }

        @media(max-width:900px){
            .kontak-layout { grid-template-columns:1fr; }
            div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns:1fr !important; }
            .grid-3 { grid-template-columns:1fr !important; padding:24px !important; gap:40px !important; }
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
