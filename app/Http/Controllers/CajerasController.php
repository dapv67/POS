<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Role;

class CajerasController extends Controller
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
        return view('cajeras.cajeras');
    }

    public function getCajeras()
    {

        // $cajeras = User::all();
        $cajeras = User::role('cajera')->get();
        
        return $cajeras;
    }

    public function addCajera(Request $request)
    {
        $nombre = $request->nombre ? $request->nombre : 'NA';
        $usuario = $request->usuario ? $request->usuario : 'NA';
        $contrasena = $request->contrasena ? $request->contrasena : '123';
 
        $cajera = User::create(
            [
                'name' => $nombre,
                'username' => $usuario,
                'password' => Hash::make($contrasena)
            ]
        );

        $cajera->assignRole('cajera');
        
        return $cajera;
    }

    public function deleteCajera(Request $request)
    {
        $id = $request->id;

        $deleted = User::find($id)->delete();

        return response('Cajera eliminada', 200)->header('Content-Type', 'text/plain');
    }
}
