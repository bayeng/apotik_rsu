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
        Schema::create('permintaan_obats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users');
            $table->integer('jumlah')->nullable();
            $table->foreignId('id_tujuan')->constrained(table: 'tujuans');
            $table->enum('status', ["SUKSES"]);
            $table->dateTime('tgl_validasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_obats');
    }
};
