<x-publik>
    <x-slot name="title">Galeri - KAMMI Daerah Tasikmalaya</x-slot>

    <x-page-header 
        title="Galeri Dokumentasi" 
        subtitle="Rekam jejak perjuangan dan aksi Kesatuan Aksi Mahasiswa Muslim Indonesia (KAMMI) Daerah Tasikmalaya."
        :breadcrumb="['Galeri' => route('gallery.index')]"
    />

    <div class="section" style="background: var(--krem);">
        <div class="section-inner">
            @if($galleries->count() > 0)
            <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:30px;">
                @foreach($galleries as $i => $item)
                <div class="card-kammi fade-up delay-{{ ($i % 3) + 1 }}">
                    <div style="height:250px; overflow:hidden;">
                        <img src="{{ asset('storage/' . $item->foto) }}" alt="Galeri KAMMI" class="card-img" style="height:100%; transition:transform .5s;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    </div>
                    <div class="card-body" style="text-align:center;">
                        <p style="font-style:italic; font-size:14px; color:var(--teks-secondary); line-height:1.6;">
                            "{{ $item->keterangan ?? 'Dokumentasi KAMMI' }}"
                        </p>
                    </div>
                </div>
                @endforeach
            </div>

            <div style="margin-top:50px; display:flex; justify-content:center;">
                {{ $galleries->links() }}
            </div>
            @else
            <div class="fade-up" style="text-align:center; padding:100px 0; background:white; border-radius:20px; border:1px solid var(--border);">
                <div style="font-size:48px; margin-bottom:20px; opacity:0.3;">📸</div>
                <h3 class="font-serif" style="font-size:24px; color:var(--merah-tua);">Galeri Masih Kosong</h3>
                <p style="color:var(--teks-secondary); margin-top:10px;">Belum ada foto kegiatan yang diunggah.</p>
            </div>
            @endif
        </div>
    </div>
</x-publik>
