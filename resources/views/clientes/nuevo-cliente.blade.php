<div class="modal fade" id="modalAddCliente" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalAddClienteLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <form id="addCliente">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddClienteLabel">NUEVO CLIENTE</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="domicilio1" class="form-label">Domicilio 1</label>
                            <input type="text" class="form-control" id="domicilio1" name="domicilio1" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="domicilio2" class="form-label">Domicilio 2</label>
                            <input type="text" class="form-control" id="domicilio2" name="domicilio2" placeholder="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="estado" class="form-label">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="municipio" class="form-label">Municipio</label>
                            <input type="text" class="form-control" id="municipio" name="municipio" placeholder="" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="colonia" class="form-label">Colonia</label>
                            <input type="text" class="form-control" id="colonia" name="colonia" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="cp" class="form-label">CP</label>
                            <input type="text" class="form-control" id="cp" name="cp" placeholder="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="comentarios" class="form-label">Notas/Comentarios</label>
                        <textarea class="form-control" id="comentarios" name="comentarios" rows="3"></textarea>
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