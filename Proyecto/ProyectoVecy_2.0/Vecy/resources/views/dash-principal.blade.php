<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" href="{{ asset('Dashboard/CSS/estilo_dash_maincopy.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/CSS/registroyrol.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('Dashboard/IMG/IMG/logov.2.png') }}" alt="" class="logoimg">
            <span>VECY</span>
        </div>
        <div>
            <span style="font-size: 1.5rem; font-weight: bold; color: white;"> Fosca Cundinamarca</span>
        </div>
        <div class="acciones">
            <div class="buscador">
                <input type="text" placeholder="Buscar">
            </div>
            <button class="button-header" data-bs-toggle="modal" data-bs-target="#loginPop">
                Login
            </button>
            <button class="button-header" data-bs-toggle="modal" data-bs-target="#registroPop">
                Registro
            </button>
        </div>
    </header>

    <!--login popover-->
    <div class="modal fade" id="loginPop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3" style="border-radius: 20px; width: 400px; background: transparent; border: none;">
                <div class="modal-body">
                    <div class="login-container">
                        <div class="login-box">
                            <div class="logolore">
                                <img class="imglore" src="{{ asset('Registro/IMG/WhatsApp Image 2024-11-21 at 3.45.29 PM.jpeg') }}" alt="">
                            </div>
                            <p class="p">Iniciar sesión</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="input-group">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" placeholder="Ingresa el Correo" required>
                                </div>
                                <div class="input-group">
                                    <label for="password">Contraseña</label>
                                    <input type="password" name="password" placeholder="Ingrese la contraseña" required>
                                </div>
                                <div class="options">
                                    <label>
                                        <input type="checkbox" name="remember">
                                        Recuérdame
                                    </label>
                                    <a href="{{ route('password.request') }}" class="forgot-password"> ¿Olvidó contraseña?</a>
                                </div>
                                <button type="submit" class="login-btn">Ingresar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Registro -->
    <div class="modal fade" id="registroPop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3" style="border-radius: 20px; width: 400px;">
                <div class="modal-body">
                    <div class="registro-container">
                        <div class="registro-box">
                            <div class="registro-logo text-center mb-4">
                                <img src="{{ asset('Registro/IMG/WhatsApp Image 2024-11-21 at 3.45.29 PM.jpeg') }}" alt="Logo de Registro" class="img-fluid">
                            </div>
                            <p class="registro-titulo text-center fs-4">Registro de usuarios</p>                           
                            <form method="POST" action="{{ route('register') }}" id="registroForm">
                                @csrf
                                <!-- Campos obligatorios -->
                                <div class="mb-3">
                                    <label for="pri_nom" class="form-label">Nombre </label>
                                    <input type="text" name="pri_nom" class="form-control" placeholder="" required>
                                </div>
                                <div class="mb-3">
                                     <label for="pri_ape" class="form-label">Apellido </label>
                                     <input type="text" name="pri_ape" class="form-control" placeholder="" required>
                                </div>
                                <!-- Campos ocultos (valor vacío por defecto) -->
                                    <input type="hidden" name="seg_nom" value="">
                                    <input type="hidden" name="seg_ape" value="">
                                {{-- 
                                    <!-- Campos opcionales -->
                                <div class="mb-3">
                                    <label for="seg_nom" class="form-label">Segundo Nombre</label>                                
                                    <input type="text" name="seg_nom" class="form-control" placeholder="Ej: Carlos">
                                </div> --}}
                                {{--
                                <div class="mb-3">
                                    <label for="seg_ape" class="form-label">Segundo Apellido</label>                                    
                                    <input type="text" name="seg_ape" class="form-control" placeholder="Ej: López">
                                </div>
                                --}}
                                <!-- Correo y contraseña -->
                                <div class="mb-3">
                                    <label for="correo_elec" class="form-label">Correo Electrónico</label>
                                    <input type="email" name="correo_elec" class="form-control" placeholder="Ej: juan@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña *</label>
                                    <input type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña *</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña" required>
                                </div>
                                <!-- Campo oculto para el rol (ej: 1 por defecto para cliente) -->
                                
                                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal de Selección de Rol -->
    <div class="modal fade" id="rolPop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3" style="border-radius: 20px; width: 400px;">
                <div class="modal-body">
                    <div class="text-center mb-4">
                        <p class="fs-4">Selecciona un Rol</p>
                    </div>
                    <div class="d-flex justify-content-around">
                        <!-- Botón para Cliente (rol ID = 1) -->
                        <button class="btn btn-link text-center seleccionar-rol" data-rol="1">
                            <img src="{{ asset('img/costumer.png') }}" alt="Cliente" class="img-fluid" style="width: 80px;">
                            <p>Cliente</p>
                        </button>
                        <!-- Botón para Vendedor (rol ID = 2) -->
                        <button class="btn btn-link text-center seleccionar-rol" data-rol="2">
                            <img src="{{ asset('Registro/IMG/vendor (1).png') }}" alt="Vendedor" class="img-fluid" style="width: 80px;">
                            <p>Vendedor</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
    <script src="{{ asset('Dashboard/JSon/Slider_Cardwrapper.js') }}"></script>
    <script src="{{ asset('Dashboard/JSon/Slider_Categorias.js') }}"></script>
    <script src="{{ asset('Dashboard/JSon/login.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('Dashboard/JSon/Registro.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

    <footer>
        <p>© 2024 Vecy. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
