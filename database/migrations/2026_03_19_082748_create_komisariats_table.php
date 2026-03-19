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
    Schema::create('komisariats', function (Blueprint $table) {
        $table->id();
        $table->string('nama');
        $table->string('kampus');
        $table->string('kota')->default('Tasikmalaya');
        $table->string('ketua')->nullable();
        $table->string('no_hp_ketua')->nullable();
        $table->string('email')->nullable();
        $table->integer('jumlah_kader')->default(0);
        $table->text('deskripsi')->nullable();
        $table->string('foto')->nullable();
        $table->string('alamat')->nullable();
        $table->boolean('aktif')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komisariats');
    }
};
