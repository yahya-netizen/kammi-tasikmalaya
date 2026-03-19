<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IsuDaerah extends Model
{
    protected $fillable = [
        'judul',
        'deskripsi',
        'konten',
        'kategori',
        'urgensi',
        'status',
        'featured',
        'gambar',
        'user_id',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    // Relasi ke User (penulis)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope: hanya yang aktif
    public function scopeAktif($query)
    {
        return $query->where('status', 'aktif');
    }

    // Scope: isu unggulan
    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    // Label urgensi untuk tampilan
    public function getLabelUrgensiAttribute(): string
    {
        return match ($this->urgensi) {
            'rendah'  => 'Rendah',
            'sedang'  => 'Sedang',
            'tinggi'  => 'Tinggi',
            'kritis'  => 'Kritis',
            default   => ucfirst($this->urgensi),
        };
    }

    // Label kategori untuk tampilan
    public function getLabelKategoriAttribute(): string
    {
        return match ($this->kategori) {
            'transportasi'      => 'Transportasi',
            'ekonomi-umkm'      => 'Ekonomi & UMKM',
            'pendidikan'        => 'Pendidikan',
            'lingkungan'        => 'Lingkungan Hidup',
            'kebijakan-publik'  => 'Kebijakan Publik',
            'sosial'            => 'Sosial',
            default             => ucfirst($this->kategori),
        };
    }
}
