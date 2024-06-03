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

        Schema::create('obat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('jenis_obat');
            $table->integer('harga_jual');
            $table->integer('harga_beli');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');
            $table->integer('stok');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat');
    }
};
