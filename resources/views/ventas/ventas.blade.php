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
            <button onclick="modalAddEntrada.show()" type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                data-bs-target="#entradas">
                F7 Entradas
            </button>
            <button onclick="modalAddSalida.show()" type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                data-bs-target="#salidas">
                F8 Salidas
            </button>
            <button onclick="modalVerificador.show()" type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                data-bs-target="#verificarPrecioProducto">
                F9 Verificador
            </button>
            <button onclick="getProductos()" type="button" class="btn btn-secondary me-2" data-bs-toggle="modal"
                data-bs-target="#buscarProducto">
                F10 Buscar
            </button>
            <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" href="#apartado" role="button">
                F11 Sistema de apartado
            </button>
        </div>

        <div class="contenido-interno mb-2">
            <div class="tools-interno mb-2">
                <form id="addProductoVenta" class="d-flex">
                    <input id="cantidad" name="cantidad" class="form-control me-2" type="number" placeholder="Cantidad"
                        value="1" />
                    <input autofocus id="codigo" name="codigo" class="form-control me-2" type="text"
                        placeholder="Código del producto" aria-label="Search" />
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
                <select class="selectpicker form-control" data-live-search="true">
                    <option selected>Público en general</option>
                    @foreach ($clientes as $cliente)
                        <option data-subtext="{{ $cliente->correo }}">{{ $cliente->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="totals d-flex">
                <button class="btn btn-primary me-2" type="submit" data-bs-toggle="modal" data-bs-target="#cobrar">
                    F12 - Cobrar
                </button>
                <input id="total" name="total" class="form-control form-control-lg" type="text" placeholder="$0.00"
                    value="$0.00" disabled />
            </div>
        </div>
        <!--------------------------------------- Modals ------------------------------------------>
        <!-- Sistema de apartado -->
        <div class="modal fade" id="apartado" aria-labelledby="entradasLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="entradasLabel">Sistema de apartado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body botones-apartado">

                        <button onclick="modalApartarVenta.show()" data-bs-target="#apartar-venta" data-bs-toggle="modal"
                            class="btn btn-success btn-apartado-opcion">Apartar venta</button>
                        <button data-bs-target="#apartados" data-bs-toggle="modal"
                            class="btn btn-primary btn-apartado-opcion">Apartados</button>

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
        <div id="modalApartarVenta" class="modal fade" id="apartar-venta" aria-labelledby="apartarVentaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="apartarVentaForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="entradasLabel">APARTAR VENTA EN CURSO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Folio de venta:</h4>
                                <p id="folioApartar" class="number-apartado">1231</p>
                            </div>
                            <div class="item-abonar-apartado mb-3">
                                <h4 class="me-2">Total:</h4>
                                <p id="totalApartar" class="number-apartado"></p>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Fecha de apartado</label>
                                <input type="date" class="form-control" id="fechaApartado" name="fechaApartado" required />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Fecha límite de pago</label>
                                <input type="date" class="form-control" id="fechaApartadoLimite" name="fechaApartadoLimite" disabled required />
                            </div>
                            <div class="mb-3">
                                <label for="clienteApartarVenta" class="form-label">Cliente</label>
                                <select id="clienteApartarVenta" name="clienteApartarVenta" class="selectpicker form-control" data-live-search="true"
                                    required>
                                    <option selected disabled value="">Seleccionar un cliente...</option>
                                    @foreach ($clientes as $cliente)
                                        <option data-subtext="{{ $cliente->correo }}">{{ $cliente->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Monto para apartar (mín
                                    30%)</label>
                                <input id="montoApartar" name="montoApartar" type="number" class="form-control" id="cantidad"
                                    placeholder="$0.00" required />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">Apartar venta</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Apartartados -->
        <div class="modal fade" id="apartados" aria-labelledby="apartartadosLabel" aria-hidden="true">
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
                                    <input type="search" class="form-control" id="filtroCodigo"
                                        placeholder="Buscar por cliente" aria-label="Search">
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
                                    Detalle de mercancia
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
        <div class="modal fade" id="abonar-apartado" aria-labelledby="abonarApartadoLabel" aria-hidden="true">
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
                            <label for="exampleFormControlInput1" class="form-label">Esta seguro de saldar apartado con
                                <strong>folio 1234?</strong> </label>
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
        <div class="modal fade" id="detalle-abonos-apartado" aria-labelledby="abonarApartadoLabel" aria-hidden="true">
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
        <div class="modal fade" id="detalle-mercancia-apartado" aria-labelledby="abonarApartadoLabel"
            aria-hidden="true">
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
        <div id="modalAddEntrada" class="modal fade" id="entradas" tabindex="-1" aria-labelledby="entradasLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="addEntradaForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="entradasLabel">ENTRADA DE EFECTIVO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="cantidadEntrada" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidadEntrada" name="cantidadEntrada"
                                    placeholder="$0.00" />
                            </div>
                            <div class="mb-3">
                                <label for="comentariosEntrada" class="form-label">Comentarios</label>
                                <textarea class="form-control" id="comentariosEntrada" name="comentariosEntrada" rows="3"
                                    placeholder="Ej. Entrada de dinero, etc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Salida de dinero -->
        <div id="modalAddSalida" class="modal fade" id="salidas" tabindex="-1" aria-labelledby="salidasLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="addSalidaForm">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="salidasLabel">SALIDA DE EFECTIVO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="cantidadSalida" class="form-label">Cantidad</label>
                                <input type="number" class="form-control" id="cantidadSalida" name="cantidadSalida"
                                    placeholder="$0.00" />
                            </div>
                            <div class="mb-3">
                                <label for="comentariosSalida" class="form-label">Razón o Proveedor</label>
                                <textarea class="form-control" id="comentariosSalida" name="comentariosSalida" rows="3"
                                    placeholder="Ej. Pago de luz, Retiro de medio turno, etc"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
                                Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
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
        <div id="modalVerificador" class="modal fade" id="verificarPrecioProducto" tabindex="-1"
            aria-labelledby="verificarPrecioLabel" aria-hidden="true">
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
                            <p id="nombre-producto" class="mb-4"></p>
                            <p id="precio-producto"></p>
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
        <div id="modalBuscador" class="modal fade" id="buscarProducto" tabindex="-1"
            aria-labelledby="buscarProductoLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="buscarProductoLabel">
                            BÚSQUEDA DE PRODUCTOS
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input id="filtroNombreProducto" class="form-control me-2" type="search"
                            placeholder="Nombre del producto" aria-label="Search" />
                        <div class="table-busqueda-productos">
                            <table id="tableProductos" class="display table table-striped" style="width:100%"></table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button onclick="addProductoBuscador()" type="button" class="btn btn-primary">
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
        $('select').selectpicker({
            showSubtext: true
        });

        const modalAddEntrada = new bootstrap.Modal(document.getElementById('modalAddEntrada'), {
            backdrop: 'static'
        });
        const modalAddSalida = new bootstrap.Modal(document.getElementById('modalAddSalida'), {
            backdrop: 'static'
        });
        const modalVerificador = new bootstrap.Modal(document.getElementById('modalVerificador'), {
            backdrop: 'static'
        });
        const modalBuscador = new bootstrap.Modal(document.getElementById('modalBuscador'), {
            backdrop: 'static'
        });
        const modalApartarVenta = new bootstrap.Modal(document.getElementById('modalApartarVenta'), {
            backdrop: 'static'
        });

        let table, tableProductos, contador = 0,
            total = 0.00,
            productoTemp,
            fechaApartadoLimite;

        table = $('#myTable').DataTable({
            dom: 'lrt',
            data: {},
            columns: [{
                    searchable: false,
                    orderable: false,
                    title: '#',
                    width: '5%',
                    data: () => 0
                },
                {
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
            order: [1, 'asc'],
            scrollY: '50vh',
            scrollCollapse: true,
            paging: false,
        });

        table.on('order.dt search.dt', function() {
            table.column(0, {
                search: 'applied',
                order: 'applied'
            }).nodes().each(function(cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw();

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
            let montoApartar = Math.ceil(total * 0.3);
            $('#total').val(`$${total}`);
            $('#totalCobrar').html(`$${total}`);
            $('#totalApartar').html(`$${total}`);
            $('#montoApartar').val(montoApartar);
            $("#montoApartar").attr({
                "max": total,
                "min": montoApartar
            });
        }

        function addProductoBuscador() {
            productoTemp = tableProductos.row('.selected').data();

            productoTemp.cantidad = 1;
            productoTemp.precioVenta = productoTemp.precio_venta;
            productoTemp.importe = productoTemp.precio_venta;

            let flag = true;

            var rows = table.rows().indexes();
            var data = table.rows().data();

            for (let i = 0; i < data.length; i++) {
                if (data[i].codigo == productoTemp.codigo) {
                    table.cell(rows[i], 4).data(parseInt(data[i].cantidad) + parseInt(productoTemp.cantidad));
                    table.cell(rows[i], 5).data(parseInt(data[i].importe) + parseInt(productoTemp.importe));
                    flag = false;
                    break;
                }
            }

            if (flag) {
                table.row.add(productoTemp).draw(false);
            }

            $('#addProductoVenta')[0].reset();

            $('#codigo').focus();

            contador += parseInt(productoTemp.cantidad, 10);

            $('#cantidadProductos').html(contador);

            actualizarTotal();

            productoTemp = null;
            modalBuscador.hide();

        }

        function addProdcuto() {
            if (productoTemp) {
                let flag = true;

                var rows = table.rows().indexes();
                var data = table.rows().data();

                for (let i = 0; i < data.length; i++) {
                    if (data[i].codigo == productoTemp.codigo) {
                        table.cell(rows[i], 4).data(parseInt(data[i].cantidad) + parseInt(productoTemp.cantidad));
                        table.cell(rows[i], 5).data(parseInt(data[i].importe) + parseInt(productoTemp.importe));
                        flag = false;
                    }
                }

                if (flag) {
                    table.row.add(productoTemp).draw(false);
                }

                $('#addProductoVenta')[0].reset();

                $('#codigo').focus();

                contador += parseInt(productoTemp.cantidad, 10);

                $('#cantidadProductos').html(contador);

                actualizarTotal();

                $('#nombre-producto').html('');
                $('#precio-producto').html('');
                productoTemp = null;
                $('#verificadorForm')[0].reset();
                modalVerificador.hide();
            } else {
                Swal.fire({
                    title: 'Error!',
                    text: 'No se encontró el producto en base de datos',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                    confirmButtonColor: '#000'
                });
            }
        }

        function getProductos() {
            modalBuscador.show();

            if (tableProductos !== undefined) {
                tableProductos.destroy();
                $.fn.dataTable.ext.search.pop();
                $("#tableProductos tbody").prop("onclick", null).off("click");
            }

            $.fn.dataTable.ext.search.push(
                function(settings, data, dataIndex) {
                    var filtroNombreProducto = $('#filtroNombreProducto').val();
                    var nombre = data[2];
                    if (
                        (filtroNombreProducto === '') ||
                        (nombre.toLowerCase().includes(filtroNombreProducto))
                    ) {
                        return true;
                    }
                    return false;
                }
            );

            tableProductos = $("#tableProductos").DataTable({
                dom: 'lrt',
                ajax: {
                    url: 'getProductos',
                    type: 'GET',
                    dataType: 'json',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Descargando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    complete: function(json) {

                        Swal.close();

                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de descargar de base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                    },
                },
                columns: [{
                        searchable: false,
                        orderable: false,
                        title: '#',
                        width: '5%',
                        data: () => 0
                    },
                    {
                        title: 'Código',
                        data: 'codigo'
                    },
                    {
                        title: 'Descripción',
                        data: 'descripcion'
                    },
                    {
                        title: 'Depto',
                        data: 'categoria'
                    },
                    {
                        title: 'P. venta',
                        data: 'precio_venta',
                        render: function(data, type, row) {
                            return `$${parseFloat(data).toFixed(2)}`;
                        }
                    },
                    {
                        title: 'Stock',
                        data: 'existencia'
                    }
                ],
                order: [2, 'asc'],
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
            });

            tableProductos.on('order.dt search.dt', function() {
                tableProductos.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

            $('#tableProductos tbody').on('click', 'tr', function() {
                if ($(this).hasClass('selected')) {
                    $(this).removeClass('selected');
                } else {
                    tableProductos.$('tr.selected').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        }

        $("#monto").blur(function() {
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
                            table.cell(rows[i], 3).data(parseInt(data[i].cantidad) + parseInt(json
                                .cantidad));
                            table.cell(rows[i], 4).data(parseInt(data[i].importe) + parseInt(json
                                .importe));
                            flag = false;
                        }
                    }

                    if (flag) {
                        table.row.add(json).draw(false);
                    }

                    $('#addProductoVenta')[0].reset();

                    $('#codigo').focus();

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
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
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

                    $('#nombre-producto').html(json.descripcion);
                    $('#precio-producto').html(`$${json.precioVenta.toFixed(2)}`);

                    productoTemp = json;

                },

                error: function(err) {

                    console.log(err);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se encontró el producto en base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    });

                },
            });

        });

        $("#apartarVentaForm").submit(function(event) {

            event.preventDefault();

            // const data = $(this).serialize();
            let data = new FormData(this);
            data.append('fechaApartadoLimite',fechaApartadoLimite);

            $.ajax({

                url: 'apartarVenta',
                data: data,
                type: 'POST',
                dataType: 'json',
                cache: false,
                contentType: false,
                processData: false,

                beforeSend: function() {

                    Swal.fire({
                        title: 'Asignando...',
                        html: 'Espere un momento',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                },

                success: function(json) {
                    Swal.fire({
                        title: 'Excelente!',
                        text: 'El apartado se registró en la base de datos',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    }).then(() => {
                        $('#apartarVentaForm')[0].reset();
                        modalApartarVenta.hide();
                    });
                },

                error: function(err) {

                    console.log(err);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se pudo agregar el apartado en la base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    });

                },
            });

        });

        $("#addEntradaForm").submit(function(event) {

            event.preventDefault();

            const data = $(this).serialize();

            $.ajax({

                url: 'addEntrada',
                data: data,
                type: 'POST',
                dataType: 'json',

                beforeSend: function() {

                    Swal.fire({
                        title: 'Asignando...',
                        html: 'Espere un momento',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                },

                success: function(json) {
                    Swal.fire({
                        title: 'Excelente!',
                        text: 'La entrada se registró en la base de datos',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    }).then(() => {
                        $('#addEntradaForm')[0].reset();
                        modalAddEntrada.hide();
                    });
                },

                error: function(err) {

                    console.log(err);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se pudo agregar la entrada en la base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    });

                },
            });

        });

        $("#addSalidaForm").submit(function(event) {

            event.preventDefault();

            const data = $(this).serialize();

            $.ajax({

                url: 'addSalida',
                data: data,
                type: 'POST',
                dataType: 'json',

                beforeSend: function() {

                    Swal.fire({
                        title: 'Asignando...',
                        html: 'Espere un momento',
                        didOpen: () => {
                            Swal.showLoading()
                        }
                    });

                },

                success: function(json) {
                    Swal.fire({
                        title: 'Excelente!',
                        text: 'La salida se registró en la base de datos',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    }).then(() => {
                        $('#addSalidaForm')[0].reset();
                        modalAddSalida.hide();
                    });
                },

                error: function(err) {

                    console.log(err);

                    Swal.fire({
                        title: 'Error!',
                        text: 'No se pudo agregar la salida en la base de datos',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000'
                    });

                },
            });

        });

        $('#filtroNombreProducto').on('input', function() {
            tableProductos.draw();
        });

        $('#fechaApartado').on('change', function() {
            let temp = $('#fechaApartado').val();
            fechaApartadoLimite = new Date(temp.split('-')[0], temp.split('-')[1] - 1, temp.split('-')[2]);
            fechaApartadoLimite.setDate(fechaApartadoLimite.getDate() + 28);
            fechaApartadoLimite = fechaApartadoLimite.toISOString().split('T')[0];
            $('#fechaApartadoLimite').val(fechaApartadoLimite);
        });

        setInterval(showTime, 1000);

        function showTime() {

            let time = new Date();

            let date = time.getDate();
            let month = time.getMonth() + 1;;
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
