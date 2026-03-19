<x-publik>
    <x-slot name="title">Konfirmasi Password — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Konfirmasi Keamanan</h1>
            <p class="page-subtitle">Demi keamanan, silakan konfirmasi kata sandi Anda sebelum melanjutkan.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner" style="max-width: 500px;">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                
                <div class="mb-4 text-sm text-gray-600" style="margin-bottom: 24px; line-height: 1.6; color: var(--teks-secondary);">
                    {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                </div>

                <form method="POST" action="{{ route('password.confirm') }}">
                    @csrf

                    <!-- Password -->
                    <div style="margin-bottom: 32px;">
                        <label style="font-size:13px; font-weight:700; color:var(--teks); display:block; margin-bottom:8px;">Password</label>
                        <input type="password" name="password" required autocomplete="current-password" placeholder="••••••••"
                            style="width:100%; border:1px solid #e5e7eb; border-radius:10px; padding:12px 16px; font-family:inherit; font-size:14px; outline:none; transition:border-color 0.2s;"
                            onfocus="this.style.borderColor='var(--merah)'" onblur="this.style.borderColor='#e5e7eb'">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <button type="submit" class="btn-merah" style="width:100%; justify-content:center; height:48px;">
                        {{ __('Confirm') }}
                    </button>
                </form>
            </div>

        </div>
    </div>
</x-publik>
