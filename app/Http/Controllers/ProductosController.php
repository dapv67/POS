<?php

namespace App\Http\Controllers;

use App\Categoria;
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('productos.productos', compact('categorias'));
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
}
