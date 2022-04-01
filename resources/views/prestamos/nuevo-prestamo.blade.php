<div class="form-nuevo-producto" id="nuevo-prestamo">
  <h2 class="subtitle-modul mb-2">NUEVO PRÉSTAMO</h2>
  <h4>Folio de préstamo: #001</h4>
  <form>
    <div class="row">
      <div class="mb-3 col">
        <label for="exampleFormControlInput1" class="form-label">Cliente</label>
        <select class="form-select" aria-label="Default select example">
          <option selected>Elige un cliente</option>
          <option value="1">One</option>
          <option value="2">Two</option>
          <option value="3">Three</option>
        </select>
      </div>
      <div class="mb-3 col">

        <label for="exampleFormControlInput1" class="form-label">Cantidad</label>
        <div class="input-group mb-3">
          <span class="input-group-text">$</span>
          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
          <span class="input-group-text">.00</span>
        </div>
      </div>
      <div class="mb-3 col">
        <label for="exampleFormControlInput1" class="form-label"
          >Fecha</label
        >
        <input
          type="date"
          class="form-control"
          id="exampleFormControlInput1"
          placeholder=""
        />
      </div>
    </div>
   
    
    <div class="mb-3">
      <label for="exampleFormControlTextarea1" class="form-label"
        >Notas/Comentarios</label
      >
      <textarea
        class="form-control"
        id="exampleFormControlTextarea1"
        rows="3"
      ></textarea>
    </div>

    <div class="modal-footer d-flex">
      <button type="button" class="btn btn-secondary">Cancelar</button>
      <button type="button" class="btn btn-primary">Guardar</button>
    </div>
  </form>
</div>
