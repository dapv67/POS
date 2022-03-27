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

    public function categoria()
    {
        return $this->belongsTo('App\Categoria', 'id_categoria');
    }
}
