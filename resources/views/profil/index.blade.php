<x-publik>
    <x-slot name="title">Pengaturan Profil — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner fade-up">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span>/</span>
                <span class="current">Profil Saya</span>
            </div>
            <h1 class="page-title">Pengaturan Profil</h1>
            <p class="page-subtitle">Lengkapi biodata Anda untuk memudahkan koordinasi dan pendataan kader KAMMI Daerah Tasikmalaya.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">
            
            <form method="POST" action="{{ route('profil.update') }}">
                @csrf
                @method('PATCH')

                <div style="display:grid; grid-template-columns: 300px 1fr; gap:40px; align-items: start;">
                    
                    {{-- SIDEBAR PROFIL --}}
                    <div class="fade-up" style="position: sticky; top: 100px;">
                        <div style="background:white; border:1px solid var(--border); border-radius:24px; overflow:hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.02);">
                            <div style="background:linear-gradient(135deg, var(--merah-tua), #3a0a0a); padding:40px 24px; text-align:center;">
                                <div style="width:100px; height:100px; border-radius:50%; background:var(--emas); border:4px solid rgba(255,255,255,0.1); margin:0 auto 16px; overflow:hidden; display:flex; align-items:center; justify-content:center; font-size:40px; font-weight:700; color:var(--merah-tua);">
                                    <img src="{{ $user->avatar_url }}" style="width:100%; height:100%; object-fit:cover;">
                                </div>
                                <h3 style="font-family:'Playfair Display',serif; font-size:18px; color:white; margin-bottom:4px;">{{ $user->name }}</h3>
                                <p style="font-size:12px; color:rgba(255,255,255,0.5); margin-bottom:12px;">{{ $user->email }}</p>
                                <span style="font-size:10px; font-weight:800; text-transform:uppercase; letter-spacing:0.05em; padding:4px 12px; border-radius:100px; background:rgba(201,168,76,0.2); color:var(--emas); border:1px solid rgba(201,168,76,0.3);">
                                    {{ $user->role }}
                                </span>
                            </div>
                            <div style="padding:24px;">
                                <div style="font-size:12px; color:var(--teks-secondary); line-height:1.6; text-align:center;">
                                    Terdaftar sejak <br><strong>{{ $user->created_at->format('d F Y') }}</strong>
                                </div>
                            </div>
                        </div>

                        @if(session('success'))
                            <div style="margin-top:20px; background:#dcfce7; border:1px solid #86efac; color:#166534; padding:16px; border-radius:16px; font-size:13px; font-weight:600; display:flex; gap:10px; align-items:center;">
                                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 13l4 4L19 7"/></svg>
                                {{ session('success') }}
                            </div>
                        @endif
                    </div>

                    {{-- FORM KELENGKAPAN DATA --}}
                    <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                        
                        {{-- Bagian 1: Identitas Dasar --}}
                        <div style="margin-bottom:40px;">
                            <h2 style="font-family:'Playfair Display',serif; font-size:20px; color:var(--merah-tua); margin-bottom:24px; display:flex; align-items:center; gap:12px;">
                                <span style="width:32px; height:32px; background:var(--merah-muda); color:var(--merah); border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:14px;">01</span>
                                Identitas Dasar
                            </h2>
                            
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                                <div class="form-group">
                                    <label class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-input" required>
                                    @error('name')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email', $user->email) }}" class="form-input" required>
                                    @error('email')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">No. WhatsApp / HP</label>
                                    <input type="text" name="no_hp" value="{{ old('no_hp', $user->no_hp) }}" class="form-input" placeholder="08xxxxxxxxxx">
                                    @error('no_hp')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Tanggal Lahir</label>
                                    <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir', $user->tanggal_lahir?->format('Y-m-d')) }}" class="form-input">
                                    @error('tanggal_lahir')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group" style="grid-column: 1/-1;">
                                    <label class="form-label">Alamat Lengkap</label>
                                    <textarea name="alamat" rows="3" class="form-input" placeholder="Alamat domisili saat ini...">{{ old('alamat', $user->alamat) }}</textarea>
                                    @error('alamat')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        {{-- Bagian 2: Data Akademik --}}
                        <div style="margin-bottom:40px; padding-top:40px; border-top:1px solid #f3f4f6;">
                            <h2 style="font-family:'Playfair Display',serif; font-size:20px; color:var(--merah-tua); margin-bottom:24px; display:flex; align-items:center; gap:12px;">
                                <span style="width:32px; height:32px; background:var(--emas-muda); color:#92400e; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:14px;">02</span>
                                Data Akademik
                            </h2>
                            
                            <div style="display:grid; grid-template-columns:1fr 1fr; gap:24px;">
                                <div class="form-group" style="grid-column: 1/-1;">
                                    <label class="form-label">Asal Universitas</label>
                                    <input type="text" name="universitas" value="{{ old('universitas', $user->universitas) }}" class="form-input" placeholder="Misal: Universitas Siliwangi">
                                    @error('universitas')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Fakultas</label>
                                    <input type="text" name="fakultas" value="{{ old('fakultas', $user->fakultas) }}" class="form-input" placeholder="Misal: Teknik">
                                    @error('fakultas')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Jurusan / Prodi</label>
                                    <input type="text" name="jurusan" value="{{ old('jurusan', $user->jurusan) }}" class="form-input" placeholder="Misal: Informatika">
                                    @error('jurusan')<span class="form-error">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div style="text-align:right;">
                            <button type="submit" class="btn-merah" style="height:50px; padding:0 40px;">
                                Simpan Perubahan Profil
                            </button>
                        </div>

                    </div>

                </div>
            </form>

        </div>
    </div>

    <style>
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        .form-label { font-size: 13px; font-weight: 700; color: var(--teks); }
        .form-input { width: 100%; border: 1px solid #e5e7eb; border-radius: 12px; padding: 12px 16px; font-family: inherit; font-size: 14px; color: var(--teks); transition: all 0.2s; outline: none; }
        .form-input:focus { border-color: var(--merah); box-shadow: 0 0 0 4px var(--merah-muda); }
        .form-error { font-size: 12px; color: #ef4444; margin-top: 4px; }

        @media(max-width:900px){
            div[style*="grid-template-columns: 300px 1fr"] { grid-template-columns: 1fr !important; }
            div[style*="grid-template-columns:1fr 1fr"] { grid-template-columns: 1fr !important; }
            .page-header { padding: 100px 1.5rem 60px !important; }
        }
    </style>
</x-publik>
