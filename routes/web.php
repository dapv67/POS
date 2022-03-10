<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/ventas', 'VentasController@index')->name('ventas');

Route::get('/productos', 'ProductosController@index')->name('productos');
Route::get('/addProducto', 'ProductosController@add')->name('productos.add');

Route::get('/clientes', 'ClientesController@index')->name('clientes');

Route::get('/corte', 'CorteController@index')->name('corte');

Route::get('/creditos', 'CreditosController@index')->name('creditos');

Route::get('/compras', 'ComprasController@index')->name('compras');

Route::get('/cajeras', 'CajerasController@index')->name('cajeras');

Route::get('/reportes', 'ReportesController@index')->name('reportes');

Route::get('/prestamos', 'PrestamosController@index')->name('prestamos');
