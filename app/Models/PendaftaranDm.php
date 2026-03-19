<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PendaftaranDm extends Model
{
    protected $fillable = [
        'daurah_marhalah_id',
        'nama_lengkap',
        'nim',
        'email',
        'no_hp',
        'komisariat',
        'kampus',
        'jenis_kelamin',
        'status',
        'catatan',
    ];

    public function daurahMarhalah(): BelongsTo
    {
        return $this->belongsTo(DaurahMarhalah::class);
    }
}