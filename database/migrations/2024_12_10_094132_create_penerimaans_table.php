<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenerimaansTable extends Migration
{
    public function up()
    {
        Schema::create('penerimaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pemasok');  // Pastikan tipe data sesuai
            $table->string('kode_penerimaan');
            $table->date('tanggal_diterima');
            $table->decimal('berat_diterima', 8, 2);
            $table->timestamps();

            $table->foreign('id_pemasok')->references('id')->on('suppliers')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('penerimaans');
    }
}
