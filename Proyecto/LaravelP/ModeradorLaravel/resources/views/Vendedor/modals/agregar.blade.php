<div class="modal-body">
    <div class="mb-3">
        <label class="form-label">Nombre</label>
        <input type="text" class="form-control" name="nom_prod" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Precio</label>
        <input type="number" step="0.01" class="form-control" name="pre_prod" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Tipo de Producto</label>
        <select class="form-select" name="fkid_t_prod" required>
            @foreach($tiposProducto as $tipo)
                <option value="{{ $tipo->pkid_t_prod }}">{{ $tipo->nombre_tipo }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label class="form-label">Descripción</label>
        <textarea class="form-control" name="desc_prod" rows="3"></textarea>
    </div>
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="est_prod" value="1" checked>
        <label class="form-check-label">Producto activo</label>
    </div>
</div>