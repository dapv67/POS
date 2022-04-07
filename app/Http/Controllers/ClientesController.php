<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        
        return response()->json([
            'data' => $clientes
        ]);
    }

    public function addCliente(Request $request)
    {
        
        $nombre = $request->nombre ? $request->nombre : 'NA';
        $telefono = $request->telefono ? $request->telefono : 'NA';
        $celular = $request->celular ? $request->celular : 'NA';
        $correo = $request->correo ? $request->correo : 'NA';
        $domicilio = $request->domicilio ? $request->domicilio : 'NA';
        $estado = $request->estado ? $request->estado : 'NA';
        $municipio = $request->municipio ? $request->municipio : 'NA';
        $lugar_trabajo = $request->lugar_trabajo ? $request->lugar_trabajo : 'NA';
        $img = $request->img ? $request->img : 'NA';
        $nombre_tercero = $request->nombre_tercero ? $request->nombre_tercero : 'NA';
        $estado_tercero = $request->estado_tercero ? $request->estado_tercero : 'NA';
        $municipio_tercero = $request->municipio_tercero ? $request->municipio_tercero : 'NA';
        $domicilio_tercero = $request->domicilio_tercero ? $request->domicilio_tercero : 'NA';
        $telefono_tercero = $request->telefono_tercero ? $request->telefono_tercero : 'NA';
        $celular_tercero = $request->celular_tercero ? $request->celular_tercero : 'NA';
        $comentarios = $request->comentarios ? $request->comentarios : 'NA';

        if ($request->hasFile('img')) {
            $path = $request->img->store('uploads');
        }
 
        $cliente = Cliente::create(
            [
                'nombre' => $nombre,
                'telefono' => $telefono,
                'celular' => $celular,
                'correo' => $correo,
                'domicilio' => $domicilio,
                'estado' => $estado,
                'municipio' => $municipio,
                'lugar_trabajo' => $lugar_trabajo,
                'img' => $path ? $path : null,
                'nombre_tercero' => $nombre_tercero,
                'estado_tercero' => $estado_tercero,
                'municipio_tercero' => $municipio_tercero,
                'domicilio_tercero' => $domicilio_tercero,
                'telefono_tercero' => $telefono_tercero,
                'celular_tercero' => $celular_tercero,
                'comentarios' => $comentarios,
            ]
        );
        
        return $cliente;
    }

    public function updateCliente(Request $request)
    {
        $id = $request->idActualizar;
        $nombre = $request->nombreActualizar ? $request->nombreActualizar : 'NA';
        $telefono = $request->telefonoActualizar ? $request->telefonoActualizar : 'NA';
        $celular = $request->celularActualizar ? $request->celularActualizar : 'NA';
        $correo = $request->correoActualizar ? $request->correoActualizar : 'NA';
        $domicilio = $request->domicilioActualizar ? $request->domicilioActualizar : 'NA';
        $estado = $request->estadoActualizar ? $request->estadoActualizar : 'NA';
        $municipio = $request->municipioActualizar ? $request->municipioActualizar : 'NA';
        $lugar_trabajo = $request->lugar_trabajoActualizar ? $request->lugar_trabajoActualizar : 'NA';
        $nombre_tercero = $request->nombre_terceroActualizar ? $request->nombre_terceroActualizar : 'NA';
        $estado_tercero = $request->estado_terceroActualizar ? $request->estado_terceroActualizar : 'NA';
        $municipio_tercero = $request->municipio_terceroActualizar ? $request->municipio_terceroActualizar : 'NA';
        $domicilio_tercero = $request->domicilio_terceroActualizar ? $request->domicilio_terceroActualizar : 'NA';
        $telefono_tercero = $request->telefono_terceroActualizar ? $request->telefono_terceroActualizar : 'NA';
        $celular_tercero = $request->celular_terceroActualizar ? $request->celular_terceroActualizar : 'NA';
        $comentarios = $request->comentariosActualizar ? $request->comentariosActualizar : 'NA';

        $cliente = Cliente::find($id);

        if ($request->hasFile('imgActualizar')) {
            Storage::delete($cliente->img);
            $path = $request->imgActualizar->store('uploads');
        }
        else {
            $path = $cliente->img;
        }

        $cliente->nombre = $nombre;
        $cliente->telefono = $telefono;
        $cliente->celular = $celular;
        $cliente->correo = $correo;
        $cliente->domicilio = $domicilio;
        $cliente->estado = $estado;
        $cliente->municipio = $municipio;
        $cliente->lugar_trabajo = $lugar_trabajo;
        $cliente->img = $path;
        $cliente->nombre_tercero = $nombre_tercero;
        $cliente->estado_tercero = $estado_tercero;
        $cliente->municipio_tercero = $municipio_tercero;
        $cliente->domicilio_tercero = $domicilio_tercero;
        $cliente->telefono_tercero = $telefono_tercero;
        $cliente->celular_tercero = $celular_tercero;
        $cliente->comentarios = $comentarios;

        $cliente->save();
        
        return $cliente;
    }

    public function deleteCliente(Request $request)
    {
        $id = $request->id;

        $deleted = Cliente::find($id)->delete();

        return response('Cliente eliminado', 200)->header('Content-Type', 'text/plain');
    }

    public function download(Request $request)
    {
        $path = storage_path('app/' . $request->img);
        return response()->file($path);
    }
}
