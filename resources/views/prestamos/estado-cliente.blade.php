<div class="estado-cliente" id="estado-cliente">
  <h1>Estado de cuenta del cliente</h1>
  <div class="encabezado-estado-cliente">

    <h2>Julia Torres</h2>
    <div>
  
      <p>Saldo actual</p>
      <h3>$4500</h3>
    </div>
    <div>
  
      <p>Limite de credito</p>
      <h3>$9500</h3>
    </div>
  </div>
  <div class="mb-3 mt-3">
      <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#liquidar">
          Abonar
      </button>
      <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#liquidar">
          Liquidar adeudo
      </button>
      <button type="button" class="btn btn-secondary me-2" data-bs-toggle="modal" data-bs-target="#liquidar">
          Detalle de abonos
      </button>
  </div>
  <div class="tabla-prestamos">
    <div class="mes me-3">
      <h4>Marzo</h4>
      <p> <a href="">10/03/2022</a>  </p>
      <p> <a href="">15/03/2022</a>  </p>
      <p> <a href="">20/03/2022</a>  </p>
    </div>
    <table id="" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Descripcion del producto</th>
            <th scope="col">Precio de venta</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Importe</th>

      
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Mark</td>
                <td>Mark</td>
                <td>Mark</td>
            </tr>
                <tr>
                <th scope="row">2</th>
                <td>Jacob</td>  
                <td>Jacob</td>  
                <td>Jacob</td>  
                <td>Jacob</td>     
            </tr>
            
        </tbody>
    </table>
  </div>
  <!-- Modals -->
        <!-- Liquidar -->
        <div class="modal fade" id="liquidar" tabindex="-1" aria-labelledby="liquidarLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="borrarProductoLabel">CONFIRMAR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Liquidar credito?</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" class="btn btn-primary">
                            Aceptar
                        </button>
                    </div>
                </div>
            </div>
        </div>
  <script>
    // $("#btnLiquidar").click(function(event) {
    //         $("#estado-cuenta").hide();
    //         $("#estado-cliente").show();
    //     });
  </script>
</div>