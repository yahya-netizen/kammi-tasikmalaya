<x-publik>
    <x-slot name="title">Lupa Password — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Lupa Password?</h1>
            <p class="page-subtitle">Jangan khawatir, masukkan email Anda dan kami akan mengirimkan instruksi pengaturan ulang kata sandi.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner" style="max-width: 500px;">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                
                <div class="mb-4 text-sm text-gray-600" style="margin-bottom: 24px; line-height: 1.6;">
                    {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                </div>

                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf

                    <!-- Email Address -->
                    <div style="margin-bottom: 32px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="email@contoh.com"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <button type="submit" class="btn-merah" style="width:100%; justify-content:center; height:48px;">
                        Kirim Link Reset
                    </button>

                    <div style="margin-top:24px; text-align:center;">
                        <a href="{{ route('login') }}" style="font-size:14px; color:var(--teks-secondary); text-decoration:none;">
                            ← Kembali ke Halaman Login
                        </a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-publik>
