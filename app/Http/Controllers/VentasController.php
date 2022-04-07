<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Entrada;
use App\Salida;
use App\Cliente;
use Auth;

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
        $clientes = Cliente::all();

        return view('ventas.ventas', compact('cantidad','clientes'));
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

    public function apartarVenta(Request $request)
    {
        dd($request);

        // AQUI NOS QUEDAMOS EL DÍA DE HOY

        $fechaApartado = $request->fechaApartado;
        $clienteApartarVenta = $request->clienteApartarVenta;
        $montoApartar = $request->montoApartar;
        $fechaApartadoLimite = $request->fechaApartadoLimite;
 
        $apartado = Apartado::create(
            [
                'id_cajera' => $id_cajera,
                'cantidad' => $cantidad,
                'comentarios' => $comentarios,
            ]
        );

        return $apartado;
    }

    public function addEntrada(Request $request)
    {

        $cantidad = $request->cantidadEntrada;
        $comentarios = $request->comentariosEntrada;
        $id_cajera = Auth::user()->id;
 
        $entrada = Entrada::create(
            [
                'id_cajera' => $id_cajera,
                'cantidad' => $cantidad,
                'comentarios' => $comentarios,
            ]
        );

        return $entrada;
    }

    public function addSalida(Request $request)
    {

        $cantidad = $request->cantidadSalida;
        $comentarios = $request->comentariosSalida;
        $id_cajera = Auth::user()->id;
 
        $salida = Salida::create(
            [
                'id_cajera' => $id_cajera,
                'cantidad' => $cantidad,
                'comentarios' => $comentarios,
            ]
        );

        return $salida;
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
