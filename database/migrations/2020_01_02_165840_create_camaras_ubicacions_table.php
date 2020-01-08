<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamarasUbicacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('camaras_ubicacions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('sistema');
            $table->string('fecha_registro');
            $table->boolean('verificada')->default(false);
            $table->string('ubicacion');
            $table->string('referencia');
            $table->unsignedInteger('limite_velocidad');
            $table->string('lat');
            $table->string('long');
            $table->unsignedInteger('carriles');
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
        Schema::dropIfExists('camaras_ubicacions');
    }
}
