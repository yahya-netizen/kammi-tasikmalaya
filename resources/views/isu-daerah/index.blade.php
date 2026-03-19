<x-publik>
    <x-slot name="title">Isu Daerah — KAMMI Daerah Tasikmalaya</x-slot>

    <x-slot name="styles">
    <style>
        .sec { padding:64px 2.5rem; }
        .inner { max-width:1200px; margin:0 auto; }
        .filter-bar { background:white; border:1px solid #ede8e3; border-radius:14px; padding:18px 20px; margin-bottom:32px; }
        .filter-row { display:grid; grid-template-columns:1fr 1fr 1fr auto; gap:12px; }
        .filter-row input, .filter-row select { border:1px solid #e5e7eb; border-radius:8px; padding:9px 12px; font-size:13.5px; font-family:inherit; color:var(--teks); background:white; transition:border-color .2s; }
        .filter-row input:focus, .filter-row select:focus { outline:none; border-color:#c9a84c; }
        .btn-filter { background:var(--merah); color:white; border:none; border-radius:8px; padding:9px 20px; font-size:13.5px; font-weight:600; cursor:pointer; font-family:inherit; transition:background .2s; }
        .btn-filter:hover { background:var(--merah-tua); }
        .btn-reset { background:#f3f4f6; color:#6b7280; border:none; border-radius:8px; padding:9px 16px; font-size:13.5px; font-weight:500; cursor:pointer; font-family:inherit; text-decoration:none; display:inline-flex; align-items:center; }
        .btn-reset:hover { background:#e5e7eb; }

        /* Unggulan */
        .featured-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; margin-bottom:48px; }
        .featured-label { font-size:11px; font-weight:700; letter-spacing:.1em; text-transform:uppercase; color:var(--merah); display:flex; align-items:center; gap:7px; margin-bottom:16px; }
        .featured-label::before { content:''; width:16px; height:2px; background:var(--emas); border-radius:2px; }

        /* Grid isu */
        .isu-grid { display:grid; grid-template-columns:repeat(3,1fr); gap:20px; }
        .isu-card { background:white; border:1px solid #f0dada; border-radius:16px; overflow:hidden; text-decoration:none; color:inherit; display:block; transition:all .3s; }
        .isu-card:hover { transform:translateY(-4px); box-shadow:0 14px 36px rgba(139,26,26,.1); border-color:#f5c0c0; }
        .isu-thumb { width:100%; height:160px; object-fit:cover; background:#fdf2f2; display:flex; align-items:center; justify-content:center; font-size:36px; }
        .isu-body { padding:20px; }
        .isu-badges { display:flex; gap:6px; flex-wrap:wrap; margin-bottom:10px; }
        .badge { font-size:11px; font-weight:600; padding:3px 10px; border-radius:100px; }
        .badge-kritis  { background:#fde8e8; color:#8b1a1a; }
        .badge-tinggi  { background:#fee2e2; color:#b91c1c; }
        .badge-sedang  { background:#fef3c7; color:#92400e; }
        .badge-rendah  { background:#f3f4f6; color:#4b5563; }
        .badge-kategori { background:#fdf2f2; color:#8b1a1a; }
        .badge-selesai  { background:#f0fdf4; color:#166534; }
        .isu-judul { font-family:'Playfair Display',serif; font-size:1rem; color:var(--merah-tua); margin-bottom:8px; line-height:1.4; }
        .isu-desc  { font-size:13px; color:#7a5050; line-height:1.6; margin-bottom:12px; }
        .isu-meta  { font-size:12px; color:#9ca3af; display:flex; justify-content:space-between; }

        /* Empty state */
        .empty { text-align:center; padding:72px 24px; color:#9ca3af; }
        .empty-icon { font-size:3.5rem; margin-bottom:14px; }

        @media(max-width:900px) {
            .filter-row { grid-template-columns:1fr; }
            .featured-grid, .isu-grid { grid-template-columns:1fr; }
        }
    </style>
    </x-slot>

    {{-- PAGE HEADER --}}
    <div class="page-header">
        <svg style="position:absolute;right:-30px;top:10px;width:120px;opacity:.08;transform:rotate(15deg);" viewBox="0 0 120 150" xmlns="http://www.w3.org/2000/svg"><use href="#payung-geulis"/></svg>
        <div class="page-header-inner">
            <div class="breadcrumb">
                <a href="{{ url('/') }}">Beranda</a>
                <span class="breadcrumb-sep">›</span>
                <span>Isu Daerah</span>
            </div>
            <h1>Isu Daerah & Advokasi</h1>
            <p>Pemantauan dan advokasi isu-isu publik strategis di Tasikmalaya dan Priangan Timur</p>
        </div>
    </div>

    <div class="sec">
        <div class="inner">

            {{-- ISU UNGGULAN --}}
            @if($featured->isNotEmpty())
            <div>
                <div class="featured-label">Isu Unggulan</div>
                <div class="featured-grid" style="margin-bottom:48px;">
                    @foreach($featured as $isu)
                    <a href="{{ route('isu-daerah.show', $isu) }}" class="isu-card">
                        @if($isu->gambar)
                            <img src="{{ Storage::url($isu->gambar) }}" alt="{{ $isu->judul }}" class="isu-thumb" style="display:block;">
                        @else
                            <div class="isu-thumb">📣</div>
                        @endif
                        <div class="isu-body">
                            <div class="isu-badges">
                                <span class="badge badge-{{ $isu->urgensi }}">{{ ucfirst($isu->urgensi) }}</span>
                                <span class="badge badge-kategori">{{ $isu->label_kategori }}</span>
                            </div>
                            <div class="isu-judul">{{ $isu->judul }}</div>
                            <div class="isu-desc">{{ Str::limit($isu->deskripsi, 100) }}</div>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- FILTER --}}
            <div class="filter-bar">
                <form method="GET" action="{{ route('isu-daerah.index') }}">
                    <div class="filter-row">
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul isu...">
                        <select name="kategori">
                            <option value="">Semua Kategori</option>
                            <option value="transportasi"     @selected(request('kategori')==='transportasi')>Transportasi</option>
                            <option value="ekonomi-umkm"     @selected(request('kategori')==='ekonomi-umkm')>Ekonomi & UMKM</option>
                            <option value="pendidikan"       @selected(request('kategori')==='pendidikan')>Pendidikan</option>
                            <option value="lingkungan"       @selected(request('kategori')==='lingkungan')>Lingkungan Hidup</option>
                            <option value="kebijakan-publik" @selected(request('kategori')==='kebijakan-publik')>Kebijakan Publik</option>
                            <option value="sosial"           @selected(request('kategori')==='sosial')>Sosial</option>
                        </select>
                        <select name="urgensi">
                            <option value="">Semua Urgensi</option>
                            <option value="kritis" @selected(request('urgensi')==='kritis')>Kritis</option>
                            <option value="tinggi" @selected(request('urgensi')==='tinggi')>Tinggi</option>
                            <option value="sedang" @selected(request('urgensi')==='sedang')>Sedang</option>
                            <option value="rendah" @selected(request('urgensi')==='rendah')>Rendah</option>
                        </select>
                        <div style="display:flex;gap:8px;">
                            <button type="submit" class="btn-filter">Filter</button>
                            @if(request()->hasAny(['cari','kategori','urgensi']))
                                <a href="{{ route('isu-daerah.index') }}" class="btn-reset">Reset</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>

            {{-- DAFTAR ISU --}}
            @if($isuDaerahs->isEmpty())
                <div class="empty">
                    <div class="empty-icon">📋</div>
                    <p style="font-size:16px;font-weight:500;color:#6b7280;">Belum ada isu daerah yang tersedia.</p>
                    <p style="font-size:14px;margin-top:6px;">Coba ubah filter pencarian.</p>
                </div>
            @else
                <div class="isu-grid">
                    @foreach($isuDaerahs as $isu)
                    <a href="{{ route('isu-daerah.show', $isu) }}" class="isu-card fade-up">
                        @if($isu->gambar)
                            <img src="{{ Storage::url($isu->gambar) }}" alt="{{ $isu->judul }}" class="isu-thumb" style="display:block;">
                        @else
                            <div class="isu-thumb">📣</div>
                        @endif
                        <div class="isu-body">
                            <div class="isu-badges">
                                <span class="badge badge-{{ $isu->urgensi }}">{{ ucfirst($isu->urgensi) }}</span>
                                <span class="badge badge-kategori">{{ $isu->label_kategori }}</span>
                                @if($isu->status === 'selesai')
                                    <span class="badge badge-selesai">Selesai</span>
                                @endif
                            </div>
                            <div class="isu-judul">{{ $isu->judul }}</div>
                            <div class="isu-desc">{{ Str::limit($isu->deskripsi, 110) }}</div>
                            <div class="isu-meta">
                                <span>{{ $isu->user->name ?? '—' }}</span>
                                <span>{{ $isu->created_at->format('d M Y') }}</span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>
                <div style="margin-top:36px;">{{ $isuDaerahs->links() }}</div>
            @endif

        </div>
    </div>
</x-publik>
