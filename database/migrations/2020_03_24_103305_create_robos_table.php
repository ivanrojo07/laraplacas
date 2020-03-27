<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRobosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("placa")->unique();
            $table->string("status");
            $table->string("entidad");
            $table->date("fecha_actualizacion");
            $table->date("fecha_robo");
            $table->date("fecha_averiguacion");
            $table->string("entidad_recuperacion");
            $table->date("fecha_recuperacion");
            $table->foreign("placa")->references("placa")->on("repuves");
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
        Schema::dropIfExists('robos');
    }
}
