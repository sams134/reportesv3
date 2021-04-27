<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cliente');
            $table->string('nit')->nullable();;
            $table->string('razon_social')->nullable();;
            $table->string('direccion_fiscal')->nullable();
            $table->string('direccion_planta')->nullable();
            $table->text('comentarios')->nullable();
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
        Schema::dropIfExists('info_clientes');
    }
}
