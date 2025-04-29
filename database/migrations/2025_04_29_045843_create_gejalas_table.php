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
    Schema::create('gejalas', function (Blueprint $table) {
        $table->id();
        $table->string('kode')->unique(); // contoh: G01, G02
        $table->string('nama'); // deskripsi gejala
        $table->enum('tipe', ['primer', 'sekunder']);
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gejalas');
    }
};
