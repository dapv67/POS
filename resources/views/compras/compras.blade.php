@extends('layouts.app')

@section('title', 'Compras')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">COMPRAS</h1>
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
                Proveedores
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

        </div>

        <!-- Modals -->
        {{-- Añadir producto --}}
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

        {{-- Añadir categoria --}}
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

        
    </div>
    <script>
            const modalAddProducto = new bootstrap.Modal(document.getElementById('modalAddProducto'), {
                backdrop: 'static'
            });
            const modalAddCategoria = new bootstrap.Modal(document.getElementById('modalAddCategoria'), {
                backdrop: 'static'
            });
            


            let tableProductos, tableCategorias, row;

            $("#btnCatalogo").click(function(event) {
                
                $("#categorias").hide();
                $("#catalogo").show();
                getProductos();
            });

            $("#btnCategorias").click(function(event) {
                $("#catalogo").hide();
               
                $("#categorias").show();
                getCategorias();
            });

            $("#btnPromociones").click(function(event) {
                $("#catalogo").hide();
                $("#categorias").hide();
                
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

            

            getProductos();
            
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
@endsection
