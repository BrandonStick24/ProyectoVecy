const registroForm = document.getElementById('registroForm');
const registroInputs = document.querySelectorAll('#registroForm input');
const registroButton = document.querySelector('#registroForm button[type="submit"]');
const correoInput = document.querySelector('#registroForm input[type="email"]');
const nombreInput = document.querySelector('#registroForm input[name="nombre"]'); // Asumiendo que el campo tiene name="nombre"
const apellidoInput = document.querySelector('#registroForm input[name="apellido"]'); // Asumiendo que el campo tiene name="apellido"

function verificarCamposLlenos() {
  const todosLlenos = Array.from(registroInputs).every(input => input.value.trim() !== '');
  registroButton.disabled = !todosLlenos;
}

function validarCorreo() {
  const correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(correoInput.value) && correoInput.value.includes('.com');
  if (!correoValido && correoInput.value.trim() !== '') {
    correoInput.classList.add('is-invalid');
    correoInput.setCustomValidity('Por favor ingresa un correo válido que contenga ".com"');
  } else {
    correoInput.classList.remove('is-invalid');
    correoInput.setCustomValidity('');
  }
}

function validarSoloLetras(input) {
  const soloLetras = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]*$/.test(input.value);
  if (!soloLetras && input.value.trim() !== '') {
    input.classList.add('is-invalid');
    input.setCustomValidity('Por favor ingresa solo letras');
    swal("Error", "Este campo solo puede contener letras", "error");
  } else {
    input.classList.remove('is-invalid');
    input.setCustomValidity('');
  }
}

registroInputs.forEach(input => {
  input.addEventListener('input', () => {
    if (input === correoInput) {
      validarCorreo();
    }
    if (input === nombreInput || input === apellidoInput) {
      validarSoloLetras(input);
    }
    verificarCamposLlenos();
  });
});

registroForm.addEventListener('submit', function(event) {
  event.preventDefault();
  validarCorreo();

  if (registroForm.checkValidity()) {
    swal("Usuario Registrado", "Por favor selecciona un rol para continuar", "success")
      .then(() => {
        registroInputs.forEach(input => {
          input.value = '';
        });

        registroButton.disabled = true;

        const modalRegistro = bootstrap.Modal.getInstance(document.getElementById('registroPop'));
        modalRegistro.hide();

        const modalRol = new bootstrap.Modal(document.getElementById('rolPop'));
        modalRol.show();
      });
  } else {
    swal("Error", "Por favor corrige los errores en el formulario", "error");
  }
});

document.getElementById('rolPop').addEventListener('click', function(event) {
  const selectedRole = event.target.closest('a');
  if (selectedRole) {
    event.preventDefault();

    const roleName = selectedRole.querySelector('p').textContent;
    swal(roleName, "Rol seleccionado exitosamente", "success")
      .then(() => {
        window.location.href = selectedRole.href;
      });
  }
});
