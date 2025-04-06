<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Página Principal')</title>
    <link rel="stylesheet" href="{{ asset('css/estilo_dash_main.css') }}">
    <link rel="stylesheet" href="{{ asset('css/registro_y_rol.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('components.header')

    @yield('content')

    @include('components.footer')

    @include('modals.login')
    @include('modals.register')
    @include('modals.rol')

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> 
    <script src="{{ asset('js/Slider_Cardwrapper.js') }}"></script>
    <script src="{{ asset('js/Slider_Categorias.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="{{ asset('js/Registro.js') }}"></script>
</body>
</html>