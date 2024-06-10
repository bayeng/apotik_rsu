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
        Schema::create('riwayat_obats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->string('jumlah');
            $table->string('harga');
            $table->foreignId('id_obat_keluar')->constrained(table: 'obat_keluars');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_obats');
    }
};
