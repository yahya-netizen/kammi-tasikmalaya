<x-publik>
    <x-slot name="title">Verifikasi Email — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <div class="page-header-inner fade-up">
            <h1 class="page-title">Verifikasi Email</h1>
            <p class="page-subtitle">Satu langkah lagi untuk mengaktifkan akun Anda.</p>
        </div>
    </div>

    <div class="section" style="background: var(--krem);">
        <div class="section-inner" style="max-width: 600px;">
            
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:24px; padding:40px; box-shadow: 0 10px 40px rgba(0,0,0,0.03);">
                
                <div class="mb-4 text-sm text-gray-600" style="margin-bottom: 24px; line-height: 1.7; color: var(--teks-secondary);">
                    {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                </div>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600" style="margin-bottom: 24px; color: #166534; font-weight: 600; background: #f0fdf4; padding: 12px; border-radius: 8px;">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif

                <div style="display:flex; flex-direction:column; gap:16px;">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn-merah" style="width:100%; justify-content:center;">
                            {{ __('Resend Verification Email') }}
                        </button>
                    </form>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" style="width:100%; background:transparent; border:none; color:var(--teks-secondary); font-size:14px; text-decoration:underline; cursor:pointer;">
                            {{ __('Log Out') }}
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</x-publik>
