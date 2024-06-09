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
        Schema::create('total_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_permintaan_obat')->constrained(table: 'permintaan_obats');
            $table->foreignId('id_obat')->constrained(table: 'obats');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_obats');
    }
};
