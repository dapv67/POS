<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;

class VentasController extends Controller
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
        $cantidad = 11;

        return view('ventas.ventas', compact('cantidad'));
    }

    public function addProducto(Request $request)
    {

        $codigo = $request->codigo;
        $cantidad = $request->cantidad;
 
        $producto = Producto::select('id','codigo','descripcion','precio_venta as precioVenta','existencia')->where('codigo',$codigo)->first();

        $producto->cantidad = $cantidad;
        $producto->importe = $producto->precioVenta * $cantidad;
        // $producto->existencia = $producto->existencia - $cantidad; 

        return $producto;
    }

    public function verificador(Request $request)
    {

        $codigo = $request->codigo;

        $producto = Producto::select('id','codigo','descripcion','precio_venta as precioVenta','existencia')->where('codigo',$codigo)->first();

        $producto->cantidad = 1;
        $producto->importe = $producto->precioVenta;

        return $producto;
    }
}
