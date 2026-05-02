<x-publik>
    <x-slot name="title">Agenda & Kalender — KAMMI Daerah Tasikmalaya</x-slot>

    {{-- PAGE HEADER --}}
    <x-page-header 
        title="Agenda & Kalender" 
        subtitle="Jadwal kegiatan KAMMI Daerah Tasikmalaya dan komisariat. Ikuti terus perkembangan agenda pergerakan kami."
        :breadcrumb="['Agenda' => route('agenda.index')]"
    />

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            {{-- SEDANG BERLANGSUNG --}}
            @if($berlangsung->isNotEmpty())
            <div class="fade-up" style="margin-bottom:60px;">
                <div class="sec-label">Sedang Berlangsung</div>
                <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:24px;">
                    @foreach($berlangsung as $agenda)
                    <div style="background:linear-gradient(135deg, var(--merah-tua), #3a0a0a); border-radius:20px; padding:32px; position:relative; overflow:hidden; color:white; box-shadow: 0 20px 40px rgba(92,15,15,0.2);">
                        <svg style="position:absolute; right:-20px; top:-20px; width:140px; opacity:0.05; transform:rotate(20deg);" viewBox="0 0 120 150"><use href="#payung-geulis"/></svg>
                        
                        <div style="display:inline-flex; align-items:center; gap:8px; background:rgba(34,197,94,.15); border:1px solid rgba(34,197,94,.4); color:#86efac; font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:6px 14px; border-radius:100px; margin-bottom:16px; position:relative; z-index:2;">
                            <span style="width:8px; height:8px; background:#4ade80; border-radius:50%; box-shadow: 0 0 8px #4ade80;"></span>
                            Sedang Berlangsung
                        </div>

                        <h3 style="font-family:'Playfair Display',serif; font-size:24px; margin-bottom:16px; line-height:1.3; position:relative; z-index:2;">{{ $agenda->judul }}</h3>
                        
                        <div style="display:flex; flex-wrap:wrap; gap:16px; font-size:14px; color:rgba(255,255,255,0.7); position:relative; z-index:2;">
                            @if($agenda->lokasi)
                            <span style="display:flex; align-items:center; gap:6px;">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                {{ $agenda->lokasi }}
                            </span>
                            @endif
                            <span style="display:flex; align-items:center; gap:6px;">
                                <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg>
                                Sampai {{ $agenda->tanggal_selesai?->format('d M Y') ?? 'Selesai' }}
                            </span>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            {{-- AKAN DATANG --}}
            <div class="sec-label">Akan Datang</div>
            <h2 class="sec-title">Jadwal Kegiatan Mendatang</h2>

            @if($akanDatang->isEmpty())
                <div class="fade-up" style="text-align:center; padding:80px 24px; color:var(--teks-secondary); border:2px dashed #e5e7eb; border-radius:24px;">
                    <div style="font-size:3.5rem; margin-bottom:16px; opacity:0.3;">📅</div>
                    <h3 style="font-size:18px; font-weight:600; margin-bottom:8px;">Belum ada agenda</h3>
                    <p style="font-size:15px;">Pantau terus halaman ini untuk informasi kegiatan terbaru.</p>
                </div>
            @else
                <div style="display:flex; flex-direction:column; gap:20px; margin-bottom:60px;">
                    @foreach($akanDatang as $i => $agenda)
                    @php $hariLagi = now()->diffInDays($agenda->tanggal_mulai, false); @endphp
                    <div class="fade-up delay-{{ ($i % 3) + 1 }}" style="display:grid; grid-template-columns:80px 1fr auto; gap:24px; align-items:center; background:white; border:1px solid var(--border); border-radius:20px; padding:24px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                        
                        {{-- Tanggal --}}
                        <div style="text-align:center; background:var(--merah-muda); border-radius:14px; padding:12px 8px; color:var(--merah);">
                            <div style="font-family:'Playfair Display',serif; font-size:26px; font-weight:700; line-height:1;">{{ $agenda->tanggal_mulai->format('d') }}</div>
                            <div style="font-size:12px; font-weight:600; text-transform:uppercase; margin-top:4px;">{{ $agenda->tanggal_mulai->isoFormat('MMM') }}</div>
                        </div>

                        {{-- Info --}}
                        <div>
                            <div style="display:flex; gap:8px; margin-bottom:8px;">
                                <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:var(--emas-muda); color:#92400e;">
                                    {{ $agenda->label_kategori }}
                                </span>
                            </div>
                            <h3 style="font-size:18px; font-weight:700; color:var(--teks); margin-bottom:8px;">{{ $agenda->judul }}</h3>
                            <div style="display:flex; gap:16px; font-size:13px; color:var(--teks-secondary);">
                                @if($agenda->lokasi)
                                <span style="display:flex; align-items:center; gap:6px;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                    {{ $agenda->lokasi }}
                                </span>
                                @endif
                                <span style="display:flex; align-items:center; gap:6px;">
                                    <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
                                    {{ $agenda->tanggal_mulai->format('H:i') }} WIB
                                </span>
                            </div>
                        </div>

                        {{-- Countdown --}}
                        <div style="text-align:right; min-width:80px;" class="agenda-countdown">
                            <div style="font-family:'Playfair Display',serif; font-size:28px; font-weight:700; color:var(--merah-tua); line-height:1;">{{ $hariLagi }}</div>
                            <div style="font-size:11px; color:var(--teks-secondary); text-transform:uppercase; letter-spacing:0.05em;">Hari Lagi</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            @endif

            {{-- KEGIATAN LEWAT --}}
            @if($lewat->isNotEmpty())
            <div style="margin-top:80px; padding-top:40px; border-top:1px solid rgba(0,0,0,0.05);">
                <div class="sec-label">Arsip</div>
                <h2 class="sec-title" style="font-size:24px;">Kegiatan Sebelumnya</h2>
                <div class="grid-3">
                    @foreach($lewat as $agenda)
                    <div class="fade-up" style="background:white; border:1px solid #e5e7eb; border-radius:16px; padding:24px; opacity:0.8; transition:all 0.2s;">
                        <div style="font-size:12px; color:var(--teks-secondary); margin-bottom:8px;">{{ $agenda->tanggal_mulai->format('d M Y') }}</div>
                        <h4 style="font-size:16px; font-weight:700; color:var(--teks); margin-bottom:8px; line-height:1.4;">{{ $agenda->judul }}</h4>
                        @if($agenda->lokasi)
                        <div style="font-size:12px; color:var(--teks-secondary); display:flex; align-items:center; gap:6px;">
                            <svg width="12" height="12" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            {{ $agenda->lokasi }}
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
    </div>

    <style>
        @media(max-width:900px){
            .agenda-countdown { display:none; }
            .grid-3 { grid-template-columns:1fr; }
        }
    </style>
</x-publik>
