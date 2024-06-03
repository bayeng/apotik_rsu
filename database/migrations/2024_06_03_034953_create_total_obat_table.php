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

        Schema::create('total_obat', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_permintaan_obat');
            $table->foreign('id_permintaan_obat')->references('id')->on('permintaan_obat');
            $table->integer('id_obat');
            $table->foreign('id_obat')->references('id')->on('obat');
            $table->integer('jumlah');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('total_obat');
    }
};
