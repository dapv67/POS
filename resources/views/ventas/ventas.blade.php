@extends('layouts.app')

@section('title', 'Ventas')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">VENTAS - Ticket {{ $cantidad }}</h1>
            <div class="data-shop">
                <p class="cajero me-4">{{ Auth::user()->name }}</p>
                <p id="fechaHora" class="hora"></p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#entradas">
                F7 Entradas
            </button>
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#salidas">
                F8 Salidas
            </button>
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                data-bs-target="#verificarPrecioProducto">
                F9 Verificador
            </button>
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#buscarProducto">
                F10 Buscar
            </button>
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" href="#apartado" role="button">
                F11 Sistema de apartado
            </button>
        </div>

        <div class="contenido-interno mb-2">
            <div class="tools-interno mb-2">
                <form id="addProductoVenta" class="d-flex">
                    <input id="cantidad" name="cantidad" class="form-control me-2" type="number" placeholder="Cantidad" value="1"/>
                    <input autofocus id="codigo" name="codigo" class="form-control me-2" type="text" placeholder="Código del producto" aria-label="Search" />
                    <button class="btn btn-success" type="submit">Agregar</button>
                </form>
            </div>

            <table id="myTable" class="display table table-striped" style="width:100%">
                
            </table>
        </div>

        <div class="reports">
            <div class="general">
                <p class="quantity"><b id="cantidadProductos">0</b> productos en la venta actual.</p>
            </div>
             <div class="reports_cliente">
                <label for="exampleFormControlInput1" class="form-label me-2">Cliente</label>
                <select class="form-select" aria-label="Default select example">
                    <option selected>Público en general</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="totals d-flex">
                <button class="btn btn-primary me-2" type="submit" data-bs-toggle="modal" data-bs-target="#cobrar">
                    F12 - Cobrar
                </button>
                <input id="total" name="total" class="form-control form-control-lg" type="text" placeholder="$0.00" value="$0.00" disabled />
            </div>
        </div>
        <!--------------------------------------- Modals ------------------------------------------>
        <!-- Sistema de apartado -->
        <div class="modal fade" id="apartado"  aria-labelledby="entradasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">Sistema de apartado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body botones-apartado">
                      
                        <button data-bs-target="#apartar-venta" data-bs-toggle="modal" class="btn btn-success btn-apartado-opcion">Apartar venta</button>
                        <button data-bs-target="#apartados" data-bs-toggle="modal" class="btn btn-primary btn-apartado-opcion">Apartados</button>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- Apartar venta -->
        <div class="modal fade" id="apartar-venta"  aria-labelledby="apartarVentaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">APARTAR VENTA EN CURSO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="item-abonar-apartado mb-3">
                            <h4 class="me-2">Folio de venta:</h4>
                            <p class="number-apartado">1231</p>
                        </div>
                        <div class="item-abonar-apartado mb-3">
                            <h4 class="me-2">Total:</h4>
                            <p class="number-apartado">$1231</p>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de apartado</label>
                            <input type="date" class="form-control" id="cantidad"  />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha límite de pago</label>
                            <input type="date" class="form-control" id="cantidad"  />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cliente</label>
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Open this select menu</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Monto para apartar (mín 30%)</label>
                            <input type="number" class="form-control" id="cantidad" placeholder="$0.00" />
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">Apartar venta</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Apartartados -->
        <div class="modal fade" id="apartados"  aria-labelledby="apartartadosLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">TABLA DE APARTADOS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="tools-interno mb-2">
                            <div class="d-flex">
                                <div class="me-2">
                                    <input type="search" class="form-control" id="filtroCodigo" placeholder="Buscar por cliente"
                                        aria-label="Search">
                                </div>
                            </div>

                            <div class="filters">

                                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#abonar-apartado">
                                    Abonar
                                </button>
                                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#saldar-apartado">
                                    Saldar deuda completa
                                </button>
                                <button type="button" class="btn btn-success me-2" data-bs-toggle="modal"
                                    data-bs-target="#detalle-abonos-apartado">
                                    Detalle de abonos
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#detalle-mercancia-apartado">
                                    Detalle  de mercancia
                                </button>
                            </div>

                            
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">Folio de apartado</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Cliente</th>
                                <th scope="col">Articulos</th>
                                <th scope="col">Total</th>
                                <th scope="col">Abonado</th>
                                <th scope="col">Debe</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>10/04/2022</td>
                                    <td>Josefina Vázquez</td>
                                    <td>7</td>
                                    <td>$450</td>
                                    <td>$100</td>
                                    <td>$350</td>
                                
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>10/04/2022</td>
                                    <td>Lizzeth Vázquez</td>
                                    <td>7</td>
                                    <td>$450</td>
                                    <td>$100</td>
                                    <td>$350</td>
                                
                                </tr>
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                      
                    </div>
                </div>
            </div>
        </div>
        {{-- Abonar apartado --}}
        <div class="modal fade" id="abonar-apartado"  aria-labelledby="abonarApartadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">ABONAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Folio de apartado:</h4>
                                <p class="number-apartado">1231</p>
                            </div>
                         
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Cliente:</h4>
                                <p class="number-apartado">Josefina Vazquez</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Articulos:</h4>
                                <p class="number-apartado">5</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha de apartado:</h4>
                                <p class="number-apartado">10/04/2022</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha límite de pago:</h4>
                                <p class="number-apartado">12/04/2022</p>
                            </div>
                            <div class="cantidades-abonar-apartado">

                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Total:</h4>
                                    <p class="number-apartado">$500</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Abonado:</h4>
                                    <p class="number-apartado">$300</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Debe:</h4>
                                    <p class="number-apartado">$200</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Fecha</label>
                            <input type="date" class="form-control" id="cantidad" placeholder="$0.00" />
                        </div>
                      
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Monto para abonar</label>
                            <input type="number" class="form-control" id="cantidad" placeholder="$0.00" />
                        </div>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-success">Abonar e imprimir</button>
                        <button type="button" class="btn btn-primary">Abonar sin imprimir</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Saldar apartado -->
        <div class="modal fade" id="saldar-apartado" aria-labelledby="saldarApartadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">SALDAR APARTADO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Esta seguro de saldar apartado con <strong>folio 1234?</strong> </label>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">Confirmar</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Detalle abonos apartado --}}
        <div class="modal fade" id="detalle-abonos-apartado"  aria-labelledby="abonarApartadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">DETALLE DE ABONOS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Folio de apartado:</h4>
                                <p class="number-apartado">4321</p>
                            </div>
                          
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Cliente:</h4>
                                <p class="number-apartado">Josefina Vazquez</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Articulos:</h4>
                                <p class="number-apartado">5</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha de apartado:</h4>
                                <p class="number-apartado">10/04/2022</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha límite de pago:</h4>
                                <p class="number-apartado">12/04/2022</p>
                            </div>
                            <div class="cantidades-abonar-apartado">

                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Total:</h4>
                                    <p class="number-apartado">$500</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Abonado:</h4>
                                    <p class="number-apartado">$300</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Debe:</h4>
                                    <p class="number-apartado">$200</p>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Fecha</th>
                                <th scope="col">Monto abonado</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>10/04/2022</td>
                                    <td>$250</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>10/04/2022</td>
                                    <td>$250</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Detalle de mercancia apartada --}}
        <div class="modal fade" id="detalle-mercancia-apartado"  aria-labelledby="abonarApartadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">DETALLE DE MERCANCIA APARTADA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Folio de apartado:</h4>
                                <p class="number-apartado">1231</p>
                            </div>
                            
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Cliente:</h4>
                                <p class="number-apartado">Josefina Vazquez</p>
                            </div>
                            
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Articulos:</h4>
                                <p class="number-apartado">5</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha de apartado:</h4>
                                <p class="number-apartado">10/04/2022</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Fecha límite de pago:</h4>
                                <p class="number-apartado">12/04/2022</p>
                            </div>
                            <div class="cantidades-abonar-apartado">
                                
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Total:</h4>
                                    <p class="number-apartado">$500</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Abonado:</h4>
                                    <p class="number-apartado">$300</p>
                                </div>
                                <div class="item-abonar-apartado ">
                                    <h4 class="me-2">Debe:</h4>
                                    <p class="number-apartado">$200</p>
                                </div>
                            </div>
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Importe</th>
                               
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>X</td>
                                    <td>2</td>
                                    <td>$200</td>
                                    <td>$750</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>X</td>
                                    <td>2</td>
                                    <td>$200</td>
                                    <td>$750</td>
                                </tr>
                            </tbody>
                        </table>
                        
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Entrada de dinero -->
        <div class="modal fade" id="entradas" tabindex="-1" aria-labelledby="entradasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">ENTRADA DE EFECTIVO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" placeholder="$0.00" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Comentarios</label>
                            <textarea class="form-control" id="comentarios" rows="3" placeholder="Ej. Entrada de dinero, etc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Salida de dinero -->
        <div class="modal fade" id="salidas" tabindex="-1" aria-labelledby="salidasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="salidasLabel">SALIDA DE EFECTIVO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="cantidad" placeholder="$0.00" />
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Razón o Proveedor</label>
                            <textarea class="form-control" id="comentarios" rows="3"
                                placeholder="Ej. Pago de luz, Retiro de medio turno, etc"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Borrar artículo -->
        <div class="modal fade" id="borrarProducto" tabindex="-1" aria-labelledby="borrarProductoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="borrarProductoLabel">CONFIRMAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">¿Borrar producto
                                seleccionado?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">
                            Borrar producto
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Verificar precio -->
        <div class="modal fade" id="verificarPrecioProducto" tabindex="-1" aria-labelledby="verificarPrecioLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verificarPrecioLabel">
                            VERIFICADOR DE PRECIOS
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="verificadorForm" class="form-inline d-flex">
                            <input class="form-control me-2" type="search" placeholder="Código del producto"
                                aria-label="Search" name="codigo" />
                            <button class="btn btn-success" type="submit">
                                ENTER - Verificar producto
                            </button>
                        </form>
                        <div class="details-precio">
                            <p id="nombre-producto" class="mb-4">Pantalón azul Lives 31 X 32</p>
                            <p id="precio-producto">$559.00</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button onclick="addProdcuto()" type="button" class="btn btn-primary">
                            Agregar a venta
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Buscar producto -->
        <div class="modal fade" id="buscarProducto" tabindex="-1" aria-labelledby="buscarProductoLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buscarProductoLabel">
                            BÚSQUEDA DE PRODUCTOS
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="leyenda-busqueda">
                            Teclea las 1eras letras del producto...(O ingrese el simbolo %
                            para buscar en toda la descripción).
                        </p>
                        <form class="form-inline d-flex mb-2">
                            <input class="form-control me-2" type="search" placeholder="Nombre del producto"
                                aria-label="Search" />
                            <button class="btn btn-success" type="submit">
                                ENTER - Buscar producto
                            </button>
                        </form>
                        <div class="table-busqueda-productos">
                            <table class="display table table-striped" style="width:100%">
                                <thead class="header-table">
                                    <tr>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">P. venta</th>
                                        <th scope="col">Depto</th>
                                        <th scope="col">Stock</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pantalón Lives cafe 32 X 31</td>
                                        <td>$599.00</td>
                                        <td>Ropa</td>

                                        <td>7</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">
                            Agregar a venta
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Cobrar -->
        <div class="modal fade" id="cobrar" tabindex="-1" aria-labelledby="cobrarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cobrarLabel">COBRAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="details-precio">
                            <p id="totalCobrar" class="precio-producto">$0</p>
                        </div>
                        <div class="cobro">
                            <div class="d-flex">
                                <div class="form-check me-2">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault1" checked />
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Efectivo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                        id="flexRadioDefault2" />
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Crédito
                                    </label>
                                </div>
                            </div>

                            <label for="exampleFormControlInput1" class="form-label">Pagó con</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">$</span>
                                <input id="monto" type="text" class="form-control"
                                    aria-label="Dollar amount (with dot and two decimal places)" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Su cambio</label>
                                <p id="cambio" class="precio-producto">$0.00</p>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">
                            F1 - Cobrar e imprimir
                        </button>
                        <button type="button" class="btn btn-success">
                            F2 - Cobrar sin imprimir
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        let table, contador = 0, total = 0.00, productoTemp;

        table = $('#myTable').DataTable({
            dom: 'lrt',
            data: {},
            columns: [{
                    title: 'Código',
                    data: 'codigo',
                    width: '10%',
                },
                {
                    title: 'Producto',
                    data: 'descripcion',
                },
                {
                    title: 'Precio',
                    data: 'precioVenta'
                },
                {
                    title: 'Cantidad',
                    data: 'cantidad'
                },
                {
                    title: 'Importe',
                    data: 'importe',
                },
                {
                    title: 'Existencia',
                    data: 'existencia'
                },
                {
                    title: 'Acciones',
                    orderable: false,
                    searchable: false,
                    width: '10%',
                    render: function(data, type, row) {
                        return `<button type="button" onclick="eliminar(this)" class="btn btn-danger">Eliminar</button>`;
                    }
                }
            ],
            scrollY: '50vh',
            scrollCollapse: true,
            paging: false,
        });

        function eliminar(e) {
            const row = table.row($(e).parents('tr'));
            const data = row.data();
            contador -= parseInt(data.cantidad);
            $('#cantidadProductos').html(contador);
            row.remove().draw();
            actualizarTotal();
        }

        function actualizarTotal() {
            const data = table.rows().data();
            total = 0;
            for (let i = 0; i < data.length; i++) {
                total += parseInt(data[i].cantidad) * parseInt(data[i].precioVenta);
            }
            $('#total').val(`$${total}`);
            $('#totalCobrar').html(`$${total}`);
        }

        function addProdcuto() {
            console.log(productoTemp);
            let flag = true;

            var rows = table.rows().indexes();
            var data = table.rows().data();

            for (let i = 0; i < data.length; i++) {
                if (data[i].codigo == productoTemp.codigo) {
                    table.cell(rows[i],3).data(parseInt(data[i].cantidad) + parseInt(productoTemp.cantidad));
                    table.cell(rows[i],4).data(parseInt(data[i].importe) + parseInt(productoTemp.importe));
                    flag = false;
                }
            }

            if(flag){
                table.row.add(productoTemp).draw(false);
            }

            $('#addProductoVenta')[0].reset();

            $( '#codigo' ).focus();

            contador += parseInt(productoTemp.cantidad, 10);

            $('#cantidadProductos').html(contador);

            actualizarTotal();
        }

        $( "#monto" ).blur(function() {
            const monto = $('#monto').val();
            $('#cambio').html(`$${monto-total}`);
        });

        $("#addProductoVenta").submit(function(event) {

            event.preventDefault();

            const data = $(this).serialize();

            $.ajax({

                url: 'addProductoVenta',
                data: data,
                type: 'GET',
                dataType: 'json',

                beforeSend: function() {

                    Swal.fire({
                        title: 'Buscando...',
                        html: 'Espere un momento',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                },

                success: function(json) {

                    Swal.close();

                    let flag = true;
                    
                    var rows = table.rows().indexes();
                    var data = table.rows().data();

                    for (let i = 0; i < data.length; i++) {
                        if (data[i].codigo == json.codigo) {
                            table.cell(rows[i],3).data(parseInt(data[i].cantidad) + parseInt(json.cantidad));
                            table.cell(rows[i],4).data(parseInt(data[i].importe) + parseInt(json.importe));
                            flag = false;
                        }
                    }

                    if(flag){
                        table.row.add(json).draw(false);
                    }

                    $('#addProductoVenta')[0].reset();

                    $( '#codigo' ).focus();

                    contador += parseInt(json.cantidad, 10);

                    $('#cantidadProductos').html(contador);

                    actualizarTotal();
                },

                error: function(err) {

                    console.error(err.responseJSON.message);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se encontró el producto en base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });

                },
            });

        });

        $("#verificadorForm").submit(function(event) {

            event.preventDefault();

            const data = $(this).serialize();

            $.ajax({

                url: 'verificador',
                data: data,
                type: 'GET',
                dataType: 'json',

                beforeSend: function() {

                    Swal.fire({
                        title: 'Buscando...',
                        html: 'Espere un momento',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                },

                success: function(json) {

                    Swal.close();

                    console.log(json);
                    $('#nombre-producto').html(json.descripcion);
                    $('#precio-producto').html(json.precioVenta);

                    productoTemp = json;

                },

                error: function(err) {

                    console.log(err);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se encontró el producto en base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok'
                    });

                },
            });

        });

        setInterval(showTime, 1000);
        function showTime() {

            let time = new Date();

            let date = time.getDate();
            let month = time.getMonth()+1;;
            let year = time.getFullYear();

            let hour = time.getHours();
            let min = time.getMinutes();
            let sec = time.getSeconds();
            am_pm = "AM";
        
            if (hour > 12) {
                hour -= 12;
                am_pm = "PM";
            }
            if (hour == 0) {
                hr = 12;
                am_pm = "AM";
            }
        
            hour = hour < 10 ? "0" + hour : hour;
            min = min < 10 ? "0" + min : min;
            sec = sec < 10 ? "0" + sec : sec;
        
            let currentTime = `${date}/${month}/${year} ${hour}:${min}:${sec} ${am_pm}`;
        
            document.getElementById("fechaHora")
                    .innerHTML = currentTime;
        }
        showTime();
    </script>
@endsection
