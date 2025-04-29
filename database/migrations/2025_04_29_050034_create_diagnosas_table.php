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
    Schema::create('diagnosas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('pasien_id')->constrained()->onDelete('cascade');
        $table->enum('hasil', ['insomnia primer', 'insomnia sekunder', 'tidak insomnia']);
        $table->float('probabilitas_primer')->nullable();
        $table->float('probabilitas_sekunder')->nullable();
        $table->float('probabilitas_tidak')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diagnosas');
    }
};
