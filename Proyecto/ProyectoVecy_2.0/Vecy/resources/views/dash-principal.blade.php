<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <!-- Assets con sintaxis Blade -->
    <link rel="stylesheet" href="{{ asset('Dashboard/CSS/estilo_dash_main_copy.css') }}">
    <link rel="stylesheet" href="{{ asset('Dashboard/CSS/registro_y_rol.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="{{ asset('Dashboard/IMG/logov.2.png') }}" alt="Logo VECY" class="logoimg">
            <span>VECY</span>
        </div>
        <div>
            <span style="font-size: 1.5rem; font-weight: bold; color: white;">Fosca Cundinamarca</span>
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

    <!-- Modal de Login -->
    <div class="modal fade" id="loginPop" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3" style="border-radius: 20px; width: 400px; background: transparent; border: none;">
                <div class="modal-body">
                    <div class="login-container">
                        <div class="login-box">
                            <div class="logolore">
                                <img class="imglore" src="{{ asset('Registro/IMG/WhatsApp_Image_2024-11-21_at_3.45.29_PM.jpeg') }}" alt="Logo Login">
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
                                    <a href="{{ route('password.request') }}" class="forgot-password">¿Olvidó contraseña?</a>
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
                                <img src="{{ asset('Registro/IMG/WhatsApp_Image_2024-11-21_at_3.45.29_PM.jpeg') }}" alt="Logo Registro" class="img-fluid">
                            </div>
                            <p class="registro-titulo text-center fs-4">Registro de usuarios</p>

                            <form method="POST" action="{{ route('register') }}" id="registroForm">
                                @csrf

                                <!-- Campos Básicos -->
                                <div class="mb-3">
                                    <label for="pri_nom" class="form-label">Primer Nombre *</label>
                                    <input type="text" name="pri_nom" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="seg_nom" class="form-label">Segundo Nombre</label>
                                    <input type="text" name="seg_nom" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="pri_ape" class="form-label">Primer Apellido *</label>
                                    <input type="text" name="pri_ape" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="seg_ape" class="form-label">Segundo Apellido</label>
                                    <input type="text" name="seg_ape" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="correo_elec" class="form-label">Correo Electrónico *</label>
                                    <input type="email" name="correo_elec" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña *</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña *</label>
                                    <input type="password" name="password_confirmation" class="form-control" required>
                                </div>

                                <!-- Campo oculto para el rol -->
                                <input type="hidden" name="fkid_rol" id="inputRolId" value="1">

                                <button type="button" class="btn btn-primary w-100" id="btnContinuarRegistro">Continuar</button>
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
                            <img src="{{ asset('Registro/IMG/vendor_(1).png') }}" alt="Vendedor" class="img-fluid" style="width: 80px;">
                            <p>Vendedor</p>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenido principal -->
    <main class="main">
        <!-- Contenido de tu dashboard aquí -->
        @yield('content') <!-- Para contenido dinámico si lo necesitas -->
    </main>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Incluir el JS de registro -->
    <script src="{{ asset('Registro/JS/registro.js') }}"></script>

    <!-- Scripts adicionales -->
    <script src="{{ asset('Dashboard/JS/Slider_Cardwrapper.js') }}"></script>
    <script src="{{ asset('Dashboard/JS/Slider_Categorias.js') }}"></script>
    <script src="{{ asset('Dashboard/JS/login.js') }}"></script>
</body>
</html>


