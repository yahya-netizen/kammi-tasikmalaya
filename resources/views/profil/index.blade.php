<x-publik>
    <x-slot name="title">Profil Saya — KAMMI Tasikmalaya</x-slot>
    <div class="page-header">
        <div class="page-header-inner">
            <div class="breadcrumb"><a href="/">Beranda</a><span class="breadcrumb-sep">›</span><span>Profil</span></div>
            <h1>Profil Saya</h1>
        </div>
    </div>
    <div style="padding:56px 2.5rem;max-width:600px;margin:0 auto;">
        <div style="background:white;border-radius:20px;border:1px solid #ede8e3;overflow:hidden;" class="fade-up">
            <div style="background:#5c0f0f;padding:32px;text-align:center;position:relative;">
                <div style="width:80px;height:80px;border-radius:50%;background:#c9a84c;display:flex;align-items:center;justify-content:center;font-size:2rem;font-weight:700;color:#2c1810;margin:0 auto 12px;overflow:hidden;">
                    @if($user->avatar)
                        <img src="{{ $user->avatar }}" style="width:100%;height:100%;object-fit:cover;">
                    @else
                        {{ strtoupper(substr($user->name, 0, 1)) }}
                    @endif
                </div>
                <div style="font-family:'Playfair Display',serif;font-size:1.3rem;color:#fff9f0;">{{ $user->name }}</div>
                <div style="font-size:13px;color:rgba(255,249,240,.55);margin-top:4px;">{{ $user->email }}</div>
                @if($user->google_id)
                    <div style="display:inline-flex;align-items:center;gap:6px;background:rgba(255,255,255,.1);border-radius:100px;padding:4px 12px;font-size:11.5px;color:rgba(255,249,240,.7);margin-top:10px;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="#fff9f0"><path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z"/><path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z"/><path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z"/><path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z"/></svg>
                        Terhubung dengan Google
                    </div>
                @endif
            </div>
            <div style="padding:32px;">
                @if(session('success'))
                    <div style="background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:12px 16px;font-size:13.5px;color:#166534;margin-bottom:20px;">✓ {{ session('success') }}</div>
                @endif
                <form method="POST" action="{{ route('profil.update') }}">
                    @csrf @method('PATCH')
                    <div style="display:flex;flex-direction:column;gap:16px;">
                        <div>
                            <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:6px;">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name', $user->name) }}" style="width:100%;border:1.5px solid #e5e7eb;border-radius:9px;padding:11px 14px;font-size:14px;font-family:inherit;" required>
                            @error('name')<p style="font-size:12px;color:#ef4444;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label style="font-size:13px;font-weight:600;color:#374151;display:block;margin-bottom:6px;">Email</label>
                            <input type="email" name="email" value="{{ old('email', $user->email) }}" style="width:100%;border:1.5px solid #e5e7eb;border-radius:9px;padding:11px 14px;font-size:14px;font-family:inherit;" required>
                            @error('email')<p style="font-size:12px;color:#ef4444;margin-top:4px;">{{ $message }}</p>@enderror
                        </div>
                        <button type="submit" style="background:#8b1a1a;color:white;border:none;border-radius:9px;padding:12px;font-size:14.5px;font-weight:600;cursor:pointer;font-family:inherit;transition:background .2s;">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-publik>
