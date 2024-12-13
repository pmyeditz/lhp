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
        Schema::create('qualitases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_produksi')->constrained('produksis');
            $table->string('ffa');
            $table->float('kadar_air');
            $table->float('kotoran');
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualitas');
    }
};
