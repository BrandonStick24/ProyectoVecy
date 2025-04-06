<div class="modal fade" id="modalEditar" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="formEditar" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-header">
                    <h5 class="modal-title">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nom_prod" id="editNombre" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Precio</label>
                        <input type="number" step="0.01" class="form-control" name="pre_prod" id="editPrecio" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipo de Producto</label>
                        <select class="form-select" name="fkid_t_prod" id="editCategoria" required>
                         @foreach($tiposProducto as $tipo) <!-- Usar variable dinámica -->
                            <option value="{{ $tipo->pkid_t_prod }}">{{ $tipo->cat_prod }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea class="form-control" name="desc_prod" id="editDescripcion" rows="3"></textarea>
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" name="est_prod" value="1" id="editEstado"> <!-- Cambiado a est_prod -->
                        <label class="form-check-label">Producto activo</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    $('#modalEditar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var producto = button.data('producto');
        var form = document.getElementById('formEditar');
        
        form.action = `/productos/${producto.id}`;
        document.getElementById('editNombre').value = producto.nombre;
        document.getElementById('editPrecio').value = producto.precio;
        document.getElementById('editCategoria').value = producto.categoria;
        document.getElementById('editDescripcion').value = producto.descripcion;
        
        if(producto.imagen) {
            document.getElementById('editImagenPreview').src = `/storage/${producto.imagen}`;
        }
    });
});
</script>