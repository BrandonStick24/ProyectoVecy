@extends('layouts.app')

@section('content')
<!--CSS-->
<style>

/*  Contenedor principal */
main {
  background: #55AD9B;
  width: 80%;
  display: flex;
  flex-direction: column;
  height: auto;
  margin: auto;
  margin-top: 60px;
  border-top-left-radius: 35px;
  border-top-right-radius: 35px;
  box-shadow: rgba(0, 0, 0, 0.19) 0px 10px 20px, rgba(0, 0, 0, 0.23) 0px 6px 6px;
  padding: 20px;
  gap: 30px;
}

.seccion-negocios {
  width: 80%;
  margin: auto;
}

.titulo-seccion {
  color: white;
  margin-bottom: 20px;
  font-size: 1.2rem;
  text-align: left;
  padding-left: 35px;
}

footer {
  display: flex;
  justify-content: center;
  align-items: center;
  background: #f7f7f7;
  height: 30px;
  margin: 0;
  bottom: 0;
  width: 100%;
  padding: 10px 20px;
}

/* Responsive */
@media (max-width: 1024px) {
  .header, main {
      width: 90%;
  }
}

@media (max-width: 768px) {
  .header {
      flex-direction: column;
      padding: 15px;
  }

  .logo {
      margin-bottom: 10px;
  }

  .acciones {
      justify-content: center;
      width: 100%;
  }

  .buscador {
      max-width: 100%;
      padding-right: 0;
      margin-bottom: 10px;
  }

  main {
      width: 95%;
      margin-top: 30px;
      padding: 15px;
  }
}

@media (max-width: 480px) {
  .logo span {
      font-size: 1.2rem;
  }

  .header > div > span {
      font-size: 1.1rem;
  }

  .button-header {
      padding: 5px 10px;
      font-size: 0.9rem;
  }
}

</style>
 <main class="main2">
    <!-- Negocios Disponibles -->
    <section class="seccion-negocios">
        <h2 class="titulo-seccion">Negocios Disponibles</h2>
        <div class="swiper negocios-swiper swiper-disponibles">
            <div class="swiper-wrapper">
                <!-- Negocio 1 -->
                <div class="swiper-slide">
                    <div class="card-negocio">
                        <div class="imagen-negocio">
                            <img src="{{ asset('IMG/producto1.jpg') }}" alt="Carnicería Don Julio">
                            <div class="disponible-negocio">Disponible</div>
                        </div>
                        <div class="info-negocio">
                            <h2 class="nombre-negocio">Carnicería Don Julio</h2>
                            <a href="#" class="boton-negocio">Saber más</a>
                        </div>
                    </div>
                </div>
                <!-- Más negocios... -->
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>

    <!-- Negocios No Disponibles -->
    <section class="seccion-negocios">
        <h2 class="titulo-seccion">Negocios No Disponibles</h2>
        <div class="swiper negocios-swiper swiper-no-disponibles">
            <div class="swiper-wrapper">
                <!-- Negocio no disponible -->
                <div class="swiper-slide">
                    <div class="card-negocio no-disponible">
                        <div class="imagen-negocio">
                            <img src="{{ asset('IMG/producto 3.jpg') }}" alt="Delicias Doña Claudia">
                            <div class="disponible-negocio">No Disponible</div>
                        </div>
                        <div class="info-negocio">
                            <h2 class="nombre-negocio">Delicias Doña Claudia</h2>
                            <a href="#" class="boton-negocio">Saber más</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </section>
</main>
@endsection
<!--JS-->
<script>
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
</script>
