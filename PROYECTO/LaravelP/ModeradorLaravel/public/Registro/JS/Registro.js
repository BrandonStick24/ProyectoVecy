document.addEventListener('DOMContentLoaded', function() {
  const registroForm = document.getElementById('registroForm');
  const registroButton = document.querySelector('#registroForm button[type="submit"]');
  const correoInput = document.querySelector('#registroForm input[type="email"]');
  const nombreInput = document.querySelector('#registroForm input[name="pri_nom"]');
  const apellidoInput = document.querySelector('#registroForm input[name="pri_ape"]');
  let rolSeleccionado = null;

  // --- Validaciones ---
  const validarCorreo = () => {
    const esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correoInput.value);
    correoInput.classList.toggle('is-invalid', !esValido);
    correoInput.setCustomValidity(esValido ? '' : 'Ingresa un correo válido');
  };

  const validarSoloLetras = (input) => {
    const esValido = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/.test(input.value);
    if (!esValido && input.value.trim() !== '') {
      swal("Error", "Solo se permiten letras", "error");
    }
    input.classList.toggle('is-invalid', !esValido);
  };

  // --- Eventos de validación ---
  document.querySelectorAll('#registroForm input:required').forEach(input => {
    input.addEventListener('input', () => {
      if (input === correoInput) validarCorreo();
      if ([nombreInput, apellidoInput].includes(input)) validarSoloLetras(input);
      registroButton.disabled = !Array.from(registroForm.querySelectorAll('[required]')).every(i => i.value.trim() !== '');
    });
  });

  // --- Manejo del envío ---
  registroForm.addEventListener('submit', function(e) {
    e.preventDefault();
    
    if (!rolSeleccionado) {
      // Mostrar modal de selección de rol si no se ha seleccionado
      const modalRol = new bootstrap.Modal(document.getElementById('rolPop'));
      modalRol.show();
    } else {
      // Si ya hay rol seleccionado, enviar el formulario
      enviarFormulario();
    }
  });

  // --- Selección de rol ---
  document.querySelectorAll('#rolPop [data-rol]').forEach(btn => {
    btn.addEventListener('click', function() {
      rolSeleccionado = this.getAttribute('data-rol');
      bootstrap.Modal.getInstance(document.getElementById('rolPop')).hide();
      enviarFormulario();
    });
  });

  // --- Función para enviar el formulario ---
  function enviarFormulario() {
    // Agregar campo oculto con el rol seleccionado
    const inputRolExistente = registroForm.querySelector('input[name="fkid_rol"]');
    if (inputRolExistente) {
      inputRolExistente.value = rolSeleccionado;
    } else {
      const inputRol = document.createElement('input');
      inputRol.type = 'hidden';
      inputRol.name = 'fkid_rol';
      inputRol.value = rolSeleccionado;
      registroForm.appendChild(inputRol);
    }

    // Enviar el formulario
    registroForm.submit();
  }
});