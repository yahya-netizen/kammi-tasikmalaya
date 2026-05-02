<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

/**
 * @property int $id
 * @property string $nama
 * @property string $level
 * @property string|null $deskripsi
 * @property string|null $lokasi
 * @property int $kuota
 * @property string|null $penyelenggara
 * @property string $status
 * @property string $slug
 * @property string $token
 * @property \Illuminate\Support\Carbon|null $tanggal_mulai
 * @property \Illuminate\Support\Carbon|null $tanggal_selesai
 * @property-read \Illuminate\Database\Eloquent\Collection|PendaftaranDm[] $pendaftarans
 */
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
        'slug',
        'token',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($daurahMarhalah) {
            // Auto-generate slug dari nama
            $daurahMarhalah->slug = Str::slug($daurahMarhalah->nama);

            // Auto-generate unique token
            $daurahMarhalah->token = Str::random(20);
        });
    }

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