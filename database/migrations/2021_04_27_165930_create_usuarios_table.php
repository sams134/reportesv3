<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user');
            $table->string('nombre');
            $table->string('segundo_nombre')->nullable();
            $table->string('apellido');
            $table->string('segundo_apellido')->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->date('fecha_ingreso')->nullable();
            $table->string('dpi')->nullable();
            $table->string('igss')->nullable();
            $table->string('telefono')->nullable();
            $table->string('domicilio')->nullable();
            $table->tinyInteger('estado_civil')->nullable();
            $table->string('conyugue')->nullable();
            $table->string('puesto')->nullable();
            $table->tinyInteger('departamento')->nullable();
            $table->string('no_cuenta')->nullable();
            $table->string('banco')->nullable();
            $table->tinyInteger('activo')->nullable();
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
        Schema::dropIfExists('usuarios');
    }
}
