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
            $table->string('apellidos',);
            $table->string('correo',);
            $table->string('domicilio1',);
            $table->string('domicilio2',);
            $table->string('estado',);
            $table->string('municipio',);
            $table->string('colonia',);
            $table->string('cp',);
            $table->string('comentarios',);
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
