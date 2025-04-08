document.addEventListener('DOMContentLoaded', function() {
  const registroForm = document.getElementById('registroForm');
  const btnContinuar = document.getElementById('btnContinuarRegistro');
  const inputRolId = document.getElementById('inputRolId');
  let rolSeleccionado = null;

  // Elementos del formulario
  const inputs = {
      pri_nom: document.querySelector('[name="pri_nom"]'),
      seg_nom: document.querySelector('[name="seg_nom"]'),
      pri_ape: document.querySelector('[name="pri_ape"]'),
      seg_ape: document.querySelector('[name="seg_ape"]'),
      correo_elec: document.querySelector('[name="correo_elec"]'),
      password: document.querySelector('[name="password"]'),
      password_confirmation: document.querySelector('[name="password_confirmation"]')
  };

  // --- Validaciones ---
  const validarCampoRequerido = (input) => {
      const esValido = input.value.trim() !== '';
      input.classList.toggle('is-invalid', !esValido);
      return esValido;
  };

  const validarCorreo = () => {
      const esValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(inputs.correo_elec.value);
      inputs.correo_elec.classList.toggle('is-invalid', !esValido);
      return esValido;
  };

  const validarContrasenas = () => {
      const sonIguales = inputs.password.value === inputs.password_confirmation.value;
      const esValida = inputs.password.value.length >= 8;

      inputs.password.classList.toggle('is-invalid', !sonIguales || !esValida);
      inputs.password_confirmation.classList.toggle('is-invalid', !sonIguales);

      return sonIguales && esValida;
  };

  const validarNombres = () => {
      const regex = /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
      let valido = true;

      ['pri_nom', 'seg_nom', 'pri_ape', 'seg_ape'].forEach(campo => {
          if (inputs[campo].value.trim() !== '' && !regex.test(inputs[campo].value)) {
              inputs[campo].classList.add('is-invalid');
              valido = false;
          }
      });

      return valido;
  };

  // --- Evento del botón Continuar ---
  btnContinuar.addEventListener('click', function() {
      // Validar todos los campos
      const camposValidos = [
          validarCampoRequerido(inputs.pri_nom),
          validarCampoRequerido(inputs.pri_ape),
          validarCampoRequerido(inputs.correo_elec),
          validarCampoRequerido(inputs.password),
          validarCampoRequerido(inputs.password_confirmation),
          validarCorreo(),
          validarContrasenas(),
          validarNombres()
      ].every(Boolean);

      if (camposValidos) {
          // Mostrar modal de selección de rol
          const modalRol = new bootstrap.Modal(document.getElementById('rolPop'));
          modalRol.show();
      } else {
          swal("Error", "Por favor complete correctamente todos los campos", "error");
      }
  });

  // --- Selección de rol ---
  document.querySelectorAll('#rolPop [data-rol]').forEach(btn => {
      btn.addEventListener('click', function() {
          rolSeleccionado = this.getAttribute('data-rol');
          inputRolId.value = rolSeleccionado;

          // Cerrar modal de roles
          bootstrap.Modal.getInstance(document.getElementById('rolPop')).hide();

          // Mostrar mensaje según rol seleccionado
          if (rolSeleccionado === '2') {
              swal({
                  title: "¡Registro exitoso!",
                  text: "Serás redirigido al formulario de negocio",
                  icon: "success"
              }).then(() => {
                  registroForm.submit();
              });
          } else {
              swal({
                  title: "¡Registro exitoso!",
                  text: "Serás redirigido al dashboard",
                  icon: "success"
              }).then(() => {
                  registroForm.submit();
              });
          }
      });
  });
});
