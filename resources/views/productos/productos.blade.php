@extends('layouts.app')

@section('title', 'Productos')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">PRODUCTOS</h1>
            <div class="data-shop">
                <p class="cajero me-4">Le tiende: Lizzeth Pérez</p>
                <p class="hora">01 - Mar 10:25 am</p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="nuevo">
                Nuevo
            </button>
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
                    <form class="form-inline d-flex">
                        <input class="form-control me-2" type="search" placeholder="Código del producto"
                            aria-label="Search" />
                        <button class="btn btn-success" type="submit">Buscar</button>
                    </form>

                    <div class="filters d-flex">
                        <select class="form-select" aria-label="Default select example">
                            <option selected>Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                        <button class="btn btn-warning ms-2" type="submit">Editar</button>
                        <button class="btn btn-danger ms-2" type="submit">Eliminar</button>
                    </div>
                </div>

                <table class="table">
                    <thead class="header-table">
                        <tr>
                            <th scope="col">Código de barras</th>
                            <th scope="col">Descrip. del producto</th>
                            <th scope="col">Depto</th>
                            <th scope="col">Costo</th>
                            <th scope="col">P. Venta</th>
                            <th scope="col">P. Mayoreo</th>
                            <th scope="col">Existencia</th>
                            <th scope="col">Inv. Mínimo</th>
                            <th scope="col">Inv. Máximo</th>
                            <th scope="col">Tipo Venta</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Pantalón Lives azul 32 X 31</td>
                            <td>Ropa</td>
                            <td>$499.00</td>
                            <td>$599.00</td>
                            <td>$559.00</td>
                            <td>20</td>
                            <td>10</td>
                            <td>30</td>
                            <td>UNIDAD</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Pantalón Lives azul 32 X 31</td>
                            <td>Ropa</td>
                            <td>$499.00</td>
                            <td>$599.00</td>
                            <td>$559.00</td>
                            <td>20</td>
                            <td>10</td>
                            <td>30</td>
                            <td>UNIDAD</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div id="categorias" class="row">
                <div class="tools mb-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalAddCategoria">
                        Nuevo
                    </button>
                </div>
                <div class="table-categorias col">
                    <div class="datatable mb-2">
                        <table id="table"></table>
                    </div>
                </div>
                <!-- <div class="form-nuevo-producto col">
                                                                          <form id="addForm">
                                                                            <div class="header-categoria-nueva">
                                                                              <h2 class="subtitle-modul mb-2">NUEVA CATEGORÍA</h2>
                                                                              <button type="submit" class="btn btn-primary">Guardar</button>
                                                                            </div>
                                                                            <div class="row">
                                                                              <div class="mb-3 col">
                                                                                <label for="categoria" class="form-label">Categoría</label>
                                                                                <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria" required />
                                                                              </div>
                                                                            </div>
                                                                          </form>
                                                                        </div> -->
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
                        <table class="table">
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
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddProductoLabel">NUEVO PRODUCTO</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Código de producto</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Descripción</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Categoría</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
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
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Como paquete
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Precio costo</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Ganancia</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Precio venta</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Precio mayoreo</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                        </div>
                        <label for="exampleFormControlInput1" class="form-label">
                            <strong>Inventario</strong>
                        </label>
                        <div class="row mb-3">
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Hay</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Mínimo</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                            <div class="mb-3 col">
                                <label for="exampleFormControlInput1" class="form-label">Máximo</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddCategoriaLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddCategoriaLabel">NUEVA CATEGORÍA</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modalAddPromocion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddPromocionLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAddPromocionLabel">NUEVA PROMOCIÓN</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
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
            });

            $("#btnCategorias").click(function(event) {
                $("#catalogo").hide();
                $("#promociones").hide();
                $("#categorias").show();
            });

            $("#btnPromociones").click(function(event) {
                $("#catalogo").hide();
                $("#categorias").hide();
                $("#promociones").show();
            });

            let table;

            $("#addForm").submit(function(event) {

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

                        table.row.add(json).draw(false);

                        $('#addForm')[0].reset();

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

                        cargarTabla(json);
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

            function eliminar(e) {
                const row = table.row($(e).parents('tr'));
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

            function cargarTabla(data) {

                if (table !== undefined) {
                    table.destroy();
                }

                table = $("#table").DataTable({
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
                                return `<button type="button" onclick="eliminar(this)" class="btn btn-danger">Eliminar</button>`;
                            }
                        }
                    ]
                });


            }

            getCategorias();
            $("#promociones").hide();
            $("#categorias").hide();
            $("#catalogo").show();
        </script>
    </div>
@endsection
