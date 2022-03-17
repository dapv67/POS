@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">CLIENTES</h1>
            <div class="data-shop">
                <p class="cajero me-4">{{ Auth::user()->name }}</p>
                <p id="fechaHora" class="hora"></p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="btnCatalogo">
                Clientes
            </button>
            <button type="button" class="btn btn-secondary me-2" id="btnApartado">
                Apartado
            </button>
        </div>
        <div class="contenido-interno">

            @include('clientes.catalogo-clientes')

        </div>

        <!-- Modals -->

        <!-- Borrar cliente -->
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

        @include('clientes.nuevo-cliente')

        <script>

            let tableClientes, tableApartados;

            $("#btnCatalogo").click(function(event) {
                $("#apartados").hide();
                $("#catalogo").show();
                getClientes();
            });

            $("#btnApartado").click(function(event) {
                $("#catalogo").hide();
                $("#apartados").show();
                getApartados();
            });

            $("#addCliente").submit(function(event) {

                event.preventDefault();

                const data = $(this).serialize();

                $.ajax({

                    url: 'addCliente',
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
                            text: 'Cliente creado',
                            icon: 'success',
                            confirmButtonText: 'ok'
                        });

                        tableClientes.row.add(json).draw(false);

                        $('#addCliente')[0].reset();

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

            function getClientes() {

                $.ajax({

                    url: 'getClientes',
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

                        cargarTablaClientes(json);
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

            function getApartados() {

                $.ajax({

                    url: 'getApartados',
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

                        cargarTablaApartados(json);
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

            function cargarTablaClientes(data) {

                if (tableClientes !== undefined) {
                    tableClientes.destroy();
                }

                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var filtroNombre = $('#filtroNombre').val();
                        // var filtroCategoria = $('#filtroCategoria').val();
                        var nombre = data[1];
                        // var categoria = data[4];
                        if (
                            // (filtroCategoria === '' && filtroNombre === '') ||
                            // (filtroCategoria === '' && nombre.includes(filtroNombre)) ||
                            // (categoria.includes(filtroCategoria) && filtroNombre === '') ||
                            // (categoria.includes(filtroCategoria) && nombre.includes(filtroNombre))

                            (filtroNombre === '') ||
                            (nombre.toLowerCase().includes(filtroNombre))
                        )


                        {
                            return true;
                        }
                        return false;
                    }
                );

                tableClientes = $("#tableClientes").DataTable({
                    dom: 'lrt',
                    data: data,
                    columns: [{
                            title: 'ID',
                            data: 'id',
                            width: '5%',
                        },
                        {
                            title: 'nombre',
                            data: 'nombre'
                        },
                        {
                            title: 'apellidos',
                            data: 'apellidos'
                        },
                        {
                            title: 'celular',
                            data: 'celular'
                        },
                        {
                            title: 'telefono',
                            data: 'telefono'
                        },
                        {
                            title: 'correo',
                            data: 'correo'
                        },
                        {
                            title: 'domicilio1',
                            data: 'domicilio1',
                            visible: false
                        },
                        {
                            title: 'domicilio2',
                            data: 'domicilio2',
                            visible: false
                        },
                        {
                            title: 'estado',
                            data: 'estado',
                            visible: false
                        },
                        {
                            title: 'municipio',
                            data: 'municipio',
                            visible: false
                        },
                        {
                            title: 'colonia',
                            data: 'colonia',
                            visible: false
                        },
                        {
                            title: 'cp',
                            data: 'cp',
                            visible: false
                        },
                        {
                            title: 'comentarios',
                            data: 'comentarios',
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

            function cargarTablaApartados(data) {

                if (tableApartados !== undefined) {
                    tableApartados.destroy();
                }
                $.fn.dataTable.ext.search.pop();
                tableApartados = $("#tableApartados").DataTable({
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

            $('#filtroNombre').on('input', function() {
                tableClientes.draw();
            });

            getClientes();
            $("#apartados").hide();
            $("#catalogo").show();

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
