<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_categoria');
            $table->string('descripcion')->unique();
            $table->integer('codigo')->unique();;
            $table->float('precio_compra');
            $table->float('precio_venta');
            $table->integer('existencia');
            $table->string('categoria');
            $table->string('unidad');
            $table->float('minimo');
            $table->float('maximo');
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
        Schema::dropIfExists('productos');
    }
}
