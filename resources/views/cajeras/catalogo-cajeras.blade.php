<div id="catalogo" class="row">
    
    <div class="tools-interno mb-2">
        <div class="form-inline d-flex">
            <input id="filtroNombre" class="form-control me-2" type="search" placeholder="Nombre"
                aria-label="Search" />
        </div>

        <div class="filters d-flex">
            <button type="button" onclick="modalAdd.show()" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
            Nuevo
        </button>
        </div>
    </div>

    
    <table id="tableCajeras" class="display table table-striped" style="width:100%"> </table>
    <script>
        // let table;

        // table = $('#tableCajeras').DataTable({
        //     dom: 'lrt',
        //             data: {},
        //             columns: [{
        //                     title: 'ID',
        //                     data: 'codigo',
        //                     width: '10%',
        //                 },
        //                 {
        //                     title: 'Nombre',
        //                     data: 'nombre',
        //                 },
        //                 {
        //                     title: 'Usuario',
        //                     data: 'precioVenta'
        //                 },
        //                 {
        //                     title: 'Acciones',
        //                     orderable: false,
        //                     searchable: false,
        //                     width: '10%',
        //                     render: function(data, type, row) {
        //                         return `<button type="button" onclick="eliminar(this)" class="btn btn-danger">Eliminar</button>;`;
        //                     }
        //                 }
        //             ],
        //             scrollY: '50vh',
        //             scrollCollapse: true,
        //             paging: false,
        // });
    </script>

</div>
