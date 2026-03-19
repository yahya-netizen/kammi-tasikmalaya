<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komisariat extends Model
{
    protected $fillable = [
        'nama', 'kampus', 'kota', 'ketua', 'no_hp_ketua',
        'email', 'jumlah_kader', 'deskripsi', 'foto', 'alamat', 'aktif',
    ];

    protected $casts = [
        'aktif' => 'boolean',
    ];

    public function scopeAktif($query)
    {
        return $query->where('aktif', true);
    }
}