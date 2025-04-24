document.addEventListener('DOMContentLoaded', function() {
    // Configuración común para ambos swipers
    const swiperConfig = {
        slidesPerView: 1, // Mínimo 1 slide
        spaceBetween: 15, // Espacio base entre slides
        freeMode: false, // Desactivamos el modo libre para mejor control
        grabCursor: true,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            // Cuando el ancho es >= 576px
            576: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // Cuando el ancho es >= 768px
            768: {
                slidesPerView: 3,
                spaceBetween: 25
            },
            // Cuando el ancho es >= 992px
            992: {
                slidesPerView: 4,
                spaceBetween: 30
            },
            // Cuando el ancho es >= 1200px
            1200: {
                slidesPerView: 5,
                spaceBetween: 35
            }
        }
    };

    // Inicializar ambos swipers con la misma configuración
    new Swiper('.swiper-disponibles', swiperConfig);
    new Swiper('.swiper-no-disponibles', swiperConfig);
});
