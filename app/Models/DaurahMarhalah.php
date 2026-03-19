<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DaurahMarhalah extends Model
{
    protected $table = 'daurah_marhalahs'; // Pastikan secara eksplisit menggunakan tabel ini

    protected $fillable = [
        'nama',
        'level',
        'deskripsi',
        'lokasi',
        'tanggal_mulai',
        'tanggal_selesai',
        'kuota',
        'penyelenggara',
        'status',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function pendaftarans(): HasMany
    {
        return $this->hasMany(PendaftaranDm::class);
    }

    // Hitung sisa kuota
    public function getSisaKuotaAttribute(): int
    {
        return $this->kuota - $this->pendaftarans()->count();
    }
}