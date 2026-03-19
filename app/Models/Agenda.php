<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Agenda extends Model
{
    protected $fillable = [
        'judul', 'deskripsi', 'lokasi',
        'tanggal_mulai', 'tanggal_selesai',
        'kategori', 'status', 'featured', 'user_id',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'datetime',
        'tanggal_selesai' => 'datetime',
        'featured'        => 'boolean',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function getLabelKategoriAttribute(): string
    {
        return match ($this->kategori) {
            'daerah'     => 'Daerah',
            'komisariat' => 'Komisariat',
            'kaderisasi' => 'Kaderisasi',
            'advokasi'   => 'Advokasi',
            'bkm'        => 'BKM',
            default      => 'Lainnya',
        };
    }
}