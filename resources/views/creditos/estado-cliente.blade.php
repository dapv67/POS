<div class="estado-cliente" id="estado-cliente">
  <h1>Estado de cuenta del cliente</h1>
  <div class="encabezado-estado-cliente">

    <h2>Julia Torres</h2>
    <div>
  
      <p>Saldo actual</p>
      <h3>$4500</h3>
    </div>
    <div>
  
      <p>Fecha de corte</p>
      <h3>28/03/2022</h3>
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
  
    
    <table id="" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Fecha</th>
            <th scope="col">Descripcion del producto</th>
            <th scope="col">Precio de venta</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Importe</th>

      
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>15/03/22</td>
                <td>PAntalon azul</td>
                <td>$450.00</td>
                <td>2</td>
                <td>$900.00</td>
            
            
        </tbody>
    </table>
  
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