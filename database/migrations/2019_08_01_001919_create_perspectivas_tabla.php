<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerspectivasTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perspectivas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_objetivo');
            $table->string('indicador');
            $table->string('meta');
            $table->string('iniciativa');
            $table->timestamps();

            $table->foreign('id_objetivo')->references('id')->on('roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perspectivas');
    }
}
