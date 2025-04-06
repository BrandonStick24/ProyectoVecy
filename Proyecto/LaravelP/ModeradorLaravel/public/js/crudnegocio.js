// public/js/crudnegocio.js
document.addEventListener('DOMContentLoaded', function() {
    // Modal de edición
    $('#modalEditar').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var producto = button.data('producto'); // Asegúrate de pasar el objeto completo
        var form = document.getElementById('formEditar');
        
        // Actualizar campos (nombres corregidos)
        form.action = `/productos/${producto.pkid_prod}`; // Usar pkid_prod
        $('#editNombre').val(producto.nom_prod); // nom_prod
        $('#editPrecio').val(producto.pre_prod); // pre_prod
        $('#editDescripcion').val(producto.desc_prod); // desc_prod
        $('#editCategoria').val(producto.fkid_t_prod); // fkid_t_prod
        $('#editEstado').prop('checked', producto.est_prod === 1); // est_prod
    });

    // Eliminación con confirmación
    $('.btn-eliminar').click(function(e) {
        e.preventDefault();
        if (confirm('¿Estás seguro de eliminar este producto?')) {
            $(this).closest('form').submit();
        }
    });
});
