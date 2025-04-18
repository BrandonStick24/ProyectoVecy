<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('Moderador/CSS/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Inicio - Vecy</title>
</head>
<body>
    <div class="contenido_vecy">
        <nav class="menu_vecy">
            <img id="img_vecy" src="{{ asset('Moderador/IMG/logo.png') }}" alt="Logo Vecy">
            <hr>
            <ul>
                <h6>PRINCIPAL</h6>
                <li class="nav-item">
                    <a href="" class="nav-link active">
                        <i class="bi bi-house-fill"></i> Inicio
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="{{ url('Negocios') }}" role="button" aria-expanded="false">
                        <i class="bi bi-shop"></i> Negocios
                    </a>
                    <ul class="dropdown-menu">
                        <a href="{{ route('negocios.bloqueados') }}">Bloqueados</a>
                        <li><i class="bi bi-stop-circle-fill"></i><a href="{{ url('NegociosSuspendidos') }}">Suspendidos</a></li>
                        <li><i class="bi bi-exclamation-triangle-fill"></i><a href="{{ url('NegociosReportados') }}">Reportados</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                        <i class="bi bi-people-fill"></i> Usuarios
                    </a>
                    <ul class="dropdown-menu">
                        <li><i class="bi bi-lock-fill"></i><a href="{{ url('UsuariosBloqueados') }}">Bloqueados</a></li>
                        <li><i class="bi bi-stop-circle-fill"></i><a href="{{ url('UsuariosSuspendidos') }}">Suspendidos</a></li>
                        <li><i class="bi bi-exclamation-triangle-fill"></i><a href="{{ url('UsuariosReportados') }}">Reportados</a></li>
                    </ul>
                </li>
                <h6>ESTADISTICAS</h6>
                <li><i class="bi bi-bar-chart"></i> Estadísticas</li>
                <li><i class="bi bi-graph-up"></i> Gráficos</li>
                <h6>PERSONAL</h6>
                <li><i class="bi bi-person-fill"></i> Mi perfil</li>
                <li><i class="bi bi-gear"></i> Configuración</li>
            </ul>
        </nav>

        <!--Contenido principal-->
        <div class="contenidoPrincipal">
            <div class="container text-center">
                <div class="card novedades shadow-lg">
                    <div class="card-body">
                        <h3 class="card-title">Novedades de VECY</h3>
                    </div>
                </div>
                <div class="row col-md-10 m-lg-4">
                    <div class="col-md-4">
                        <div class="card shadow-lg card-custom">
                            <div class="card-header">
                                <h3>Negocios</h3>
                            </div>
                            <img src="{{ asset('Moderador/IMG/Negocios.jpeg') }}" class="img-fluid w-50 rounded-circle cardimg" alt="Negocios">
                            <div class="card-body">
                                <p class="card-text">Asegura la calidad de los negocios registrados revisando sus datos.</p>
                                <a href="{{ route('negocios') }}" class="botonCard">Ver negocios</a>
                                <div class="card-footer">
                                    <p class="mb-0 mt-2"><strong>Cantidad de negocios:</strong></p>
                                    <h2 class="mb-0"><span>200</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-lg card-custom">
                            <div class="card-header">
                                <h3>Usuarios</h3>
                            </div>
                            <img src="{{ asset('Moderador/IMG/Usuarios.jpg') }}" class="img-fluid w-50 rounded-circle cardimg" alt="Usuarios">
                            <div class="card-body">
                                <p class="card-text">Asegura la calidad de los usuarios registrados revisando sus datos.</p>
                                <a href="{{ url('Usuarios') }}" class="botonCard">Ver usuarios</a>
                                <div class="card-footer">
                                    <p class="mb-0 mt-2"><strong>Cantidad de usuarios:</strong></p>
                                    <h2 class="mb-0"><span>321</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card shadow-lg card-custom">
                            <div class="card-header">
                                <h3>Reportes</h3>
                            </div>
                            <img src="{{ asset('Moderador/IMG/Reportes.jpg') }}" class="img-fluid w-50 rounded-circle cardimg" alt="Reportes">
                            <div class="card-body">
                                <p class="card-text">Gestiona los reportes sobre negocios y actividades sospechosas.</p>
                                <a href="#" class="botonCard">Ver reportes</a>
                                <div class="card-footer">
                                    <p class="mb-0 mt-2"><strong>Cantidad de reportes:</strong></p>
                                    <h2 class="mb-0"><span>23</span></h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer>
        <div class="pieVecy">
            <p>&copy; 2025 Derechos reservados</p>
            <div class="iconos_redes">
                <a href="https://www.facebook.com"><i class="bi bi-facebook"></i></a>
                <a href="https://www.twiter.com"><i class="bi bi-twitter"></i></a>
                <a href="https://www.tiktok.com"><i class="bi bi-tiktok"></i></a>
                <a href="https://www.youtube.com"><i class="bi bi-youtube"></i></a>
                <a href="https://www.instagram.com"><i class="bi bi-instagram"></i></a>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
