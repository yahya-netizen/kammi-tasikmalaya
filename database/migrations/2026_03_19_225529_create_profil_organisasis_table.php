<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profil_organisasis', function (Blueprint $table) {
            $table->id();
            $table->string('kunci')->unique(); // Misal: 'sejarah', 'visi_misi', 'mars', 'hymne'
            $table->longText('konten')->nullable(); // Konten informasi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profil_organisasis');
    }
};
