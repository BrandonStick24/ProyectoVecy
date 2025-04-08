// Obtener todos los botones de calificación
document.querySelectorAll('.star-btn').forEach(button => {
    button.addEventListener('click', function() {
      const ratingValue = this.getAttribute('data-value');  // Obtener el valor de la estrella seleccionada
  
      // Marcar las estrellas hasta el valor seleccionado
      const stars = this.parentElement.querySelectorAll('.star-btn');
      stars.forEach(star => {
        if (star.getAttribute('data-value') <= ratingValue) {
          star.classList.add('selected');  // Añadir clase 'selected' a las estrellas seleccionadas
        } else {
          star.classList.remove('selected');  // Remover la clase 'selected' a las estrellas no seleccionadas
        }
      });
    });
  });