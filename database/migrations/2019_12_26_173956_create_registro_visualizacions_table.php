<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroVisualizacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_visualizacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            // LLAVE FORANEA PARA RELACIONARLA CON UN TIPO DE SERVICIO
            // POR DEFECTO ES NULLABLE
            $table->unsignedBigInteger('registro_placa_id')->nullable();
            $table->foreign('registro_placa_id')->references('id')->on('registro_placas');
            // Otra Información
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->text('sistema')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('registro_visualizacions');
    }
}
