@extends('layouts.app')

@section('title','Ventas')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">VENTAS - Ticket {{ $cantidad }}</h1>
            <div class="data-shop">
                <p class="cajero me-4">Le tiende: {{ Auth::user()->name }}</p>
                <p class="hora">{{ now() }}</p>
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
        </div>

        <div class="contenido-interno mb-2">
            <div class="tools-interno mb-2">
                <form class="form-inline d-flex">
                    <input class="form-control me-2" type="search" placeholder="Código del producto" aria-label="Search" />
                    <button class="btn btn-success" type="submit">Agregar</button>
                </form>

                <div class="filters">
                    <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal"
                        data-bs-target="#borrarProducto">
                        Borrar Art.
                    </button>
                </div>
            </div>

            <table id="myTable" class="table">
                <thead class="header-table">
                    <tr>
                        <th scope="col">Código de barras</th>
                        <th scope="col">Descripción del producto</th>
                        <th scope="col">Precio venta</th>
                        <th scope="col">Cant.</th>
                        <th scope="col">Importe</th>
                        <th scope="col">Existencia</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1234567890</td>
                        <td>Pantalón rojo 32 X 31</td>
                        <td>$1800.00</td>
                        <td>3</td>
                        <td>$2121.00</td>
                        <td>9</td>
                    </tr>
                    <tr>
                        <td>0987654321</td>
                        <td>Pantalón Lives azul 32 X 31</td>
                        <td>$599.00</td>
                        <td>2</td>
                        <td>$1198.00</td>
                        <td>5</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="reports">
            <div class="general">
                <p class="quantity">3 productos en la venta actual.</p>
            </div>
            <div class="totals d-flex">
                <button class="btn btn-primary me-2" type="submit" data-bs-toggle="modal" data-bs-target="#cobrar">
                    F12 - Cobrar
                </button>
                <input class="form-control form-control-lg" type="text" placeholder="$0.00" value="$0.00" disabled />
            </div>
        </div>
        <!-- Modals -->
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
                            <textarea class="form-control" id="comentarios" rows="3"
                                placeholder="Ej. Entrada de dinero, etc"></textarea>
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
                        <form class="form-inline d-flex">
                            <input class="form-control me-2" type="search" placeholder="Código del producto"
                                aria-label="Search" />
                            <button class="btn btn-success" type="submit">
                                ENTER - Verificar producto
                            </button>
                        </form>
                        <div class="details-precio">
                            <p class="nombre-producto mb-4">Pantalón azul Lives 31 X 32</p>
                            <p class="precio-producto">$559.00</p>
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
                            <table class="table">
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
                            <p class="precio-producto">$559.00</p>
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
                                <input type="text" class="form-control"
                                    aria-label="Dollar amount (with dot and two decimal places)" value="559.00" />
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Su cambio</label>
                                <p class="precio-producto">$0.00</p>
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
        $('#myTable').DataTable();
    </script>
@endsection
