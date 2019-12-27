<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistroPlacasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registro_placas', function (Blueprint $table) {
            $table->bigIncrements('id');
            // LLAVE FORANEA PARA RELACIONARLA CON UN TIPO DE SERVICIO
            // POR DEFECTO ES NULLABLE
            $table->unsignedBigInteger('tipo_servicio_id')->nullable();
            $table->foreign('tipo_servicio_id')->references('id')->on('tipo_servicios');
            // INFORMACIÓN
            $table->string('placa',10);
            $table->boolean('verificada')->default(false);
            $table->string('marca',100)->nullable();
            $table->unsignedInteger('anio')->nullable();
            $table->string('modelo',100)->nullable();
            $table->string('tipo',100)->nullable();
            $table->string('clase',100)->nullable();
            $table->string('niv',100)->nullable();
            $table->string('version',100)->nullable();
            $table->boolean('robado')->default(false);
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
        Schema::dropIfExists('registro_placas');
    }
}
