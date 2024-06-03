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
        Schema::disableForeignKeyConstraints();

        Schema::create('permintaan_obat', function (Blueprint $table) {
            $table->id();
            $table->integer('id_user');
            $table->foreign('id_user')->references('id')->on('user');
            $table->integer('jumlah')->nullable();
            $table->integer('id_tujuan');
            $table->foreign('id_tujuan')->references('id')->on('tujuan');
            $table->enum('status', [""]);
            $table->dateTime('created_at');
            $table->dateTime('tgl_validasi')->nullable();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permintaan_obat');
    }
};
