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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_laporan');
            $table->integer('total_penerimaan')->default(0);
            $table->integer('total_produksi')->default(0);
            $table->integer('total_stok_awal')->default(0);
            $table->integer('total_stok_akhir')->default(0);
            $table->integer('total_stok_jadi')->default(0);
            $table->integer('total_pengiriman')->default(0);
            $table->string('rata_rata_qualitas_ffa')->nullable();
            $table->decimal('rata_rata_kadar_air', 8, 2)->nullable();
            $table->decimal('rata_rata_kotoran', 8, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
