<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagenSistema11sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imagen_sistema11s', function (Blueprint $table) {
            $table->bigIncrements('id');
            // LLAVE FORANEA PARA RELACIONARLA CON UN TIPO DE SERVICIO
            // POR DEFECTO ES NULLABLE
            $table->unsignedBigInteger('sistema11_id')->nullable();
            $table->foreign('sistema11_id')->references('id')->on('sistema11s');
            $table->text('img_1')->nullable();
            $table->text('img_2')->nullable();
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
        Schema::dropIfExists('imagen_sistema11s');
    }
}
