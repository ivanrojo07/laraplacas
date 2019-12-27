<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('apellido_paterno')->nullable();
            $table->string('apellido_materno')->nullable();
            $table->string('telefono')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->date('f_registro')->nullable();
            $table->date('f_alta')->nullable();
            $table->date('f_baja')->nullable();
            $table->time('h_alta')->nullable();
            $table->time('h_baja')->nullable();
            $table->time('h_edicion')->nullable();
            $table->boolean('status')->nullable();
            $table->string('token')->nullable();
            $table->unsignedInteger('idusr_alta')->nullable();
            $table->unsignedInteger('idusr_baja')->nullable();
            $table->unsignedInteger('idusr_edicion')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->text('session_id')->nullable();
            $table->text('last_session')->nullable();
            $table->date('last_login')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
