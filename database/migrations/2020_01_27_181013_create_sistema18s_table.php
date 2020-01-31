<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSistema18sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sistema18s', function (Blueprint $table) {
            $table->bigIncrements('id');
            // LLAVE FORANEA PARA RELACIONARLA CON UN TIPO DE SERVICIO
            // POR DEFECTO ES NULLABLE
            $table->unsignedBigInteger('tipo_servicio_id')->nullable();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');
            // INFORMACIÓN
            $table->string('placa_original');
            $table->string('placa_modificada')->nullable();
            $table->integer('sistema');
            $table->string('img_path_velocidad')->nullable();
            $table->string('img_path_placa')->nullable();
            $table->text('img_b64_velocidad')->nullable();
            $table->text('img_b64_placa')->nullable();
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();
            $table->float('velocidad',8,3);
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
        Schema::dropIfExists('sistema18s');
    }
}
