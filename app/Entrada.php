<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table = 'entradas';

    protected $fillable = [
        'id_cajera',
        'cantidad',
        'comentarios',
    ];
}
