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
        Schema::table('produksis', function (Blueprint $table) {
            $table->unsignedBigInteger('supplier_id'); // Menambahkan kolom supplier_id
            $table->foreign('supplier_id')->references('id')->on('suppliers')->onDelete('cascade'); // Menambahkan constraint foreign key
        });
    }

    public function down()
    {
        Schema::table('produksis', function (Blueprint $table) {
            $table->dropForeign(['supplier_id']); // Menghapus foreign key
            $table->dropColumn('supplier_id'); // Menghapus kolom supplier_id
        });
    }
};
