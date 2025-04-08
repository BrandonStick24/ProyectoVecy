document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('barraBusqueda');
    const botonBuscar = document.getElementById('botonBuscar');
    const filas = document.querySelectorAll('#tablaNegocios tbody tr');

    function realizarBusqueda() {
      const filtro = input.value.toLowerCase();

      filas.forEach(function (fila) {
        const texto = fila.textContent.toLowerCase();
        fila.style.display = texto.includes(filtro) ? '' : 'none';
      });
    }

    botonBuscar.addEventListener('click', realizarBusqueda);

    // Nueva funcionalidad: presionar Enter también ejecuta la búsqueda
    input.addEventListener('keyup', function (event) {
      if (event.key === 'Enter') {
        realizarBusqueda();
      }
    });
  });
