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
        Schema::create('obat_keluars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained(table: 'users');
            $table->foreignId('id_tujuan')->constrained(table: 'tujuans');
            $table->integer('total_harga');
            $table->text('catatan')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_keluars');
    }
};
