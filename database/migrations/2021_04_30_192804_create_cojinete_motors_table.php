<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCojineteMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cojinete_motors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_motor');
            $table->integer('id_cojinete');
            $table->string('pos_cojinete');
            $table->double('diam_externo');
            $table->double('diam_interno');
            $table->integer('sellos');
            $table->integer('juego');
            $table->integer('jaula');
            $table->string('marca_original');
            $table->integer('marca_colocar');
            $table->tinyInteger('tolerancia');
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
        Schema::dropIfExists('cojinete_motors');
    }
}
