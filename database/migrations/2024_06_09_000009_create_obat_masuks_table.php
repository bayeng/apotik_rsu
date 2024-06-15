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
        Schema::create('obat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_datang')->default(now())->nullable();
            $table->integer('jumlah');
            $table->foreignId('id_penerima')->constrained(table: 'users');
//            $table->foreign('id_penerima')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_suplier')->constrained(table: 'supliers');
//            $table->foreign('id_suplier')->references('id')->on('supliers')->onDelete('cascade');
            $table->foreignId('id_obat')->constrained(table: 'obats');
//            $table->foreign('id_obat')->references('id')->on('obats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_masuks');
    }
};
