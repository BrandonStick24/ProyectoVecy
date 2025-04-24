<!doctype html>
<html lang="es">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->


    <title>{{ config('app.name', 'VECY') }}</title>
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
            <div class="container">
                <div style="display: flex; flex-direction: column;">
                <img src="{{ asset('IMG/logo.png') }}" alt="" style="width: 60px">
                <a style="color: white; font-weight: bold; position: relative; left: 10%;" class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}" style="color: white; font-weight: bold;">Iniciar sesion</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color: white; font-weight: bold;">Registrarse</a>
                                </li>
                            @endif
                        @else

                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold text-uppercase fs-5 text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->nombre }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <!-- Botón "Mi Negocio" (solo para vendedores) -->
                                @if(Auth::user()->rol === 'vendedor')
                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#businessInfoModal">
                                        <i class="fas fa-store me-2"></i> Mi Negocio
                                    </button>
                                    <div class="dropdown-divider"></div> <!-- Separador opcional -->
                                @endif

                                <!-- Botón de Logout -->
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
        <!-- Modal de Información del Negocio -->


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
