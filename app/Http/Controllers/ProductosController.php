<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Producto;
use App\Promocion;
use Illuminate\Http\Request;

class ProductosController extends Controller
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

    public function index()
    {
        $categorias = Categoria::all();

        return view('productos.productos', compact('categorias'));
    }

    public function getProductos()
    {

        $productos = Producto::all();
        
        return $productos;
    }

    public function addProducto(Request $request)
    {

        $id_categoria = $request->id_categoria | 0;
        $descripcion = $request->descripcion;
        $codigo = $request->codigo;
        $precio_compra = $request->precioCompra;
        $precio_venta = $request->precioVenta;
        $existencia = $request->existencia;
        $categoria = $request->categoria;
        $unidad = $request->unidad | 0;
        $minimo = $request->minimo;
        $maximo = $request->maximo;
 
        $producto = Producto::create(
            [
                'id_categoria' => $id_categoria,
                'descripcion' => $descripcion,
                'codigo' => $codigo,
                'precio_compra' => $precio_compra,
                'precio_venta' => $precio_venta,
                'existencia' => $existencia,
                'categoria' => $categoria,
                'unidad' => $unidad,
                'minimo' => $minimo,
                'maximo' => $maximo,
            ]
        );
        
        return $producto;
    }

    public function categorias()
    {
        $categorias = Categoria::all();

        return view('productos.catalogo-productos', compact('categorias'));
    }

    public function getCategorias()
    {

        $categorias = Categoria::all();
        
        return $categorias;
    }

    public function addCategoria(Request $request)
    {
        $name = $request->categoria;
 
        $categoria = Categoria::create(['name' => $name]);
        
        return $categoria;
    }

    public function deleteCategoria(Request $request)
    {
        $id = $request->id;

        $deleted = Categoria::find($id)->delete();

        return response('Categoria eliminada', 200)->header('Content-Type', 'text/plain');
    }

    public function getPromociones()
    {

        $promociones = Promocion::all();
        
        return $promociones;
    }
}
