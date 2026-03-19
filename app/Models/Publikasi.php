<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Publikasi extends Model
{
    protected $fillable = [
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'gambar',
        'tipe',
        'status',
        'user_id',
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Auto-generate slug dari judul
    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($publikasi) {
            $publikasi->slug = Str::slug($publikasi->judul);
        });
    }

    // Relasi ke User (penulis)
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Scope: hanya yang sudah dipublikasi
    public function scopePublished($query)
    {
        return $query->where('status', 'publikasi');
    }
}