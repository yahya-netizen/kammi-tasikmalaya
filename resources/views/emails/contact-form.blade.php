<x-mail::message>
# Pesan Baru dari Website KAMMI Tasikmalaya

Halo Admin, Anda menerima pesan baru melalui formulir kontak:

**Nama:** {{ $kontak['nama'] }}  
**Email:** {{ $kontak['email'] }}  
**No. HP/WhatsApp:** {{ $kontak['no_hp'] ?? '-' }}  
**Subjek:** {{ $kontak['subjek'] }}

**Pesan:**  
{{ $kontak['pesan'] }}

Terima kasih,<br>
{{ config('app.name') }}
</x-mail::message>
