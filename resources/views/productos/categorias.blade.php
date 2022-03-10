<div class="categorias row">
  <div class="table-categorias col">
    <div class="tools-interno mb-2">
      <form class="form-inline d-flex">
        <input
          class="form-control me-2"
          type="search"
          placeholder="Código del producto"
          aria-label="Search"
        />
        <button class="btn btn-success" type="submit">Buscar</button>
      </form>

      <div class="filters">
        <button class="btn btn-danger" type="submit">Eliminar</button>
      </div>
    </div>
    <div class="datatable mb-2">
      <table class="table">
        <thead class="header-table">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoría</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Ropa</td>
          </tr>
          <tr>
            <td>2</td>
            <td>Deportiva</td>
          </tr>
          <tr>
            <td>3</td>
            <td>Primavera</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="form-nuevo-producto col">
    <div class="header-categoria-nueva">
      <h2 class="subtitle-modul mb-2">NUEVA CATEGORÍA</h2>
      <button type="button" class="btn btn-primary">Guardar</button>
    </div>

    <form>
      <div class="row">
        <div class="mb-3 col">
          <label for="exampleFormControlInput1" class="form-label"
            >Categoría</label
          >
          <input
            type="text"
            class="form-control"
            id="categoria"
            placeholder=""
          />
        </div>
      </div>
    </form>
  </div>
</div>
