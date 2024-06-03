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

        Schema::create('obat_masuks', function (Blueprint $table) {
            $table->increments('id');
            $table->date('tgl_datang');
            $table->bigInteger('jumlah');
            $table->integer('id_penerima');
            $table->foreign('id_penerima')->references('id')->on('user');
            $table->integer('id_supplier');
            $table->foreign('id_supplier')->references('id')->on('suplier');
            $table->integer('id_obat');
            $table->foreign('id_obat')->references('id')->on('obat');
            $table->timestamps();
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_masuk');
    }
};
