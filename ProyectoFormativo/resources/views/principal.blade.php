@extends('layouts.app')

@section('content')
<!--CSS-->
<style>

/* Contenedor principal */
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

/* Estilos generales de la card */
.card-negocio {
    width: 220px;
    border: 1px solid #e0e0e0;
    border-radius: 25px;
    overflow: hidden;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    margin: 0 auto;
    height: 100%;
    transition: transform 0.3s;
    background: white;
    padding: 5px;
}

.card-negocio:hover {
    transform: translateY(-5px);
}

/* Estilos para la imagen del negocio */
.imagen-negocio {
    position: relative;
    height: 180px;
    overflow: hidden;
}

.imagen-negocio img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s;
    border-radius: 12%;
}

.card-negocio:hover .imagen-negocio img {
    transform: scale(1.05);
}

/* Estilos para el indicador de disponibilidad */
.disponible-negocio {
    position: absolute;
    bottom: 10px;
    left: 10px;
    background-color: #2a9d3d;
    color: white;
    padding: 4px 8px;
    border-radius: 4px;
    font-size: 14px;
    font-weight: bold;
    z-index: 2;
}

/* Estilo para negocios no disponibles */
.card-negocio.no-disponible .disponible-negocio {
    background-color: #d11222ce;
}

.card-negocio.no-disponible .imagen-negocio img {
    filter: grayscale(50%);
    opacity: 0.5;
}

/* Estilos para la sección de información */
.info-negocio {
    padding: 15px;
    background-color: #fff;
}

/* Estilos para el nombre del negocio */
.nombre-negocio {
    font-size: 18px;
    margin: 0 0 15px 0;
    color: #333;
    text-align: center;
}

/* Estilos para el botón */
.boton-negocio {
    background-color: #95D2B3;
    color: white;
    border: none;
    padding: 8px 15px;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 14px;
    transition: background-color 0.3s;
}

.boton-negocio:hover {
    background-color: #55AD9B;
}

.boton-negocio:disabled {
    background-color: #cccccc;
    cursor: not-allowed;
}

/* Contenedor principal del swiper */
.negocios-swiper {
    width: 100%;
    padding: 0 110px;
    position: relative;
    overflow: visible;

}

/* Slides del swiper */
.swiper-slide {
    width: auto !important;
    height: auto;
    padding: 10px;
    box-sizing: border-box;
}

/* Flechas de navegación - Versión mejorada */
.swiper-button-prev,
.swiper-button-next {
    --swiper-navigation-size: 80px; /* Tamaño de la flecha */
    --swiper-navigation-color: #ffffff; /* Color de la flecha */
    width: 80px; /* Aumentar el ancho del círculo */
    height: 120px; /* Aumentar el alto del círculo */
    background-color: rgba(54, 54, 54, 0.705);
    border-radius: 10%;
    box-shadow: 0 2px 10px rgb(0, 0, 0);
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 1 !important;
    transition: all 0.3s ease;
}

/* Posicionamiento específico de flechas */
.swiper-button-prev {
    left: 15px; /* Posición fuera del contenedor */
}

.swiper-button-next {
    right: 15px; /* Posición fuera del contenedor */
}

/* Efecto hover para flechas */
.swiper-button-prev:hover,
.swiper-button-next:hover {
    --swiper-navigation-color: #a4fd7b;
    transform: translateY(-50%) scale(1.1);
}

/* Responsive */
@media (max-width: 992px) {
    .negocios-swiper {
        padding: 20px 50px;
    }
}

@media (max-width: 768px) {
    .card-negocio {
        width: 240px;
    }

    .negocios-swiper {
        padding: 20px 40px;
    }

    .swiper-button-prev,
    .swiper-button-next {
        --swiper-navigation-size: 30px;
    }
}

@media (max-width: 576px) {
    .card-negocio {
        width: 200px;
    }

    .negocios-swiper {
        padding: 20px 30px;
    }

    .swiper-button-prev,
    .swiper-button-next {
        display: none; /* Ocultar flechas en móviles muy pequeños */
    }

    .nombre-negocio {
        font-size: 16px;
    }

    .boton-negocio {
        padding: 6px 12px;
        font-size: 13px;
    }
}
</style>
<main class="main">
    <!-- Negocios Disponibles -->
    <section class="seccion-negocios">
        <h2 class="titulo-seccion">Negocios Disponibles</h2>
        <div class="swiper negocios-swiper swiper-disponibles">
            <div class="swiper-wrapper">
                <!-- Negocio 1 -->
                <div class="swiper-slide">
                    <div class="card-negocio">
                        <div class="imagen-negocio">
                            <img src="{{ asset('Principal/IMG/producto1.jpg') }}" alt="Carnicería Don Julio">
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
                            <img src="{{ asset('Principal/IMG/producto 3.jpg') }}" alt="Delicias Doña Claudia">
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
