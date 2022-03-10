@extends('layouts.app')

@section('title', 'Creditos')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">CRÉDITOS</h1>
            <div class="data-shop">
                <p class="cajero me-4">Le tiende: Lizzeth Pérez</p>
                <p class="hora">01 - Mar 10:25 am</p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="estado-cuenta">
                Estado de cuenta
            </button>
            <button type="button" class="btn btn-secondary me-2" id="nuevo-cliente">
                Nuevo cliente
            </button>
            <button type="button" class="btn btn-secondary me-2" id="editar-credito">
                Modificar
            </button>
            <button type="button" class="btn btn-secondary me-2" id="eliminar-cliente">
                Eliminar
            </button>
        </div>
        <div class="contenido-interno"></div>

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

        <script>
            //--------------- Menú ------------------------
            $("#nuevo-credito").click(function(event) {
                event.preventDefault();
                $(".contenido-interno").load("./moduls/creditos/nuevo-credito.html");
            });
            $("#catalogo-clientes").click(function(event) {
                event.preventDefault();
                $(".contenido-interno").load(
                    "./moduls/clientes/catalogo-clientes.html"
                );
            });

            $(document).ready(function(event) {
                $(".contenido-interno").load(
                    "./moduls/creditos/catalogo-creditos.html"
                );
            });
        </script>
    </div>
@endsection
