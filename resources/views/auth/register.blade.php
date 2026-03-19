<x-publik>
    <x-slot name="title">Daftar Akun — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-50px;top:20px;width:240px;opacity:.05;transform:rotate(15deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Buat Akun Baru</h1>
            <p class="page-subtitle">Bergabunglah dengan sistem informasi keanggotaan KAMMI Daerah Tasikmalaya untuk mendapatkan akses eksklusif.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner" style="max-width: 500px;">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Nama Lengkap</label>
                        <input type="text" name="name" value="{{ old('name') }}" required autofocus placeholder="Nama Anda"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required placeholder="email@contoh.com"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 20px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Password</label>
                        <input type="password" name="password" required placeholder="Minimal 8 karakter"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div style="margin-bottom: 32px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required placeholder="Ulangi password"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <button type="submit" class="btn-merah" style="width:100%; justify-content:center; height:48px;">
                        Daftar Sekarang
                    </button>

                    <div style="margin-top:24px; text-align:center;">
                        <p style="font-size:14px; color:var(--teks-secondary);">
                            Sudah punya akun? <a href="{{ route('login') }}" style="color:var(--merah); font-weight:700; text-decoration:none;">Log In</a>
                        </p>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-publik>
