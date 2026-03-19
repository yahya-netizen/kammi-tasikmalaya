<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
    Schema::create('agendas', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->text('deskripsi')->nullable();
        $table->string('lokasi')->nullable();
        $table->datetime('tanggal_mulai');
        $table->datetime('tanggal_selesai')->nullable();
        $table->enum('kategori', ['daerah','komisariat','kaderisasi','advokasi','bkm','lainnya'])->default('daerah');
        $table->enum('status', ['akan_datang','berlangsung','selesai','dibatalkan'])->default('akan_datang');
        $table->boolean('featured')->default(false);
        $table->foreignId('user_id')->constrained()->cascadeOnDelete();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
