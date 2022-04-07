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

        $productos = Producto::select('productos.*','categorias.name as categoria')->join('categorias','categorias.id', '=', 'id_categoria')->get();

        return $productos;
    }

    public function addProducto(Request $request)
    {

        $categoria = $request->categoria | 0;
        $descripcion = $request->descripcion;
        $codigo = $request->codigo;
        $precio_compra = $request->precioCompra;
        $precio_venta = $request->precioVenta;
        $existencia = $request->existencia;
        $unidad = $request->unidad | 0;
        $minimo = $request->minimo;
        $maximo = $request->maximo;

        $producto = Producto::create(
            [
                'id_categoria' => $categoria,
                'descripcion' => $descripcion,
                'codigo' => $codigo,
                'precio_compra' => $precio_compra,
                'precio_venta' => $precio_venta,
                'existencia' => $existencia,
                'unidad' => $unidad,
                'minimo' => $minimo,
                'maximo' => $maximo,
            ]
        );

        $producto = Producto::select('productos.*','categorias.name as categoria')
            ->join('categorias','categorias.id', '=', 'id_categoria')
            ->where('productos.id',$producto->id)
            ->first();

        return $producto;
    }

    public function actualizarProducto(Request $request)
    {

        $id = $request->idActualizar;
        $precio_compra = $request->precioCompraActualizar;
        $precio_venta = $request->precioVentaActualizar;
        $minimo = $request->minimoActualizar;
        $maximo = $request->maximoActualizar;

        $producto = Producto::find($id);

        $producto->precio_compra = $precio_compra;
        $producto->precio_venta = $precio_venta;
        $producto->minimo = $minimo;
        $producto->maximo = $maximo;

        $producto->save();

        $producto = Producto::select('productos.*','categorias.name as categoria')
            ->join('categorias','categorias.id', '=', 'id_categoria')
            ->where('productos.id',$id)
            ->first();

        return $producto;
    }

    public function deleteProducto(Request $request)
    {
        $id = $request->id;

        $deleted = Producto::find($id)->delete();

        return response('Producto eliminado', 200)->header('Content-Type', 'text/plain');
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

    public function addPromocion(Request $request)
    {
        $name = $request->promocion;

        $promocion = Promocion::create(['name' => $name]);

        return $promocion;
    }

    public function deletePromocion(Request $request)
    {
        $id = $request->id;

        $deleted = Promocion::find($id)->delete();

        return response('Promocion eliminada', 200)->header('Content-Type', 'text/plain');
    }
}
