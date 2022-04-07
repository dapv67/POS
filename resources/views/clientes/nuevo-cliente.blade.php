<div class="modal" tabindex="-1" id="modalAddCliente">
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
                            <label for="nombre" class="form-label">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="" />
                        </div>
                        <div class="mb-3 col-3">
                            <label for="correo" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="" />
                        </div>
                        <div class="mb-3 col-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" placeholder="" />
                        </div>
                        <div class="mb-3 col-3">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular" name="celular" placeholder="" />
                        </div>
                        
                        
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="estado" class="form-label">Estado</label>
                            <select name="estado" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione uno</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <label for="municipio" class="form-label">Municipio</label>
                            <select name="municipio" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione uno</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <label for="domicilio" class="form-label">Domicilio</label>
                            <input type="text" class="form-control" id="domicilio" name="domicilio" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="lugar_trabajo" class="form-label">Lugar de trabajo</label>
                            <input type="text" class="form-control" id="lugar_trabajo" name="lugar_trabajo" placeholder="" />
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="col-6 ">
                            <label class="form-label">Foto de identificación oficial</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="img" name="img">
                                <label class="input-group-text" for="img">Subir</label>
                            </div>
                        </div>
                    </div>
                    <strong class="mb-3">
                        <label for="domicilio1" class="form-label">Datos de tercero</label>
                    </strong>
                    <div class="row">
                        <div class="mb-3 col">
                            <label for="nombre_tercero" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre_tercero" name="nombre_tercero" placeholder="" />
                        </div>
                        <div class="mb-3 col">
                            <label for="estado_tercero" class="form-label">Estado</label>
                            <select name="estado_tercero" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione uno</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <label for="municipio_tercero" class="form-label">Municipio</label>
                            <select name="municipio_tercero" class="form-select" aria-label="Default select example">
                                <option selected>Seleccione uno</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <label for="domicilio_tercero" class="form-label">Domicilio</label>
                            <input type="text" class="form-control" id="domicilio_tercero" name="domicilio_tercero" placeholder="" />
                        </div>
                        
                    </div>
                    <div class="row mb-3">
                        <div class="mb-3 col-3">
                            <label for="telefono_tercero" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono_tercero" name="telefono_tercero" placeholder="" />
                        </div>
                        <div class="mb-3 col-3">
                            <label for="celular_tercero" class="form-label">Celular</label>
                            <input type="tel" class="form-control" id="celular_tercero" name="celular_tercero" placeholder="" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <strong>

                            <label for="comentarios" class="form-label">Notas/Comentarios</label>
                        </strong>
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