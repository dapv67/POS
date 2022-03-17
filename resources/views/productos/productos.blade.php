@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">PRODUCTOS</h1>
            <div class="data-shop">
                <p class="cajero me-4">{{ Auth::user()->name }}</p>
                <p id="fechaHora" class="hora"></p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="btnCatalogo">
                Catálogo
            </button>
            <button type="button" class="btn btn-secondary me-2" id="btnCategorias">
                Categorias
            </button>
            <button type="button" class="btn btn-secondary me-2" id="btnPromociones">
                Promociones
            </button>
        </div>
        <div class="contenido-interno">

            <div id="catalogo" class="row">
                <div class="tools mb-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddProducto">
                        Nuevo
                    </button>
                </div>
                <div class="tools-interno mb-2">
                    <div class="form-inline d-flex">
                        <input id="filtroCodigo" class="form-control me-2" type="search" placeholder="Código del producto"
                            aria-label="Search" />
                    </div>

                    <div class="filters d-flex">
                        <select id="filtroCategoria" class="form-select" aria-label="Default select example">
                            <option value="" selected>Categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->name }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <table id="tableProductos" class="display table table-striped" style="width:100%"></table>
            </div>

            <div id="categorias" class="row">
                <div class="col">
                    <div class="tools">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalAddCategoria">
                            Nuevo
                        </button>
                    </div>
                    <div class="">
                        <table id="tableCategorias" class="display table table-striped" style="width:100%"></table>
                    </div>
                </div>
            </div>

            <div id="promociones" class="row">
                <div class="tools mb-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalAddPromocion">
                        Nuevo
                    </button>
                </div>
                <div class="table-promociones">
                    <h3 class="subtitle-modul mb-2">PROMOCIONES VIGENTES</h3>
                    <div class="tools-interno mb-2">
                        <form class="form-inline d-flex">
                            <input class="form-control me-2" type="search" placeholder="Promoción" aria-label="Search" />
                            <button class="btn btn-success" type="submit">Buscar</button>
                        </form>

                        <div class="filters">
                            <button class="btn btn-warning" type="submit">Modificar</button>
                            <button class="btn btn-danger" type="submit">Eliminar</button>
                        </div>
                    </div>
                    <div class="datatable mb-2">
                        <table id="tablePromociones" class="display table table-striped" style="width:100%">
                            <thead class="header-table">
                                <tr>
                                    <th scope="col">Nombre de la promoción</th>
                                    <th scope="col">Cód. producto/Categoría</th>
                                    <th scope="col">Desde</th>
                                    <th scope="col">Hasta</th>
                                    <th scope="col">Precio promoción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Verano</td>
                                    <td>Pantalón azul 32 X 32</td>
                                    <td>5</td>
                                    <td>10</td>
                                    <td>$150.00</td>
                                </tr>
                                <tr>
                                    <td>Invierno-verano</td>
                                    <td>Ropa deportiva</td>
                                    <td>5</td>
                                    <td>10</td>
                                    <td>$150.00</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <!-- Modals -->
        <div class="modal fade" id="modalAddProducto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddProductoLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form id="addProducto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddProductoLabel">NUEVO PRODUCTO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="codigo" class="form-label">Código de producto</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" id="descripcion" name="descripcion"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <select id="categoria" name="categoria" class="form-select"
                                        aria-label="Default select example">
                                        <option value="" selected>Seleccionar...</option>
                                        @foreach ($categorias as $categoria)
                                            <option value="{{ $categoria->name }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="exampleFormControlInput1" class="form-label"><strong>Se vende
                                        por:</strong></label>
                                <div class="d-flex">
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1" checked />
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Unidad/Pieza
                                        </label>
                                    </div>
                                    <div class="form-check me-2">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" />
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            A granel
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault3" />
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Como paquete
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="mb-3 col">
                                    <label for="precioCompra" class="form-label">Precio compra</label>
                                    <input type="text" class="form-control" id="precioCompra" name="precioCompra"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="ganancia" class="form-label">Ganancia</label>
                                    <input type="text" class="form-control" id="ganancia" name="ganancia"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="precioVenta" class="form-label">Precio venta</label>
                                    <input type="text" class="form-control" id="precioVenta" name="precioVenta"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="precioMayoreo" class="form-label">Precio mayoreo</label>
                                    <input type="text" class="form-control" id="precioMayoreo" name="precioMayoreo"
                                        placeholder="" />
                                </div>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">
                                <strong>Inventario</strong>
                            </label>
                            <div class="row mb-3">
                                <div class="mb-3 col">
                                    <label for="existencia" class="form-label">Hay</label>
                                    <input type="text" class="form-control" id="existencia" name="existencia"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="minimo" class="form-label">Mínimo</label>
                                    <input type="text" class="form-control" id="minimo" name="minimo" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="maximo" class="form-label">Máximo</label>
                                    <input type="text" class="form-control" id="maximo" name="maximo" placeholder="" />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddCategoriaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <form id="addCategoria">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddCategoriaLabel">NUEVA CATEGORÍA</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="categoria" class="form-label">Categoría</label>
                                    <input type="text" class="form-control" id="categoria" name="categoria"
                                        placeholder="Categoria" required />
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddPromocion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddPromocionLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form id="addPromocion">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalAddPromocionLabel">NUEVA PROMOCIÓN</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombre-promocion" class="form-label">Nombre de la
                                        promoción</label>
                                    <input type="text" class="form-control" id="nombre-promocion" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="form-label">Agregar por:</label>
                                    <div class="d-flex">
                                        <div class="form-check me-2">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault1" checked />
                                            <label class="form-check-label" for="flexRadioDefault1">
                                                Código de barras
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                id="flexRadioDefault2" />
                                            <label class="form-check-label" for="flexRadioDefault2">
                                                Categoría
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="codigo" class="form-label">Código de
                                        barras</label>
                                    <input type="text" class="form-control" id="codigo" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="fw-lighter">Pantalón azul 32 X
                                        32</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="cantidad1" class="form-label">Cuando la cantidad vaya
                                        desde</label>
                                    <input type="number" class="form-control" id="cantidad1" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="cantidad2" class="form-label">Hasta</label>
                                    <input type="number" class="form-control" id="cantidad2" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="cantidad3" class="form-label">Precio unitario</label>
                                    <input type="number" class="form-control" id="cantidad3" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="" class="fw-lighter">Precio normal:
                                        $130.00</label>
                                    <label for="" class="fw-lighter">Precio costo:
                                        $120.00</label>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>



        <script>
            //--------------- Menú ------------------------
            // $("#nuevo").click(function(event) {
            //     event.preventDefault();
            //     $(".contenido-interno").load("{{ asset('html/nuevo-producto.html') }}");
            // });

            // $("#categorias").click(function(event) {
            //     event.preventDefault();
            //     $(".contenido-interno").load("{{ asset('html/categorias.html') }}");
            // });
            // $("#promociones").click(function(event) {
            //     event.preventDefault();
            //     $(".contenido-interno").load("{{ asset('html/promociones.html') }}");
            // });
            // $("#catalogo").click(function(event) {
            //     event.preventDefault();
            //     $(".contenido-interno").load(
            //         "{{ asset('html/catalogo-productos.blade.php') }}"
            //     );
            // });

            // $(document).ready(function(event) {
            //     $(".contenido-interno").load(
            //         "{{ asset('html/catalogo-productos.blade.php') }}"
            //     );
            // });

            $("#btnCatalogo").click(function(event) {
                $("#promociones").hide();
                $("#categorias").hide();
                $("#catalogo").show();
                getProductos();
            });

            $("#btnCategorias").click(function(event) {
                $("#catalogo").hide();
                $("#promociones").hide();
                $("#categorias").show();
                getCategorias();
            });

            $("#btnPromociones").click(function(event) {
                $("#catalogo").hide();
                $("#categorias").hide();
                $("#promociones").show();
                getPromociones();
            });

            let tableProductos, tableCategorias, tablePromociones;

            $("#addProducto").submit(function(event) {

                event.preventDefault();

                const data = $(this).serialize();

                $.ajax({

                    url: 'addProducto',
                    data: data,
                    type: 'POST',
                    dataType: 'json',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Creando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    success: function(json) {

                        Swal.fire({
                            title: 'OK!',
                            text: 'Producto creado',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                        tableProductos.row.add(json).draw(false);

                        $('#addProducto')[0].reset();

                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            });

            $("#addCategoria").submit(function(event) {

                event.preventDefault();

                const data = $(this).serialize();

                $.ajax({

                    url: 'addCategoria',
                    data: data,
                    type: 'POST',
                    dataType: 'json',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Creando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    success: function(json) {

                        Swal.fire({
                            title: 'OK!',
                            text: 'Categoría creada',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                        tableCategorias.row.add(json).draw(false);

                        $('#addCategoria')[0].reset();

                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            });

            $("#addPromocion").submit(function(event) {

                event.preventDefault();

                const data = $(this).serialize();

                $.ajax({

                    url: 'addPromocion',
                    data: data,
                    type: 'POST',
                    dataType: 'json',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Creando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    success: function(json) {

                        Swal.fire({
                            title: 'OK!',
                            text: 'Promoción creada',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                        tablePromociones.row.add(json).draw(false);

                        $('#addPromocion')[0].reset();

                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            });

            function getProductos() {

                $.ajax({

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

                    success: function(json) {

                        Swal.close();

                        cargarTablaProductos(json);
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de descargar de base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            }

            function getCategorias() {

                $.ajax({

                    url: 'getCategorias',
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

                    success: function(json) {

                        Swal.close();

                        cargarTablaCategorias(json);
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de descargar de base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            }

            function getPromociones() {

                $.ajax({

                    url: 'getPromociones',
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

                    success: function(json) {

                        Swal.close();

                        cargarTablaPromociones(json);
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de descargar de base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            }

            function eliminarCategoria(e) {
                const row = tableCategorias.row($(e).parents('tr'));
                const data = row.data();

                $.ajax({

                    url: 'deleteCategoria',
                    data: {
                        id: data.id
                    },
                    type: 'POST',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Eliminando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    success: function(json) {

                        Swal.fire({
                            title: 'OK!',
                            text: 'Categoría eliminada',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                        row.remove().draw();

                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok'
                        });

                    },
                });

            }

            function cargarTablaProductos(data) {

                if (tableProductos !== undefined) {
                    tableProductos.destroy();
                }

                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var filtroCodigo = $('#filtroCodigo').val();
                        var filtroCategoria = $('#filtroCategoria').val();
                        var codigo = data[2];
                        var categoria = data[4];
                        console.log(codigo, categoria);
                        console.log(filtroCodigo, filtroCategoria);

                        if (
                            (filtroCategoria === '' && filtroCodigo === '') ||
                            (filtroCategoria === '' && codigo.toLowerCase().includes(filtroCodigo)) ||
                            (categoria.toLowerCase().includes(filtroCategoria) && filtroCodigo === '') ||
                            (categoria.toLowerCase().includes(filtroCategoria) && codigo.toLowerCase().includes(filtroCodigo))
                        )


                        {
                            return true;
                        }
                        return false;
                    }
                );

                tableProductos = $("#tableProductos").DataTable({
                    dom: 'lrt',
                    data: data,
                    columns: [{
                            title: 'ID',
                            data: 'id',
                            width: '5%',
                        },
                        {
                            title: 'id_categoria',
                            data: 'id_categoria',
                            visible: false
                        },
                        {
                            title: 'codigo',
                            data: 'codigo'
                        },
                        {
                            title: 'descripcion',
                            data: 'descripcion'
                        },
                        {
                            title: 'categoria',
                            data: 'categoria'
                        },
                        {
                            title: 'precio_compra',
                            data: 'precio_compra',
                            visible: false
                        },
                        {
                            title: 'precio_venta',
                            data: 'precio_venta'
                        },
                        {
                            title: 'existencia',
                            data: 'existencia'
                        },
                        {
                            title: 'unidad',
                            data: 'unidad',
                            visible: false
                        },
                        {
                            title: 'minimo',
                            data: 'minimo',
                            visible: false
                        },
                        {
                            title: 'maximo',
                            data: 'maximo',
                            visible: false
                        },
                        {
                            title: 'Acciones',
                            orderable: false,
                            searchable: false,
                            width: '10%',
                            render: function(data, type, row) {
                                return `<button type="button" onclick="eliminarProducto(this)" class="btn btn-danger">Eliminar</button>`;
                            }
                        }
                    ],
                    scrollY: '50vh',
                    scrollCollapse: true,
                    paging: false,
                });

            }

            function cargarTablaCategorias(data) {

                if (tableCategorias !== undefined) {
                    tableCategorias.destroy();
                }
                $.fn.dataTable.ext.search.pop();
                tableCategorias = $("#tableCategorias").DataTable({
                    data: data,
                    columns: [{
                            title: 'ID',
                            data: 'id',
                            width: '5%',
                        },
                        {
                            title: 'Nombre',
                            data: 'name'
                        },
                        {
                            title: 'Acciones',
                            orderable: false,
                            searchable: false,
                            width: '10%',
                            render: function(data, type, row) {
                                return `<button type="button" onclick="eliminarCategoria(this)" class="btn btn-danger">Eliminar</button>`;
                            }
                        }
                    ],
                    scrollY: '50vh',
                    scrollCollapse: true,
                    paging: false
                });


            }

            function cargarTablaPromociones(data) {

                if (tablePromociones !== undefined) {
                    tablePromociones.destroy();
                }

                tablePromociones = $("#tablePromociones").DataTable({
                    data: data,
                    columns: [{
                            title: 'ID',
                            data: 'id'
                        },
                        {
                            title: 'Nombre',
                            data: 'name'
                        },
                        {
                            title: 'Acciones',
                            render: function(data, type, row) {
                                return `<button type="button" onclick="eliminarPromocion(this)" class="btn btn-danger">Eliminar</button>`;
                            }
                        }
                    ],
                    scrollY: '50vh',
                    scrollCollapse: true,
                    paging: false
                });


            }

            getProductos();
            $("#promociones").hide();
            $("#categorias").hide();
            $("#catalogo").show();

            $('#filtroCodigo').on('input', function() {
                tableProductos.draw();
            });

            $('#filtroCategoria').change(function() {
                tableProductos.draw();
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
    </div>
@endsection
