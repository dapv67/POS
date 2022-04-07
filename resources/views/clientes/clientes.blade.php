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

        <div class="modal" tabindex="-1" id="modalActualizarCliente">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form id="actualizarCliente">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalActualizarClienteLabel">ACTUALIZAR CLIENTE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="idActualizar" name="idActualizar" hidden />
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombreActualizar" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombreActualizar" name="nombreActualizar"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="correoActualizar" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correoActualizar" name="correoActualizar"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="telefonoActualizar" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefonoActualizar"
                                        name="telefonoActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="celularActualizar" class="form-label">Celular</label>
                                    <input type="tel" class="form-control" id="celularActualizar" name="celularActualizar"
                                        placeholder="" />
                                </div>


                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="estadoActualizar" class="form-label">Estado</label>
                                    <select id="estadoActualizar" name="estadoActualizar" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="municipioActualizar" class="form-label">Municipio</label>
                                    <select id="municipioActualizar" name="municipioActualizar" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="domicilioActualizar" class="form-label">Domicilio</label>
                                    <input type="text" class="form-control" id="domicilioActualizar"
                                        name="domicilioActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="lugar_trabajoActualizar" class="form-label">Lugar de trabajo</label>
                                    <input type="text" class="form-control" id="lugar_trabajoActualizar"
                                        name="lugar_trabajoActualizar" placeholder="" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-6 ">
                                    <label class="form-label">Foto de identificación oficial</label>
                                    <div class="input-group mb-3">
                                        <input type="file" class="form-control" id="imgActualizar" name="imgActualizar">
                                        <label class="input-group-text" for="imgActualizar">Subir</label>
                                    </div>
                                </div>
                            </div>
                            <strong class="mb-3">
                                <label for="domicilio1Actualizar" class="form-label">Datos de tercero</label>
                            </strong>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombre_terceroActualizar" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_terceroActualizar"
                                        name="nombre_terceroActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="estado_terceroActualizar" class="form-label">Estado</label>
                                    <select id="estado_terceroActualizar" name="estado_terceroActualizar"
                                        class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="municipio_terceroActualizar" class="form-label">Municipio</label>
                                    <select id="municipio_terceroActualizar" name="municipio_terceroActualizar"
                                        class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="domicilio_terceroActualizar" class="form-label">Domicilio</label>
                                    <input type="text" class="form-control" id="domicilio_terceroActualizar"
                                        name="domicilio_terceroActualizar" placeholder="" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="mb-3 col-3">
                                    <label for="telefono_terceroActualizar" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono_terceroActualizar"
                                        name="telefono_terceroActualizar" placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="celular_terceroActualizar" class="form-label">Celular</label>
                                    <input type="tel" class="form-control" id="celular_terceroActualizar"
                                        name="celular_terceroActualizar" placeholder="" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <strong>

                                    <label for="comentariosActualizar" class="form-label">Notas/Comentarios</label>
                                </strong>
                                <textarea class="form-control" id="comentariosActualizar" name="comentariosActualizar" rows="3"></textarea>
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

        <div class="modal" tabindex="-1" id="modalDetallesCliente">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <form id="detallesCliente">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalDetallesClienteLabel">DETALLES CLIENTE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-control" id="idDetalles" name="idDetalles" hidden />
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombreDetalles" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombreDetalles" name="nombreDetalles"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="correoDetalles" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correoDetalles" name="correoDetalles"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="telefonoDetalles" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefonoDetalles" name="telefonoDetalles"
                                        placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="celularDetalles" class="form-label">Celular</label>
                                    <input type="tel" class="form-control" id="celularDetalles" name="celularDetalles"
                                        placeholder="" />
                                </div>


                            </div>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="estadoDetalles" class="form-label">Estado</label>
                                    <select id="estadoDetalles" name="estadoDetalles" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="municipioDetalles" class="form-label">Municipio</label>
                                    <select id="municipioDetalles" name="municipioDetalles" class="form-select"
                                        aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="domicilioDetalles" class="form-label">Domicilio</label>
                                    <input type="text" class="form-control" id="domicilioDetalles"
                                        name="domicilioDetalles" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="lugar_trabajoDetalles" class="form-label">Lugar de trabajo</label>
                                    <input type="text" class="form-control" id="lugar_trabajoDetalles"
                                        name="lugar_trabajoDetalles" placeholder="" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="col-6 ">
                                    <label class="form-label">Foto de identificación oficial</label>
                                    <div class="input-group mb-3">
                                        <img id="imgDetalles">
                                    </div>
                                </div>
                            </div>
                            <strong class="mb-3">
                                <label for="domicilio1Detalles" class="form-label">Datos de tercero</label>
                            </strong>
                            <div class="row">
                                <div class="mb-3 col">
                                    <label for="nombre_terceroDetalles" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre_terceroDetalles"
                                        name="nombre_terceroDetalles" placeholder="" />
                                </div>
                                <div class="mb-3 col">
                                    <label for="estado_terceroDetalles" class="form-label">Estado</label>
                                    <select id="estado_terceroDetalles" name="estado_terceroDetalles"
                                        class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="municipio_terceroDetalles" class="form-label">Municipio</label>
                                    <select id="municipio_terceroDetalles" name="municipio_terceroDetalles"
                                        class="form-select" aria-label="Default select example">
                                        <option selected>Seleccione uno</option>
                                        <option value="1">One</option>
                                        <option value="2">Two</option>
                                    </select>
                                </div>
                                <div class="mb-3 col">
                                    <label for="domicilio_terceroDetalles" class="form-label">Domicilio</label>
                                    <input type="text" class="form-control" id="domicilio_terceroDetalles"
                                        name="domicilio_terceroDetalles" placeholder="" />
                                </div>

                            </div>
                            <div class="row mb-3">
                                <div class="mb-3 col-3">
                                    <label for="telefono_terceroDetalles" class="form-label">Teléfono</label>
                                    <input type="tel" class="form-control" id="telefono_terceroDetalles"
                                        name="telefono_terceroDetalles" placeholder="" />
                                </div>
                                <div class="mb-3 col-3">
                                    <label for="celular_terceroDetalles" class="form-label">Celular</label>
                                    <input type="tel" class="form-control" id="celular_terceroDetalles"
                                        name="celular_terceroDetalles" placeholder="" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <strong>

                                    <label for="comentariosDetalles" class="form-label">Notas/Comentarios</label>
                                </strong>
                                <textarea class="form-control" id="comentariosDetalles" name="comentariosDetalles" rows="3"></textarea>
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
            const modalAdd = new bootstrap.Modal(document.getElementById('modalAddCliente'), {
                backdrop: 'static'
            });
            const modalActualizarCliente = new bootstrap.Modal(document.getElementById('modalActualizarCliente'), {
                backdrop: 'static'
            });
            const modalDetallesCliente = new bootstrap.Modal(document.getElementById('modalDetallesCliente'), {
                backdrop: 'static'
            });

            let tableClientes, tableApartados;

            $("#btnCatalogo").click(function(event) {
                $("#apartados").hide();
                $("#catalogo").show();
                getClientes();
            });

            $("#btnApartado").click(function(event) {
                $("#catalogo").hide();
                $("#apartados").show();
                // getApartados();
            });

            $("#addCliente").submit(function(event) {

                event.preventDefault();

                // const data = $(this).serialize();
                var data = new FormData(this);

                $.ajax({

                    url: 'addCliente',
                    data: data,
                    type: 'POST',
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,

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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                        tableClientes.row.add(json).draw(false);

                        $('#addCliente')[0].reset();

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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
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
                            confirmButtonText: 'Ok',
                            confirmButtonColor: '#000',
                        });

                    },
                });

            }

            function detallesCliente(e) {
                row = tableClientes.row($(e).parents('tr'));
                const data = row.data();

                $('#idDetalles').val(data.id);
                $('#nombreDetalles').val(data.nombre);
                $('#telefonoDetalles').val(data.telefono);
                $('#celularDetalles').val(data.celular);
                $('#correoDetalles').val(data.correo);
                $('#domicilioDetalles').val(data.domicilio);
                $('#estadoDetalles').val(data.estado);
                $('#municipioDetalles').val(data.municipio);
                $('#lugar_trabajoDetalles').val(data.lugar_trabajo);
                $('#nombre_terceroDetalles').val(data.nombre_tercero);
                $('#estado_terceroDetalles').val(data.estado_tercero);
                $('#municipio_terceroDetalles').val(data.municipio_tercero);
                $('#domicilio_terceroDetalles').val(data.domicilio_tercero);
                $('#telefono_terceroDetalles').val(data.telefono_tercero);
                $('#celular_terceroDetalles').val(data.celular_tercero);
                $('#comentariosDetalles').val(data.comentarios);


                console.log(data);

                modalDetallesCliente.show();

            }

            function actualizarCliente(e) {
                row = tableClientes.row($(e).parents('tr'));
                const data = row.data();

                // $('#idActualizar').val(data.id);
                // $('#maximoActualizar').val(data.maximo);
                // $('#minimoActualizar').val(data.minimo);
                // $('#precioCompraActualizar').val(data.precio_compra);
                // $('#precioVentaActualizar').val(data.precio_venta);

                $('#idActualizar').val(data.id);
                $('#nombreActualizar').val(data.nombre);
                $('#telefonoActualizar').val(data.telefono);
                $('#celularActualizar').val(data.celular);
                $('#correoActualizar').val(data.correo);
                $('#domicilioActualizar').val(data.domicilio);
                $('#estadoActualizar').val(data.estado);
                $('#municipioActualizar').val(data.municipio);
                $('#lugar_trabajoActualizar').val(data.lugar_trabajo);
                $('#nombre_terceroActualizar').val(data.nombre_tercero);
                $('#estado_terceroActualizar').val(data.estado_tercero);
                $('#municipio_terceroActualizar').val(data.municipio_tercero);
                $('#domicilio_terceroActualizar').val(data.domicilio_tercero);
                $('#telefono_terceroActualizar').val(data.telefono_tercero);
                $('#celular_terceroActualizar').val(data.celular_tercero);
                $('#comentariosActualizar').val(data.comentarios);

                console.log(data);

                modalActualizarCliente.show();

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
                            data: 'nombre',
                        },
                        {
                            title: 'telefono',
                            data: 'telefono',
                        },
                        {
                            title: 'celular',
                            data: 'celular',
                        },
                        {
                            title: 'correo',
                            data: 'correo',
                        },
                        {
                            title: 'domicilio',
                            data: 'domicilio',
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
                            title: 'lugar_trabajo',
                            data: 'lugar_trabajo',
                            visible: false
                        },
                        {
                            title: 'img',
                            data: 'img',
                            visible: false
                        },
                        {
                            title: 'nombre_tercero',
                            data: 'nombre_tercero',
                            visible: false
                        },
                        {
                            title: 'estado_tercero',
                            data: 'estado_tercero',
                            visible: false
                        },
                        {
                            title: 'municipio_tercero',
                            data: 'municipio_tercero',
                            visible: false
                        },
                        {
                            title: 'domicilio_tercero',
                            data: 'domicilio_tercero',
                            visible: false
                        },
                        {
                            title: 'telefono_tercero',
                            data: 'telefono_tercero',
                            visible: false
                        },
                        {
                            title: 'celular_tercero',
                            data: 'celular_tercero',
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
                            width: '20%',
                            render: function(data, type, row) {
                                return `
                                <button onclick="detallesCliente(this)" class="btn btn-success">
                                    <i class="bi-eye" style="font-size: 1rem; color: white;"></i>
                                </button>
                                <button onclick="actualizarCliente(this)" class="btn btn-primary">
                                    <i class="bi-pencil" style="font-size: 1rem; color: white;"></i>
                                </button>
                                <button onclick="eliminarCliente(this)" class="btn btn-danger">
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

            function eliminarCliente(e) {
                const row = tableClientes.row($(e).parents('tr'));
                const data = row.data();

                Swal.fire({
                    icon: 'warning',
                    title: '¿Desea eliminar el cliente?',
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#000',
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({

                            url: 'deleteCliente',
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
                                    text: 'Cliente eliminado',
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
                let month = time.getMonth() + 1;
                let year = time.getFullYear();

                let hour = time.getHours();
                let min = time.getMinutes();
                let sec = time.getSeconds();
                let am_pm = "AM";

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

                document.getElementById("fechaHora").innerHTML = currentTime;
            }
            showTime();
        </script>

    </div>
@endsection
