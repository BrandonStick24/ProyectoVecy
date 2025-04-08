<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="{{ asset('Registro/CSS/estilo_dash_main_copy.css') }}">
    <link rel="stylesheet" href="{{ asset('Registro/CSS/registro y rol.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('Registro/IMG/logov.2.png') }}" alt="" class="logoimg">
            <span>VECY</span>
        </div>
        <div>
            <span style="font-size: 1.5rem; font-weight: bold; color: white;"> Fosca Cundinamarca</span>
        </div>
        <div class="acciones">
            <div class="buscador">
                <input type="text" placeholder="Buscar">
            </div>
            <a href="{{ route('login') }}" class="button-header">
                    Login
            </a>

        <!-- Botón de Registro -->
            <a href="{{ route('register') }}" class="button-header">
                Registro
            </a>
        </div>
    </header>

   

    <!--categorias-->
    <div class="contenedorca swiper">
        <div class="cardCat-wrapper">
            <ul class="cards-listaca swiper-wrapper">
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/people-carry-box.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Servicios</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="pagina404.html" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/sack-dollar.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Bancos</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/shop.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Tiendas</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/restaurant.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Restaurante</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/school-bus.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Transporte</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/bed.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Hotel</p>
                    </a>
                </li>
                <li class="card-tiendaca swiper-slide">
                    <a href="#" class="card-linkca">
                        <img src="{{ asset('Registro/IMG/shopping-cart.png') }}" alt="tienda1" class="card-imgca">
                        <p class="Estadoca">Eventos</p>
                    </a>
                </li>
            </ul>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <!-- Contenedor principal verdecito oscuro -->
    <main class="main">
        <!-- sub contenedor productos disponibles -->
        <div class="contenedor swiper">
            <p style="color: white;">Tiendas Disponibles</p>
            <div class="card-wrapper">
                <ul class="cards-lista swiper-wrapper">
                    <li class="card-tienda swiper-slide">
                        <a href="NEgociotienda.html" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Carnicería DON JULIO</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Delicias doña Claudia</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Restaurante vegano</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Fama la esquina</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Hotel el Sol</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Comida tradicional el paisa</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado">Disponible</p>
                            <h2 class="card-titulo">Ferretería don Ramón</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                </ul>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>

        <!-- sub contenedor productos NO disponibles -->
        <div class="contenedor swiper">
            <p style="color: white;">Tiendas NO Disponibles</p>
            <div class="card-wrapper">
                <ul class="cards-lista swiper-wrapper">
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">PASTELERÍA DON JULIO</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">Carnicería DON JULIO</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">Pollería DON JULIO</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">PASTELERÍA DON CARLO</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">PASTELERÍA DON MONICA</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">PASTELERÍA DON SEBASTIAN</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                    <li class="card-tienda swiper-slide">
                        <a href="#" class="card-link">
                            <img src="{{ asset('Registro/IMG/producto1.jpg') }}" alt="tienda1" class="card-img">
                            <p class="Estado" style="background: red; width: 120px;">No Disponible</p>
                            <h2 class="card-titulo">PASTELERÍA DON RAMON</h2>
                            <button class="saber">Saber más</button>
                        </a>
                    </li>
                </ul>

                <div class="swiper-pagination"></div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </main>

    <!-- scripts js-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('Registro/JS/Slider_Cardwrapper.js') }}"></script>
    <script src="{{ asset('Registro/JS/Slider_Categorias.js') }}"></script>
    <script src="{{ asset('Registro/JS/login.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('Registro/JS/Registro.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <footer>
        <p>© 2024 Vecy. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
