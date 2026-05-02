<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('daurah_marhalahs', function (Blueprint $table) {
            $table->string('slug')->unique()->after('nama');
            $table->string('token')->unique()->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('daurah_marhalahs', function (Blueprint $table) {
            $table->dropColumn(['slug', 'token']);
        });
    }
};
