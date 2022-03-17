<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $fillable = [
        'nombre',
        'apellidos',
        'celular',
        'telefono',
        'correo',
        'domicilio1',
        'domicilio2',
        'estado',
        'municipio',
        'colonia',
        'cp',
        'comentarios',
    ];
}
