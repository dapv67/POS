<div id="catalogo" class="row">
    
    <div class="tools-interno mb-2">
        <div class="d-flex">
            <div class="me-2 ">
                <input id="filtroNombre" class="form-control " type="search" placeholder="Nombre" aria-label="Search" />
            </div>
            <div class="">
                <select id="filtroCategoria" class="form-select" aria-label="Default select example">
                    <option value="" selected>Categoría</option>
                    <option value="1">Crédito</option>
                    <option value="2">Préstamos</option>
                    <option value="3">Sistema de apartado</option>
                </select>                       
            </div>
        </div>

        <div class="filters">
            
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
                Nuevo
            </button>
        </div>
    </div>

    <table id="tableClientes" class="display table table-striped" style="width:100%"></table>
</div>
