<div class="modal-body">
    <p>¿Estás seguro de eliminar este producto?</p>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
    <form method="POST" action="{{ route('productos.destroy', $producto->pkid_prod) }}">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
</div>