@extends('layouts.app')

@section('title', 'Cajeras')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">CAJERAS</h1>
            <div class="data-shop">
                <p class="cajero me-4">{{ Auth::user()->name }}</p>
                <p id="fechaHora" class="hora"></p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="btnCatalogo">
                Cajeras
            </button>
        </div>
        <div class="contenido-interno">

            @include('cajeras.catalogo-cajeras')

        </div>
        @include('cajeras.nueva-cajera')
    </div>

    <script>
        const modalAdd = new bootstrap.Modal(document.getElementById('modalAddCajera'), {
            backdrop: 'static'
        });
        let tableCajeras;

        $("#addCajera").submit(function(event) {

            event.preventDefault();

            const data = $(this).serialize();

            $.ajax({

                url: 'addCajera',
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
                        text: 'Cajera creada',
                        icon: 'success',
                        confirmButtonText: 'Ok',
                        confirmButtonColor: '#000',
                    });

                    tableCajeras.row.add(json).draw(false);

                    $('#addCajera')[0].reset();

                    modalAdd.hide();

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

        function cargarTablaCajeras(data) {

            if (tableCajeras !== undefined) {
                tableCajeras.destroy();
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

            tableCajeras = $("#tableCajeras").DataTable({
                dom: 'lrt',
                ajax: {
                    url: 'getCajeras',
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
                columns: [
                    {
                        searchable: false,
                        orderable: false,
                        title: '#',
                        width: '5%',
                        data: () => 0
                    },
                    {
                        title: 'Nombre',
                        data: 'name'
                    },
                    {
                        title: 'Usuario',
                        data: 'username'
                    },
                    {
                        title: 'Acciones',
                        orderable: false,
                        searchable: false,
                        width: '10%',
                        render: function(data, type, row) {
                            return `<button type="button" onclick="eliminarCajera(this)" class="btn btn-danger">Eliminar</button>`;
                        }
                    }
                ],
                order: [1,'asc'],
                scrollY: '50vh',
                scrollCollapse: true,
                paging: false,
            });

            tableCajeras.on('order.dt search.dt', function() {
                tableCajeras.column(0, {
                    search: 'applied',
                    order: 'applied'
                }).nodes().each(function(cell, i) {
                    cell.innerHTML = i + 1;
                });
            }).draw();

        }

        function eliminarCajera(e) {
            const row = tableCajeras.row($(e).parents('tr'));
            const data = row.data();

            Swal.fire({
                icon: 'warning',
                title: '¿Desea eliminar la cajera?',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#d33',
                cancelButtonColor: '#000',
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({

                        url: 'deleteCajera',
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
                                text: 'Cajera eliminada',
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

        cargarTablaCajeras();

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
