<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('daurah_marhalahs', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->enum('level', ['DM1', 'DM2', 'DM3']);
            $table->text('deskripsi')->nullable();
            $table->string('lokasi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->integer('kuota')->default(30);
            $table->string('penyelenggara')->nullable();
            $table->enum('status', ['akan_datang', 'berlangsung', 'selesai'])
                  ->default('akan_datang');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('daurah_marhalahs');
    }
};