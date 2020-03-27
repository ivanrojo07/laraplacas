<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepuvesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repuves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("placa")->unique();
            $table->string("marca");
            $table->string("modelo");
            $table->string("anio");
            $table->string("clase");
            $table->string("tipo");
            $table->string("niv");
            $table->string("version");
            $table->string("robado");
            $table->string("fecha");
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
        Schema::dropIfExists('repuves');
    }
}
