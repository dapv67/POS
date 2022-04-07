<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'telefono',
        'celular',
        'correo',
        'domicilio',
        'estado',
        'municipio',
        'lugar_trabajo',
        'img',
        'nombre_tercero',
        'estado_tercero',
        'municipio_tercero',
        'domicilio_tercero',
        'telefono_tercero',
        'celular_tercero',
        'comentarios',
    ];
}
