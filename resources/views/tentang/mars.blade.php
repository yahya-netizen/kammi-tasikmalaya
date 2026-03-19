<x-publik>
    <x-slot name="title">Mars KAMMI</x-slot>
    <div class="page-header">
        <div class="page-header-inner">
            <div class="breadcrumb"><a href="/">Beranda</a><span class="breadcrumb-sep">›</span><span>Tentang</span><span class="breadcrumb-sep">›</span><span>Mars KAMMI</span></div>
            <h1>{{ $konten->judul ?? 'Mars KAMMI' }}</h1>
        </div>
    </div>
    <div style="padding:56px 2.5rem;max-width:800px;margin:0 auto;">
        @if($konten->url_youtube)
        <div class="fade-up" style="margin-bottom:32px;border-radius:16px;overflow:hidden;aspect-ratio:16/9;">
            <iframe width="100%" height="100%"
                src="{{ str_replace('watch?v=', 'embed/', $konten->url_youtube) }}"
                frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen style="display:block;"></iframe>
        </div>
        @endif
        @if($konten->file_audio)
        <div class="fade-up" style="background:white;border-radius:12px;padding:20px;border:1px solid #ede8e3;margin-bottom:24px;">
            <p style="font-size:13px;color:#9ca3af;margin-bottom:10px;">Audio Mars KAMMI</p>
            <audio controls style="width:100%;">
                <source src="{{ Storage::url($konten->file_audio) }}" type="audio/mpeg">
            </audio>
        </div>
        @endif
        @if($konten->konten)
            <div class="fade-up" style="background:white;border-radius:16px;padding:40px;border:1px solid #ede8e3;font-size:15.5px;line-height:2;color:#3d2020;white-space:pre-line;">{!! $konten->konten !!}</div>
        @else
            <div style="text-align:center;padding:80px 24px;color:#9ca3af;">
                <div style="font-size:3rem;margin-bottom:16px;">🎵</div>
                <p>Konten Mars KAMMI belum diisi. Tambahkan melalui dashboard admin.</p>
            </div>
        @endif
    </div>
</x-publik>
