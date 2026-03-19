<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('isu_daerahs', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->longText('konten')->nullable();
            $table->enum('kategori', [
                'transportasi',
                'ekonomi-umkm',
                'pendidikan',
                'lingkungan',
                'kebijakan-publik',
                'sosial',
            ]);
            $table->enum('urgensi', ['rendah', 'sedang', 'tinggi', 'kritis'])
                  ->default('sedang');
            $table->enum('status', ['aktif', 'selesai', 'arsip'])
                  ->default('aktif');
            $table->boolean('featured')->default(false);
            $table->string('gambar')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('isu_daerahs');
    }
};