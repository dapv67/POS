<div class="categorias row">
  <div class="tools mb-2">
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCategoria">
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

<!-- Modals -->
<!-- Entrada de dinero -->
<div class="modal fade" id="modalAddCategoria" tabindex="-1" aria-labelledby="labelAddCategoria" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form id="addForm">
        <div class="modal-header">
          <h5 class="modal-title" id="labelAddCategoria">NUEVA CATEGORÍA</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="mb-3 col">
              <label for="categoria" class="form-label">Categoría</label>
              <input type="text" class="form-control" id="categoria" name="categoria" placeholder="Categoria"
                required />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="reset" class="btn btn-secondary" data-bs-dismiss="modal">
            Cancelar
          </button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>

  $("#addForm").submit(function (event) {

    event.preventDefault();

    const data = $(this).serialize();

    $.ajax({

      url: 'addCategoria',
      data: data,
      type: 'POST',
      dataType: 'json',

      beforeSend: function () {

        Swal.fire({
          title: 'Creando...',
          html: 'Espere un momento',
          didOpen: () => {
            Swal.showLoading()
          }
        });

      },

      success: function (json) {

        Swal.fire({
          title: 'OK!',
          text: 'Categoría creada',
          icon: 'success',
          confirmButtonText: 'ok'
        });

        table.row.add(json).draw(false);

        $('#addForm')[0].reset();
        
      },

      error: function (err) {

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

      beforeSend: function () {

        Swal.fire({
          title: 'Descargando...',
          html: 'Espere un momento',
          didOpen: () => {
            Swal.showLoading()
          }
        });

      },

      success: function (json) {

        Swal.close();

        cargarTabla(json);
      },

      error: function (err) {

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
      data: { id: data.id },
      type: 'POST',

      beforeSend: function () {

        Swal.fire({
          title: 'Eliminando...',
          html: 'Espere un momento',
          didOpen: () => {
            Swal.showLoading()
          }
        });

      },

      success: function (json) {

        Swal.fire({
          title: 'OK!',
          text: 'Categoría eliminada',
          icon: 'success',
          confirmButtonText: 'ok'
        });

        row.remove().draw();

      },

      error: function (err) {

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
      columns: [
        {
          title: 'ID',
          data: 'id'
        },
        {
          title: 'Nombre',
          data: 'name'
        },
        {
          title: 'Acciones',
          render: function (data, type, row) {
            return `<button type="button" onclick="eliminar(this)" class="btn btn-danger">Eliminar</button>`;
          }
        }
      ]
    });


  }

  getCategorias();

</script>