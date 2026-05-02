<x-publik>
    <x-slot name="title">Isu Daerah — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <x-page-header 
        title="Isu Daerah & Advokasi" 
        subtitle="Pemantauan dan advokasi isu-isu publik strategis di Tasikmalaya dan Priangan Timur untuk mendorong kebijakan yang berpihak pada rakyat."
        :breadcrumb="['Isu Daerah' => route('isu-daerah.index')]"
    />

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            {{-- FILTER BAR --}}
            <div class="fade-up delay-1" style="background:white; border:1px solid var(--border); border-radius:16px; padding:24px; margin-bottom:48px; box-shadow: 0 4px 20px rgba(0,0,0,0.03);">
                <form method="GET" action="{{ route('isu-daerah.index') }}" style="display:grid; grid-template-columns: 2fr 1.5fr 1.5fr auto; gap:16px;">
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:8px;">Pencarian</label>
                        <input type="text" name="cari" value="{{ request('cari') }}" placeholder="Cari judul isu..." style="width:100%; border:1px solid #e5e7eb; border-radius:8px; padding:10px 14px; font-family:inherit; font-size:14px; color:var(--teks);">
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:8px;">Kategori</label>
                        <select name="kategori" style="width:100%; border:1px solid #e5e7eb; border-radius:8px; padding:10px 14px; font-family:inherit; font-size:14px; color:var(--teks);">
                            <option value="">Semua Kategori</option>
                            <option value="transportasi"     @selected(request('kategori')==='transportasi')>Transportasi</option>
                            <option value="ekonomi-umkm"     @selected(request('kategori')==='ekonomi-umkm')>Ekonomi & UMKM</option>
                            <option value="pendidikan"       @selected(request('kategori')==='pendidikan')>Pendidikan</option>
                            <option value="lingkungan"       @selected(request('kategori')==='lingkungan')>Lingkungan Hidup</option>
                            <option value="kebijakan-publik" @selected(request('kategori')==='kebijakan-publik')>Kebijakan Publik</option>
                            <option value="sosial"           @selected(request('kategori')==='sosial')>Sosial</option>
                        </select>
                    </div>
                    <div>
                        <label style="font-size:12px; font-weight:700; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em; display:block; margin-bottom:8px;">Urgensi</label>
                        <select name="urgensi" style="width:100%; border:1px solid #e5e7eb; border-radius:8px; padding:10px 14px; font-family:inherit; font-size:14px; color:var(--teks);">
                            <option value="">Semua Urgensi</option>
                            <option value="kritis" @selected(request('urgensi')==='kritis')>Kritis</option>
                            <option value="tinggi" @selected(request('urgensi')==='tinggi')>Tinggi</option>
                            <option value="sedang" @selected(request('urgensi')==='sedang')>Sedang</option>
                            <option value="rendah" @selected(request('urgensi')==='rendah')>Rendah</option>
                        </select>
                    </div>
                    <div style="display:flex; align-items:flex-end; gap:8px;">
                        <button type="submit" class="btn-merah" style="height:44px;">Filter</button>
                        @if(request()->hasAny(['cari','kategori','urgensi']))
                            <a href="{{ route('isu-daerah.index') }}" class="btn-outline" style="height:44px; border-color:#e5e7eb; color:#6b7280;">Reset</a>
                        @endif
                    </div>
                </form>
            </div>

            {{-- LIST ISU --}}
            @if($isuDaerahs->isEmpty())
                <div class="fade-up" style="text-align:center; padding:80px 24px; color:var(--teks-secondary); border:2px dashed #e5e7eb; border-radius:24px;">
                    <div style="font-size:3.5rem; margin-bottom:16px; opacity:0.3;">📋</div>
                    <h3 style="font-size:18px; font-weight:600; margin-bottom:8px;">Tidak ada isu ditemukan</h3>
                    <p style="font-size:15px;">Coba ubah kata kunci atau filter pencarian Anda.</p>
                </div>
            @else
                <div class="grid-3">
                    @foreach($isuDaerahs as $i => $isu)
                    <a href="{{ route('isu-daerah.show', $isu) }}" class="card-kammi fade-up delay-{{ ($i % 3) + 1 }}">
                        @if($isu->gambar)
                            <img src="{{ Storage::url($isu->gambar) }}" alt="{{ $isu->judul }}" class="card-img">
                        @else
                            <div class="card-img" style="display:flex; align-items:center; justify-content:center; font-size:48px; background:var(--merah-muda); color:var(--merah);">📣</div>
                        @endif
                        <div class="card-body">
                            <div style="display:flex; gap:8px; margin-bottom:12px; flex-wrap:wrap;">
                                <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:var(--emas-muda); color:#92400e;">
                                    {{ ucfirst($isu->urgensi) }}
                                </span>
                                <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:var(--merah-muda); color:var(--merah);">
                                    {{ $isu->label_kategori }}
                                </span>
                            </div>
                            
                            <h3 class="card-title">{{ $isu->judul }}</h3>
                            <p class="card-desc">{{ Str::limit($isu->deskripsi, 100) }}</p>
                            
                            <div class="card-footer">
                                <span style="display:flex; align-items:center; gap:6px;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                    {{ $isu->created_at->format('d M Y') }}
                                </span>
                                <span style="font-weight:600; color:var(--merah); display:flex; align-items:center; gap:4px;">
                                    Detail <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </span>
                            </div>
                        </div>
                    </a>
                    @endforeach
                </div>

                <div style="margin-top:48px; display:flex; justify-content:center;">
                    {{ $isuDaerahs->links() }}
                </div>
            @endif

        </div>
    </div>

    <style>
        @media(max-width:900px){
            form { grid-template-columns: 1fr !important; }
            .grid-3 { grid-template-columns: 1fr; }
        }
    </style>
</x-publik>
