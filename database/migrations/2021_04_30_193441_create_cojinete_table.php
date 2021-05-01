<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCojineteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cojinete', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('serie')->nullable();
            $table->string('designacion')->nullable();
            $table->string('foto')->nullable();
            $table->integer('diam_interno')->default(0);
            $table->integer('diam_externo')->default(0);
            $table->integer('ancho')->default(0);
            $table->integer('limite_velocidad')->default(11000);
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
        Schema::dropIfExists('cojinete');
    }
}
