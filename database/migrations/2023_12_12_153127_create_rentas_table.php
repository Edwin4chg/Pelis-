<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentas', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->dateTime('fecharegistro');
            $table->dateTime('fechadevolucion');
            $table->dateTime('fechaentrega');
            $table->foreignId('movie_id')->constrained();  // Aseguramos que coincida con el nombre en el modelo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rentas');
    }
};
