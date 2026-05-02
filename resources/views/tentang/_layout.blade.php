<x-publik>
    <x-slot name="title">{{ $konten?->judul ?? $judul }} — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:860px; margin:0 auto; }
        .konten-card { background:white; border:1px solid #ede8e3; border-radius:20px; overflow:hidden; }
        .konten-gambar { width:100%; max-height:320px; object-fit:cover; }
        .konten-body { padding:44px 48px; }
        .konten-isi { font-size:15.5px; line-height:1.95; color:#3d2020; }
        .konten-isi h2 { font-family:'Playfair Display',serif; font-size:1.4rem; color:var(--merah-tua); margin:28px 0 12px; }
        .konten-isi h3 { font-size:1.1rem; font-weight:600; color:var(--merah-tua); margin:22px 0 10px; }
        .konten-isi p  { margin-bottom:16px; }
        .konten-isi ul, .konten-isi ol { margin:12px 0 16px 24px; }
        .konten-isi li { margin-bottom:8px; }
        .konten-isi blockquote { border-left:4px solid var(--emas); padding:14px 22px; margin:20px 0; background:#fdf6e3; border-radius:0 10px 10px 0; font-style:italic; color:#5c3d0a; }
        .kosong-box { text-align:center; padding:72px 24px; color:#9ca3af; }
        @media(max-width:640px){ .konten-body { padding:24px 20px; } }
    </style>
    </x-slot>

    <x-page-header 
        :title="$konten?->judul ?? $judul" 
        :subtitle="$konten?->subjudul ?? null"
        :breadcrumb="[($konten?->judul ?? $judul) => request()->url()]"
    />

    <div class="sec">
        <div class="inner">
            <div class="konten-card fade-up">
                @if($konten?->gambar)
                    <img src="{{ Storage::url($konten->gambar) }}" alt="{{ $konten->judul }}" class="konten-gambar">
                @endif
                <div class="konten-body">
                    @if($konten?->konten)
                        <div class="konten-isi">{!! $konten->konten !!}</div>
                    @else
                        <div class="kosong-box">
                            <div style="font-size:3rem;margin-bottom:14px;">📄</div>
                            <p style="font-size:15px;font-weight:500;">Konten belum tersedia.</p>
                            <p style="font-size:13px;margin-top:6px;">Admin dapat mengisi konten ini melalui Dashboard → Konten Halaman.</p>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Navigasi antar halaman Tentang --}}
            <div style="display:flex;gap:12px;flex-wrap:wrap;margin-top:32px;" class="fade-up">
                @foreach($navTentang as $item)
                <a href="{{ $item['url'] }}"
                   style="display:inline-flex;align-items:center;gap:7px;padding:10px 18px;border-radius:10px;text-decoration:none;font-size:13.5px;font-weight:600;transition:all .2s;
                          {{ request()->url() === $item['url'] ? 'background:var(--merah);color:white;' : 'background:white;color:var(--merah-tua);border:1px solid #f0dada;' }}">
                    {{ $item['icon'] }} {{ $item['label'] }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</x-publik>
