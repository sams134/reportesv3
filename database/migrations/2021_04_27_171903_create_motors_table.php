<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMotorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motors', function (Blueprint $table) {
            $table->increments('id_motor');
            $table->string('year');
            $table->string('os');
            $table->string('hp');
            $table->tinyInteger('hpkw')->default(1);
            $table->string('serie')->nullable();
            $table->string('modelo')->nullable();
            $table->string('marca')->nullable();
            $table->string('rpm')->nullable();
            $table->string('volts')->nullable();
            $table->string('amps')->nullable();
            $table->string('frame')->nullable();
            $table->string('pf')->nullable();
            $table->string('eff')->nullable();
            $table->string('id_tipoequipo')->nullable();
            $table->dateTime('fecha_ingreso');
            $table->tinyInteger('acdc')->nullable();
            $table->string('id_enclosure')->nullable();
            $table->integer('id_cliente')->nullable();
            $table->integer('id_trabajo')->nullable();
            $table->string('comentarios',255)->nullable();
            $table->string('recibido')->nullable();
            $table->string('hz',20)->nullable();
            $table->tinyInteger('phases')->nullable();
            $table->tinyInteger('id_estado')->nullable();
            $table->float('precio')->nullable();
            $table->dateTime('inicio')->nullable();
            $table->dateTime('fin_esperado')->nullable();
            $table->dateTime('fin')->nullable();
            $table->dateTime('fin_max')->nullable();
            $table->string('diagnostico_img')->nullable();
            $table->string('oc')->nullable();
            $table->string('envio')->nullable();
            $table->integer('diagnosticado_por')->nullable();
            $table->integer('autorizado_por')->nullable();
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
        Schema::dropIfExists('motors');
    }
}
