document.getElementById('guardarCambios').addEventListener('click', function() {
    const nombre = document.getElementById('nombreProducto').value;
    const categoria = document.getElementById('categoriaProducto').value;
    const precio = document.getElementById('precioProducto').value;
    const descripcion = document.getElementById('descripcionProducto').value;

    console.log("Nombre:", nombre);
    console.log("Categoría:", categoria);
    console.log("Precio:", precio);
    console.log("Descripción:", descripcion);

    alert("Cambios guardados localmente (solo en consola para prueba)");
    document.getElementById('formEditarProducto').reset();
    bootstrap.Modal.getInstance(document.getElementById('modalEditar')).hide();
});


