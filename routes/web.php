<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ventas', 'VentasController@index')->name('ventas');
Route::get('/addProductoVenta', 'VentasController@addProducto')->name('ventas.addProducto');

Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/getProductos', 'ProductosController@getProductos')->name('productos.get');
Route::post('/addProducto', 'ProductosController@addProducto')->name('productos.add');
Route::post('/deleteProducto', 'ProductosController@deleteProducto')->name('productos.delete');

Route::get('/getCategorias', 'ProductosController@getCategorias')->name('categorias.get');
Route::post('/addCategoria', 'ProductosController@addCategoria')->name('categorias.add');
Route::post('/deleteCategoria', 'ProductosController@deleteCategoria')->name('categorias.delete');

Route::get('/getPromociones', 'ProductosController@getPromociones')->name('promociones.get');
Route::post('/addPromocion', 'ProductosController@addPromocion')->name('promociones.add');
Route::post('/deletePromocion', 'ProductosController@deletePromocion')->name('promociones.delete');

Route::get('/categorias', 'ProductosController@categorias')->name('categorias');


Route::get('/clientes', 'ClientesController@index')->name('clientes');
Route::get('/getClientes', 'ClientesController@getClientes')->name('clientes.get');
Route::post('/addCliente', 'ClientesController@addCliente')->name('clientes.add');
Route::post('/deleteCliente', 'ClientesController@deleteCliente')->name('clientes.delete');

Route::get('/cajeras', 'CajerasController@index')->name('cajeras');
Route::get('/getCajeras', 'CajerasController@getCajeras')->name('cajeras.get');
Route::post('/addCajera', 'CajerasController@addCajera')->name('cajeras.add');
Route::post('/deleteCajera', 'CajerasController@deleteCajera')->name('cajeras.delete');

Route::get('/corte', 'CorteController@index')->name('corte');

Route::get('/creditos', 'CreditosController@index')->name('creditos');

Route::get('/compras', 'ComprasController@index')->name('compras');

Route::get('/cajeras', 'CajerasController@index')->name('cajeras');

Route::get('/reportes', 'ReportesController@index')->name('reportes');

Route::get('/prestamos', 'PrestamosController@index')->name('prestamos');
