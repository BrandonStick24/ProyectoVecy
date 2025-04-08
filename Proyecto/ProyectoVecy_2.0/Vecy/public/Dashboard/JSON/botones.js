
const abrirNegocioBtn = document.getElementById('abrirNegocio');
const cerrarNegocioBtn = document.getElementById('cerrarNegocio');

abrirNegocioBtn.addEventListener('click', () => {
  swal({
    title: "Negocio Abierto",
    text: "El negocio se ha abierto exitosamente.",
    icon: "success",
    button: "Aceptar"
  });
});

cerrarNegocioBtn.addEventListener('click', () => {
  swal({
    title: "Negocio Cerrado",
    text: "El negocio se ha cerrado exitosamente.",
    icon: "info",
    button: "Aceptar"
  });
});