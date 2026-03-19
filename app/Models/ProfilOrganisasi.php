<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProfilOrganisasi extends Model
{
    protected $table = 'profil_organisasis';

    protected $fillable = [
        'kunci', 'judul', 'konten', 'file_audio', 'url_youtube',
    ];
}
