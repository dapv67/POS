<div id="catalogo" class="row">
    <div class="tools mb-2">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAddCliente">
            Nuevo
        </button>
    </div>
    <div class="tools-interno mb-2">
        <div class="form-inline d-flex">
            <input id="filtroNombre" class="form-control me-2" type="search" placeholder="Nombre"
                aria-label="Search" />
        </div>

        <div class="filters d-flex">
            {{-- <select id="filtroCategoria" class="form-select" aria-label="Default select example">
                <option value="" selected>Categoría</option>
                @foreach ($categorias as $categoria)
                    <option value="{{ $categoria->name }}">{{ $categoria->name }}</option>
                @endforeach
            </select> --}}
            <select id="filtroCategoria" class="form-select" aria-label="Default select example">
                <option value="" selected>Categoría</option>
                <option value="1">Crédito</option>
                <option value="2">Préstamos</option>
                <option value="3">Sistema de apartado</option>
            </select>
        </div>
    </div>

    <table id="tableClientes" class="display table table-striped" style="width:100%"></table>
</div>
