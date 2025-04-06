document.addEventListener("DOMContentLoaded", function () {
    const botonesInfo = document.querySelectorAll(".botonAccion");

    botonesInfo.forEach(boton => {
      boton.addEventListener("click", function () {
        // Obtener datos desde los atributos data-*
        const nit = this.dataset.nit;
        const nombre = this.dataset.nombre;
        const propietario = this.dataset.propietario;
        const descripcion = this.dataset.descripcion;
        const estado = this.dataset.estado;

        // Pasar los datos al modal
        document.getElementById("modalNIT").textContent = nit;
        document.getElementById("modalNombre").textContent = nombre;
        document.getElementById("modalPropietario").textContent = propietario;
        document.getElementById("modalDescripcion").textContent = descripcion;
        document.getElementById("modalEstado").textContent = estado;

        // Mostrar el modal
        new bootstrap.Modal(document.getElementById("modalInfoNegocio")).show();
      });
    });
  });
