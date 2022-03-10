@extends('layouts.app')

@section('title', 'Corte')

@section('content')
    <div class="container">
        <div class="header mb-2">
            <h1 class="title-modul">CORTE DE CAJA</h1>
            <div class="data-shop">
                <p class="cajero me-4">Le tiende: Lizzeth Pérez</p>
                <p class="hora">01 - Mar 10:25 am</p>
            </div>
        </div>

        <div class="tools mb-2">
            <button type="button" class="btn btn-secondary me-2" id="corte-cajero">
                Hacer corte cajero
            </button>
            <button type="button" class="btn btn-secondary me-2" id="corte-dia">
                Hacer corte del día
            </button>
        </div>
        <div class="contenido-interno"></div>

        <!-- Modals -->
        <!-- Corte cajero -->
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
        <!-- Corte del día -->
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

        <script>
            //--------------- Menú ------------------------
            $("#corte-cajero").click(function(event) {
                event.preventDefault();
                $(".contenido-interno").load("./moduls/corte/corte-cajero.html");
            });
            $("#corte-dia").click(function(event) {
                event.preventDefault();
                $(".contenido-interno").load("./moduls/corte/corte-dia.html");
            });

            $(document).ready(function(event) {
                $(".contenido-interno").load("./moduls/corte/corte-cajero.html");
            });
        </script>
    </div>
@endsection
