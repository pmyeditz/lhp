<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('produksis', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 20);
            $table->string('kode_produksi', 10);
            $table->date('tanggal_produksi');
            $table->integer('cpo_diproduksi');
            $table->integer('kernel_diproduksi');
            $table->string('ffa', 12);
            $table->integer('total_produksi');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksis');
    }
};
