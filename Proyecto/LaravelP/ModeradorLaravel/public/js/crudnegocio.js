document.addEventListener('DOMContentLoaded', function() {
    // Configuración para el modal de edición
    $('#modalEditar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var productoId = button.data('id');
        
        // Cargar datos del producto via AJAX
        fetch(`/productos/${productoId}/edit`)
            .then(response => response.json())
            .then(data => {
                $('#editNombre').val(data.nombre);
                $('#editPrecio').val(data.precio);
                $('#editCategoria').val(data.categoria);
                $('#editDescripcion').val(data.descripcion);
                if(data.imagen) {
                    $('#editImagenPreview').attr('src', `/storage/${data.imagen}`).show();
                }
                $('#formEditar').attr('action', `/productos/${productoId}`);
            });
    });

    // Eliminar con confirmación
    $('.btn-eliminar').click(function(e) {
        e.preventDefault();
        if(confirm('¿Estás seguro de eliminar este producto?')) {
            $(this).closest('form').submit();
        }
    });
});