<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_dms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('daurah_marhalah_id')
                  ->constrained()
                  ->cascadeOnDelete();
            $table->string('nama_lengkap');
            $table->string('nim')->nullable();
            $table->string('email');
            $table->string('no_hp');
            $table->string('komisariat');
            $table->string('kampus');
            $table->enum('jenis_kelamin', ['ikhwan', 'akhwat']);
            $table->enum('status', [
                'menunggu',
                'diterima',
                'ditolak',
                'hadir'
            ])->default('menunggu');
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_dms');
    }
};