<div class="modal fade" id="modalAgregar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('vendedor.productos.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Agregar Nuevo Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Campo oculto para el negocio -->
                    <input type="hidden" name="fknit_neg" value="{{ auth()->user()->negocio_id }}">

                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" name="nom_prod" required>
                    </div>

                    <!-- Campo Precio -->
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="pre_prod" required>
                    </div>

                    <!-- Selector de Tipo de Producto -->
                    <div class="mb-3">
                        <label class="form-label">Tipo de Producto</label>
                        <select class="form-select" name="fkid_t_prod" required>
                            @foreach($tiposProducto as $tipo)
                                <option value="{{ $tipo->pkid_t_prod }}">{{ $tipo->nombre_tipo }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Campo Descripción -->
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="desc_prod" rows="3"></textarea>
                    </div>

                    <!-- Checkbox Estado -->
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="est_prod" value="1" checked>
                        <label class="form-check-label">Producto activo</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Producto</button>
                </div>
            </form>
        </div>
    </div>
</div>