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
        Schema::table('instrukturs', function (Blueprint $table) {
             $table->dropColumn(['no_telepon', 'alamat']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('instrukturs', function (Blueprint $table) {
        $table->string('no_telepon')->nullable();
        $table->text('alamat')->nullable();
        });
    }
};
