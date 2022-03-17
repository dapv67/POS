<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class ClientesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('clientes.clientes');
    }

    public function getClientes()
    {

        $clientes = Cliente::all();
        
        return $clientes;
    }

    public function addCliente(Request $request)
    {
        $nombre = $request->nombre ? $request->nombre : 'NA';
        $apellidos = $request->apellidos ? $request->apellidos : 'NA';
        $telefono = $request->telefono ? $request->telefono : 'NA';
        $celular = $request->celular ? $request->celular : 'NA';
        $correo = $request->correo ? $request->correo : 'NA';
        $domicilio1 = $request->domicilio1 ? $request->domicilio1 : 'NA';
        $domicilio2 = $request->domicilio2 ? $request->domicilio2 : 'NA';
        $estado = $request->estado ? $request->estado : 'NA';
        $municipio = $request->municipio ? $request->municipio : 'NA';
        $colonia = $request->colonia ? $request->colonia : 'NA';
        $cp = $request->cp ? $request->cp : 'NA';
        $comentarios = $request->comentarios ? $request->comentarios : 'NA';
 
        $cliente = Cliente::create(
            [
                'nombre' => $nombre,
                'apellidos' => $apellidos,
                'telefono' => $telefono,
                'celular' => $celular,
                'correo' => $correo,
                'domicilio1' => $domicilio1,
                'domicilio2' => $domicilio2,
                'estado' => $estado,
                'municipio' => $municipio,
                'colonia' => $colonia,
                'cp' => $cp,
                'comentarios' => $comentarios,
            ]
        );
        
        return $cliente;
    }
}
