<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>{{ config('app.name', 'VECY') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('IMG/faviconlogo.png') }}">
    <link href="{{ asset('CSS/cardNegocio.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/categorias.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/Dash.css') }}" rel="stylesheet">
    <link href="{{ asset('CSS/infoNego.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
<body>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Scripts -->

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light" style="background-color: #55AD9B; padding: 0;">
            <div class="container d-flex justify-content-between align-items-center">
                <!-- Logo y Nombre -->
                <div class="d-flex align-items-center">
                    <img src="{{ asset('IMG/logo.png') }}" alt="Logo" style="width: 60px; height: auto;">
                    <a class="navbar-brand ms-2 fw-bold text-white" href="{{ url('/') }}">
                        Vecy
                    </a>
                </div>

                <!-- Título Central solo para usuarios no autenticados o roles 'cliente' -->
                @if(!Auth::check() || (Auth::check() && Auth::user()->rol === 'cliente'))
                    <div class="text-center d-none d-md-block">
                        <h5 class="mb-0 text-white fw-bold">Fosca, Cundinamarca</h5>
                    </div>
                @endif

                <!-- Botón de colapso para móvil -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Contenido Navbar -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Izquierda vacía -->
                    <ul class="navbar-nav me-auto"></ul>

                    <!-- Derecha -->
                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fw-bold" href="{{ route('login') }}">Iniciar sesión</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link text-white fw-bold" href="{{ route('register') }}">Registrarse</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-uppercase fs-5 text-white"
                                   href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nombre }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->rol === 'vendedor')
                                        <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#businessInfoModal">
                                            <i class="fas fa-store me-2"></i> Mi Negocio
                                        </button>
                                        <div class="dropdown-divider"></div>
                                    @endif

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt me-2"></i> {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @auth
        <!-- ============= MODAL DE INFORMACIÓN DEL NEGOCIO ============= -->
        <div class="modal fade" id="businessInfoModal" tabindex="-1" aria-labelledby="businessInfoModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="businessInfoModalLabel">Información de Mi Negocio</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('profile.update.business') }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="nombre_negocio" class="form-label">Nombre del Negocio*</label>
                                    <input type="text" class="form-control" id="nombre_negocio" name="nombre_negocio"
                                           value="{{ Auth::user()->nombre_negocio ?? '' }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="nit_negocio" class="form-label">NIT*</label>
                                    <input type="text" class="form-control" id="nit_negocio" name="nit_negocio"
                                           value="{{ Auth::user()->nit_negocio ?? '' }}" required>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="direccion_negocio" class="form-label">Dirección*</label>
                                <input type="text" class="form-control" id="direccion_negocio" name="direccion_negocio"
                                       value="{{ Auth::user()->direccion_negocio ?? '' }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tipo_negocio" class="form-label">Tipo de Negocio*</label>
                                <input type="text" class="form-control" id="tipo_negocio" name="tipo_negocio"
                                       value="{{ Auth::user()->tipo_negocio ?? '' }}" required>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


@endauth
@if(session('success'))
<div class="alert alert-success alert-dismissible fade show m-3">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Incluir jQuery (si lo necesitas) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Incluir JS de Swiper -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Tu script personalizado -->
    <script src="{{ asset('JS/SliderNegocios.js') }}"></script>
    <script src="{{ asset('JS/categoriasSlider.js') }}"></script>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
