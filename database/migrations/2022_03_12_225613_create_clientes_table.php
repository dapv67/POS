<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre');
            $table->string('telefono');
            $table->string('celular');
            $table->string('correo');
            $table->string('domicilio');
            $table->string('estado');
            $table->string('municipio');
            $table->string('lugar_trabajo');
            $table->string('img');
            $table->string('nombre_tercero');
            $table->string('estado_tercero');
            $table->string('municipio_tercero');
            $table->string('domicilio_tercero');
            $table->string('telefono_tercero');
            $table->string('celular_tercero');
            $table->string('comentarios');
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
        Schema::dropIfExists('clientes');
    }
}
