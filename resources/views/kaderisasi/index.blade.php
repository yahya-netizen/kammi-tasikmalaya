<x-publik>
    <x-slot name="title">Kaderisasi — Daurah Marhalah KAMMI Tasikmalaya</x-slot>
    <x-slot name="description">Ikuti Daurah Marhalah KAMMI Daerah Tasikmalaya. Jenjang kaderisasi Muslim Negarawan untuk mahasiswa muslim di Priangan Timur.</x-slot>

    {{-- PAGE HEADER --}}
    <x-page-header 
        title="Daurah Marhalah" 
        subtitle="Program kaderisasi berjenjang KAMMI Daerah Tasikmalaya — DM I, DM II, dan DM III sebagai pondasi pembentukan karakter Muslim Negarawan."
        :breadcrumb="['Kaderisasi' => route('kaderisasi.index')]"
    />

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">

            {{-- INFO 3 TINGKATAN DM --}}
            <div class="grid-3 fade-up" style="margin-bottom:80px;">
                <div class="card-kammi" style="border-top:4px solid #c9a84c;">
                    <div class="card-body">
                        <div style="font-family:'Playfair Display',serif; font-size:40px; font-weight:700; color:#c9a84c; line-height:1; margin-bottom:16px;">01</div>
                        <h3 class="card-title">Daurah Marhalah I</h3>
                        <p class="card-desc">Pelatihan dasar kader KAMMI. Mengenal Islam, gerakan mahasiswa, dan nilai-nilai dasar perjuangan KAMMI sebagai pintu gerbang pengkaderan.</p>
                        <div style="margin-top:auto;">
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--teks-secondary); margin-bottom:12px;">Syarat Peserta</div>
                            <ul style="list-style:none; padding:0; font-size:13px; color:var(--teks-secondary);">
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--emas);">✓</span> Mahasiswa aktif di kampus Tasikmalaya</li>
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--emas);">✓</span> Muslim/muslimah bersedia ikut full</li>
                                <li style="display:flex; gap:8px;"><span style="color:var(--emas);">✓</span> Mengisi formulir pendaftaran</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-kammi" style="border-top:4px solid #8b1a1a;">
                    <div class="card-body">
                        <div style="font-family:'Playfair Display',serif; font-size:40px; font-weight:700; color:#8b1a1a; line-height:1; margin-bottom:16px;">02</div>
                        <h3 class="card-title">Daurah Marhalah II</h3>
                        <p class="card-desc">Pelatihan menengah bagi kader aktif KAMMI. Pendalaman ideologi, kepemimpinan, manajemen organisasi, dan advokasi publik.</p>
                        <div style="margin-top:auto;">
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--teks-secondary); margin-bottom:12px;">Syarat Peserta</div>
                            <ul style="list-style:none; padding:0; font-size:13px; color:var(--teks-secondary);">
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--merah);">✓</span> Telah lulus Daurah Marhalah I</li>
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--merah);">✓</span> Aktif di komisariat minimal 6 bulan</li>
                                <li style="display:flex; gap:8px;"><span style="color:var(--merah);">✓</span> Rekomendasi ketua komisariat</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-kammi" style="border-top:4px solid #5c0f0f;">
                    <div class="card-body">
                        <div style="font-family:'Playfair Display',serif; font-size:40px; font-weight:700; color:#5c0f0f; line-height:1; margin-bottom:16px;">03</div>
                        <h3 class="card-title">Daurah Marhalah III</h3>
                        <p class="card-desc">Pelatihan lanjutan kader senior KAMMI. Membentuk pemimpin daerah yang siap menggerakkan umat dan berkontribusi bagi bangsa.</p>
                        <div style="margin-top:auto;">
                            <div style="font-size:11px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; color:var(--teks-secondary); margin-bottom:12px;">Syarat Peserta</div>
                            <ul style="list-style:none; padding:0; font-size:13px; color:var(--teks-secondary);">
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--merah-tua);">✓</span> Telah lulus Daurah Marhalah II</li>
                                <li style="margin-bottom:6px; display:flex; gap:8px;"><span style="color:var(--merah-tua);">✓</span> Pernah menjabat pengurus komisariat</li>
                                <li style="display:flex; gap:8px;"><span style="color:var(--merah-tua);">✓</span> Rekomendasi BPK Daerah</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            {{-- JADWAL DM MENDATANG --}}
            <div id="jadwal" class="fade-up delay-1">
                <div class="sec-label">Jadwal Pendaftaran</div>
                <h2 class="sec-title">Jadwal Daurah Marhalah</h2>

                @if($daurahList->isNotEmpty())
                    <div style="display:flex; flex-direction:column; gap:20px;">
                        @foreach(['DM1','DM2','DM3'] as $level)
                            @if($daurahList->has($level))
                                @foreach($daurahList[$level] as $dm)
                                @php
                                    $terisi    = $dm->pendaftarans()->whereNotIn('status',['ditolak'])->count();
                                    $sisaKuota = $dm->kuota - $terisi;
                                    $penuh     = $sisaKuota <= 0;
                                @endphp
                                <div style="display:grid; grid-template-columns:80px 1fr auto; gap:24px; align-items:center; background:white; border:1px solid var(--border); border-radius:20px; padding:24px; transition:all 0.3s cubic-bezier(0.16, 1, 0.3, 1);">
                                    
                                    {{-- Tanggal --}}
                                    <div style="text-align:center; background:var(--merah-muda); border-radius:14px; padding:12px 8px; color:var(--merah);">
                                        <div style="font-family:'Playfair Display',serif; font-size:26px; font-weight:700; line-height:1;">{{ $dm->tanggal_mulai->format('d') }}</div>
                                        <div style="font-size:12px; font-weight:600; text-transform:uppercase; margin-top:4px;">{{ $dm->tanggal_mulai->isoFormat('MMM') }}</div>
                                    </div>

                                    {{-- Info --}}
                                    <div>
                                        <div style="display:flex; gap:8px; margin-bottom:8px;">
                                            <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:var(--emas-muda); color:#92400e;">{{ $level }}</span>
                                            @if($dm->status === 'berlangsung')
                                                <span style="font-size:10px; font-weight:700; text-transform:uppercase; letter-spacing:0.05em; padding:4px 10px; border-radius:100px; background:#dcfce7; color:#166534;">Berlangsung</span>
                                            @endif
                                        </div>
                                        <h3 style="font-size:18px; font-weight:700; color:var(--teks); margin-bottom:8px;">{{ $dm->nama }}</h3>
                                        <div style="display:flex; gap:16px; font-size:13px; color:var(--teks-secondary);">
                                            @if($dm->lokasi)
                                            <span style="display:flex; align-items:center; gap:6px;">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                                                {{ $dm->lokasi }}
                                            </span>
                                            @endif
                                            <span style="display:flex; align-items:center; gap:6px;">
                                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87"/><path d="M16 3.13a4 4 0 010 7.75"/></svg>
                                                Sisa {{ $penuh ? 'Penuh' : $sisaKuota . ' kursi' }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- CTA --}}
                                    <div>
                                        @if($penuh)
                                            <span class="btn-outline" style="border-color:#d1d5db; color:#9ca3af; pointer-events:none;">Kuota Penuh</span>
                                        @else
                                            <a href="{{ route('kaderisasi.daftar', $dm) }}" class="btn-merah">Daftar Sekarang</a>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @else
                    <div style="text-align:center; padding:60px; border:2px dashed #e5e7eb; border-radius:24px;">
                        <div style="font-size:3rem; margin-bottom:16px; opacity:0.3;">🎓</div>
                        <h3 style="font-size:18px; font-weight:600; margin-bottom:8px;">Belum ada jadwal pendaftaran</h3>
                        <p style="font-size:15px; color:var(--teks-secondary);">Saat ini belum ada jadwal Daurah Marhalah yang dibuka. Pantau terus halaman ini.</p>
                    </div>
                @endif
            </div>

        </div>
    </div>

    @if(session('success'))
    <div style="position:fixed;bottom:30px;right:30px;background:#15803d;color:white;padding:16px 24px;border-radius:12px;font-size:14px;font-weight:600;z-index:999;box-shadow:0 10px 30px rgba(0,0,0,.2); display:flex; align-items:center; gap:10px; animation: slideUp 0.4s ease-out;">
        <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>
        {{ session('success') }}
    </div>
    <style>@keyframes slideUp { from { transform: translateY(20px); opacity: 0; } to { transform: translateY(0); opacity: 1; } }</style>
    <script>setTimeout(()=>document.querySelector('[style*="position:fixed"]').remove(),5000)</script>
    @endif

    <style>
        @media(max-width:900px){
            .grid-3 { grid-template-columns: 1fr; }
            .card-kammi { margin-bottom: 0; }
            div[style*="grid-template-columns:80px"] { grid-template-columns: 1fr !important; gap: 16px !important; text-align: center; }
            div[style*="text-align:center; background:var(--merah-muda)"] { display: none; }
        }
    </style>
</x-publik>
