<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObjetivosTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('objetivos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_rol');
            $table->string('nombre');
            $table->tinyInteger('habilitado')
                ->default(1)
                ->comment('[0]=>Deshabilitado [1]=>habilitado');

            $table->timestamps();

            $table->foreign('id_rol')->references('id')->on('roles');

        });

        Schema::create('user_objetivo', function(Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('objetivo_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('objetivo_id')->references('id')->on('objetivos');

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
        Schema::dropIfExists('objetivos');
    }
}
