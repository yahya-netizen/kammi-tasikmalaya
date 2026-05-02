<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('profil_organisasis', function (Blueprint $table) {
            if (!Schema::hasColumn('profil_organisasis', 'judul')) {
                $table->string('judul')->nullable()->after('kunci');
            }
        });
    }

    public function down(): void
    {
        Schema::table('profil_organisasis', function (Blueprint $table) {
            $table->dropColumn('judul');
        });
    }
};
