<x-publik>
    <x-slot name="title">Masuk — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Selamat Datang</h1>
            <p class="page-subtitle">Silakan masuk ke akun Anda untuk mengakses fitur lengkap keanggotaan KAMMI Daerah Tasikmalaya.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner" style="max-width: 500px;">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="email@contoh.com"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Password</label>
                        <input type="password" name="password" required placeholder="••••••••"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Remember Me -->
                    <div style="display:flex; justify-content:space-between; align-items:center; margin-bottom:32px;">
                        <label style="display:inline-flex; align-items:center; cursor:pointer;">
                            <input id="remember_me" type="checkbox" name="remember" style="accent-color: var(--merah); width:16px; height:16px;">
                            <span style="margin-left:8px; font-size:13px; color:var(--teks-secondary);">Ingat saya</span>
                        </label>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" style="font-size:13px; color:var(--merah); text-decoration:none; font-weight:600;">Lupa password?</a>
                        @endif
                    </div>

                    <button type="submit" class="btn-merah" style="width:100%; justify-content:center; height:48px;">
                        Log In
                    </button>

                    <div style="margin-top:24px; text-align:center;">
                        <div style="font-size:12px; color:#9ca3af; margin-bottom:16px; display:flex; align-items:center; gap:10px;">
                            <span style="flex-grow:1; height:1px; background:#e5e7eb;"></span>
                            Atau masuk dengan
                            <span style="flex-grow:1; height:1px; background:#e5e7eb;"></span>
                        </div>
                        
                        <a href="{{ route('auth.google') }}"
                            style="display:flex; align-items:center; justify-content:center; gap:10px; border:1px solid #e5e7eb; border-radius:100px; padding:10px 24px; font-size:14px; font-weight:600; color:var(--teks); text-decoration:none; transition:all 0.2s; background:white;">
                            <svg width="18" height="18" viewBox="0 0 24 24">
                                <path fill="#4285F4" d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" />
                                <path fill="#34A853" d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" />
                                <path fill="#FBBC05" d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" />
                                <path fill="#EA4335" d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" />
                            </svg>
                            Google
                        </a>

                        <p style="margin-top:32px; font-size:14px; color:var(--teks-secondary);">
                            Belum punya akun? <a href="{{ route('register') }}" style="color:var(--merah); font-weight:700; text-decoration:none;">Daftar Sekarang</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-publik>
