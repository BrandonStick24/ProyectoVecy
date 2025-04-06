const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const errorMessage = document.getElementById('error-message');

loginForm.addEventListener('submit', function(event) {
  event.preventDefault();

  if (emailInput.value === '' || passwordInput.value === '') {
    errorMessage.style.display = 'block';
    errorMessage.textContent = 'Por favor ingresa tu correo y contraseña';
    return;
  }

  // Usuarios con rutas hacia las vistas Blade
  const usuariosFijos = [
    { correo: 'moderador@correo.com', password: '123456', redireccion: '/moderador/inicio' },
    { correo: 'prueba1@correo.com', password: '123456', redireccion: '/vendedor/dashboard' },
    { correo: 'cliente1@correo.com', password: '123456', redireccion: '/cliente/dashboard' }
  ];

  const usuario = usuariosFijos.find(usuario =>
    usuario.correo === emailInput.value && usuario.password === passwordInput.value
  );

  if (usuario) {
    window.location.href = usuario.redireccion; // Redirige a la ruta de Laravel
  } else {
    errorMessage.style.display = 'block';
    errorMessage.textContent = 'Correo o contraseña incorrectos';
  }
});
