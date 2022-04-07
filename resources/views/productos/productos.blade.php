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

                <div class="tools-interno mb-2">
                    <div class="d-flex">
                        <div class="me-2">
                            <input type="search" class="form-control" id="filtroCodigo" placeholder="Código del producto"
                                aria-label="Search">
                        </div>
                        <div class="">
                            <select id="filtroCategoria" class="form-select" aria-label="Default select example">
                                <option value="" selected>Categoría</option>
                                @foreach ($categorias as $categoria)
                                    <option value="{{ $categoria->name }}">{{ $categoria->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="filters">

                        <button type="button" class="btn btn-success" data-bs-toggle="modal"
                            data-bs-target="#modalAddProducto">
                            Nuevo
                        </button>
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
        <div class="modal" tabindex="-1" id="modalAddProducto">
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
                                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                                        @endforeach
                                    </select>
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

        <div class="modal" tabindex="-1" id="modalAddCategoria">
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

        <div class="modal" tabindex="-1" id="modalAddPromocion">
            <div class="modal-dialog modal-lg modal-dialog-centered">
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
                                    <label for="cantidad1" class="form-label">Fecha inicio</label>
                                    <input type="date" class="form-control" id="cantidad1" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="cantidad2" class="form-label">Fecha fin</label>
                                    <input type="date" class="form-control" id="cantidad2" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="cantidad3" class="form-label">% Descuento</label>
                                    <input type="number" class="form-control" id="cantidad3" placeholder="" />
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

        <div class="modal" tabindex="-1" id="modalActualizarProducto">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form id="actualizarProducto">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalActualizarProductoLabel">ACTUALIZAR PRODUCTO</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="idActualizar"
                                        name="idActualizar" hidden/>
                            <div class="row mb-3">
                                <div class="mb-3 col">
                                    <label for="precioCompraActualizar" class="form-label">Precio compra</label>
                                    <input type="text" class="form-control" id="precioCompraActualizar"
                                        name="precioCompraActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="gananciaActualizar" class="form-label">Ganancia</label>
                                    <input type="text" class="form-control" id="gananciaActualizar"
                                        name="gananciaActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="precioVentaActualizar" class="form-label">Precio venta</label>
                                    <input type="text" class="form-control" id="precioVentaActualizar"
                                        name="precioVentaActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="precioMayoreoActualizar" class="form-label">Precio mayoreo</label>
                                    <input type="text" class="form-control" id="precioMayoreoActualizar"
                                        name="precioMayoreoActualizar" placeholder="" />
                                </div>
                            </div>
                            <label for="exampleFormControlInput1" class="form-label">
                                <strong>Inventario</strong>
                            </label>
                            <div class="row mb-3">
                                <div class="mb-3 col">
                                    <label for="minimoActualizar" class="form-label">Mínimo</label>
                                    <input type="text" class="form-control" id="minimoActualizar" name="minimoActualizar"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="maximoActualizar" class="form-label">Máximo</label>
                                    <input type="text" class="form-control" id="maximoActualizar" name="maximoActualizar"
                                        placeholder="" />
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
            const modalAddProducto = new bootstrap.Modal(document.getElementById('modalAddProducto'), {
                backdrop: 'static'
            });
            const modalAddCategoria = new bootstrap.Modal(document.getElementById('modalAddCategoria'), {
                backdrop: 'static'
            });
            const modalAddPromocion = new bootstrap.Modal(document.getElementById('modalAddPromocion'), {
                backdrop: 'static'
            });
            const modalActualizarProducto = new bootstrap.Modal(document.getElementById('modalActualizarProducto'), {
                backdrop: 'static'
            });


            let tableProductos, tableCategorias, tablePromociones, row;

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
                // getPromociones();
            });

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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                        tableProductos.row.add(json).draw(false);

                        $('#addProducto')[0].reset();

                        modalAddProducto.hide();
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                        tableCategorias.row.add(json).draw(false);

                        $('#addCategoria')[0].reset();

                        modalAddCategoria.hide();
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                        tablePromociones.row.add(json).draw(false);

                        $('#addPromocion')[0].reset();

                        modalAddPromocion.hide();
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de crear en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                    },
                });

            });

            $("#actualizarProducto").submit(function(event) {

                event.preventDefault();

                const data = $(this).serialize();

                $.ajax({

                    url: 'actualizarProducto',
                    data: data,
                    type: 'POST',
                    dataType: 'json',

                    beforeSend: function() {

                        Swal.fire({
                            title: 'Actualizando...',
                            html: 'Espere un momento',
                            didOpen: () => {
                                Swal.showLoading()
                            }
                        });

                    },

                    success: function(json) {

                        Swal.fire({
                            title: 'OK!',
                            text: 'Producto actualizado',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                        row.data(json);

                        modalActualizarProducto.hide();
                    },

                    error: function(err) {

                        console.error(err.responseJSON.message);

                        Swal.fire({
                            title: 'Error!',
                            text: 'Ocurrio un error al momento de actualizar en base de datos',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                    },
                });

            }

            function actualizarProducto(e) {
                row = tableProductos.row($(e).parents('tr'));
                const data = row.data();

                $('#idActualizar').val(data.id);
                $('#maximoActualizar').val(data.maximo);
                $('#minimoActualizar').val(data.minimo);
                $('#precioCompraActualizar').val(data.precio_compra);
                $('#precioVentaActualizar').val(data.precio_venta);

                console.log(data);

                modalActualizarProducto.show();

            }

            function eliminarProducto(e) {
                row = tableProductos.row($(e).parents('tr'));
                const data = row.data();

                Swal.fire({
                    icon: 'warning',
                    title: '¿Desea eliminar el producto?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#000',
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({

                            url: 'deleteProducto',
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
                                    text: 'Producto eliminado',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                                row.remove().draw();

                            },

                            error: function(err) {

                                console.error(err.responseJSON.message);

                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Ocurrio un error al momento de eliminar en base de datos',
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                            },
                        });
                    }
                });

            }

            function eliminarCategoria(e) {
                row = tableCategorias.row($(e).parents('tr'));
                const data = row.data();

                Swal.fire({
                    icon: 'warning',
                    title: '¿Desea eliminar la categoría?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#000',
                }).then((result) => {
                    if (result.isConfirmed) {

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
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                                row.remove().draw();

                            },

                            error: function(err) {

                                console.error(err.responseJSON.message);

                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Ocurrio un error al momento de eliminar en base de datos',
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                            },
                        });
                    }
                });

            }

            function eliminarPromocion(e) {
                row = tablePromociones.row($(e).parents('tr'));
                const data = row.data();

                Swal.fire({
                    icon: 'warning',
                    title: '¿Desea eliminar la promoción?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#000',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({

                            url: 'deletePromocion',
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
                                    text: 'Promoción eliminada',
                                    icon: 'success',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                                row.remove().draw();

                            },

                            error: function(err) {

                                console.error(err.responseJSON.message);

                                Swal.fire({
                                    title: 'Error!',
                                    text: 'Ocurrio un error al momento de eliminar en base de datos',
                                    icon: 'error',
                                    confirmButtonText: 'Ok',
                                    confirmButtonColor: '#000',
                                });

                            },
                        });
                    }
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
                            (categoria.toLowerCase().includes(filtroCategoria) && codigo.toLowerCase().includes(
                                filtroCodigo))
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
                            visible: false
                        },
                        {
                            title: 'id_categoria',
                            data: 'id_categoria',
                            visible: false
                        },
                        {
                            title: 'Código',
                            data: 'codigo'
                        },
                        {
                            title: 'Descripcion',
                            data: 'descripcion'
                        },
                        {
                            title: 'Categoria',
                            data: 'categoria'
                        },
                        {
                            title: 'precio_compra',
                            data: 'precio_compra',
                            visible: false
                        },
                        {
                            title: 'Precio',
                            data: 'precio_venta',
                            render: function(data, type, row) {
                                return `$${parseFloat(data).toFixed(2)}`;
                            }
                        },
                        {
                            title: 'Existencia',
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
                            width: '15%',
                            render: function(data, type, row) {
                                return `
                                <button onclick="actualizarProducto(this)" class="btn btn-primary">
                                    <i class="bi-pencil" style="font-size: 1rem; color: white;"></i>
                                </button>
                                <button onclick="eliminarProducto(this)" class="btn btn-danger">
                                    <i class="bi-trash" style="font-size: 1rem; color: white;"></i>
                                </button>
                                `;
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
                            visible: false
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
