<x-publik>
    <x-slot name="title">{{ $isuDaerah->judul }} — KAMMI Daerah Tasikmalaya</x-slot>
    <x-slot name="description">{{ Str::limit($isuDaerah->deskripsi, 160) }}</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:56px 2.5rem; }
        .inner { max-width:900px; margin:0 auto; }
        .badge { font-size:11.5px; font-weight:600; padding:4px 12px; border-radius:100px; }
        .badge-kritis  { background:#fde8e8; color:#8b1a1a; }
        .badge-tinggi  { background:#fee2e2; color:#b91c1c; }
        .badge-sedang  { background:#fef3c7; color:#92400e; }
        .badge-rendah  { background:#f3f4f6; color:#4b5563; }
        .badge-kategori { background:#fdf2f2; color:#8b1a1a; }
        .badge-aktif   { background:#f0fdf4; color:#166534; }
        .badge-selesai { background:#eff6ff; color:#1d4ed8; }
        .artikel { background:white; border-radius:20px; overflow:hidden; border:1px solid #f0dada; }
        .artikel-img { width:100%; max-height:360px; object-fit:cover; }
        .artikel-body { padding:36px 40px; }
        .artikel-badges { display:flex; gap:8px; flex-wrap:wrap; margin-bottom:18px; }
        .artikel-judul { font-family:'Playfair Display',serif; font-size:clamp(1.5rem,2.5vw,2rem); color:var(--merah-tua); line-height:1.3; margin-bottom:14px; }
        .artikel-meta  { display:flex; align-items:center; gap:16px; font-size:13px; color:#9ca3af; padding-bottom:20px; border-bottom:1px solid #f5f5f5; margin-bottom:24px; }
        .deskripsi-box { background:#fdf2f2; border-left:4px solid var(--merah); border-radius:0 10px 10px 0; padding:18px 22px; margin-bottom:28px; font-size:15px; color:#5c0f0f; line-height:1.8; font-weight:500; }
        .konten-full { font-size:15.5px; line-height:1.9; color:#3d2020; }
        .konten-full h2 { font-family:'Playfair Display',serif; font-size:1.35rem; color:var(--merah-tua); margin:28px 0 12px; }
        .konten-full h3 { font-size:1.1rem; font-weight:600; color:var(--merah-tua); margin:22px 0 10px; }
        .konten-full p  { margin-bottom:16px; }
        .konten-full ul, .konten-full ol { margin:12px 0 16px 24px; }
        .konten-full li { margin-bottom:6px; }
        .konten-full blockquote { border-left:4px solid var(--emas); padding:12px 20px; margin:20px 0; background:#fdf6e3; border-radius:0 8px 8px 0; font-style:italic; color:#5c3d0a; }

        /* Terkait */
        .terkait { margin-top:48px; }
        .terkait-title { font-family:'Playfair Display',serif; font-size:1.2rem; color:var(--merah-tua); margin-bottom:20px; }
        .terkait-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .terkait-card { background:white; border:1px solid #f0dada; border-radius:14px; padding:18px; text-decoration:none; color:inherit; display:block; transition:all .2s; }
        .terkait-card:hover { background:var(--merah-muda); border-color:#f5c0c0; transform:translateY(-2px); }
        .terkait-judul { font-size:14px; font-weight:600; color:var(--merah-tua); margin-bottom:6px; line-height:1.4; }
        .terkait-desc  { font-size:12.5px; color:#7a5050; line-height:1.5; }

        @media(max-width:900px){
            .artikel-body { padding:24px 20px; }
            .terkait-grid { grid-template-columns:1fr; }
        }
    </style>
    </x-slot>

    {{-- PAGE HEADER --}}
    <x-page-header 
        :title="Str::limit($isuDaerah->judul, 60)" 
        :breadcrumb="[
            'Isu Daerah' => route('isu-daerah.index'),
            Str::limit($isuDaerah->judul, 40) => request()->url()
        ]"
    />

    <div class="sec">
        <div class="inner">
            <div class="artikel fade-up">
                @if($isuDaerah->gambar)
                    <img src="{{ Storage::url($isuDaerah->gambar) }}" alt="{{ $isuDaerah->judul }}" class="artikel-img">
                @endif
                <div class="artikel-body">
                    <div class="artikel-badges">
                        <span class="badge badge-{{ $isuDaerah->urgensi }}">Urgensi: {{ ucfirst($isuDaerah->urgensi) }}</span>
                        <span class="badge badge-kategori">{{ $isuDaerah->label_kategori }}</span>
                        <span class="badge badge-{{ $isuDaerah->status }}">{{ ucfirst($isuDaerah->status) }}</span>
                    </div>
                    <h1 class="artikel-judul">{{ $isuDaerah->judul }}</h1>
                    <div class="artikel-meta">
                        <span>Oleh: <strong>{{ $isuDaerah->user->name ?? '—' }}</strong></span>
                        <span>{{ $isuDaerah->created_at->format('d F Y') }}</span>
                    </div>
                    <div class="deskripsi-box">{{ $isuDaerah->deskripsi }}</div>
                    @if($isuDaerah->konten)
                        <div class="konten-full">{!! $isuDaerah->konten !!}</div>
                    @endif
                </div>
            </div>

            {{-- ISU TERKAIT --}}
            @if($isuTerkait->isNotEmpty())
            <div class="terkait fade-up">
                <div class="terkait-title">Isu Terkait — {{ $isuDaerah->label_kategori }}</div>
                <div class="terkait-grid">
                    @foreach($isuTerkait as $isu)
                    <a href="{{ route('isu-daerah.show', $isu) }}" class="terkait-card">
                        <div style="display:flex;gap:8px;margin-bottom:8px;">
                            <span class="badge badge-{{ $isu->urgensi }}" style="font-size:10.5px;padding:2px 9px;">{{ ucfirst($isu->urgensi) }}</span>
                        </div>
                        <div class="terkait-judul">{{ $isu->judul }}</div>
                        <div class="terkait-desc">{{ Str::limit($isu->deskripsi, 80) }}</div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
</x-publik>
