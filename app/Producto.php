<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $fillable = [
        'id_categoria',
        'descripcion',
        'codigo',
        'precio_compra',
        'precio_venta',
        'existencia',
        'categoria',
        'unidad',
        'minimo',
        'maximo',
    ];
}
