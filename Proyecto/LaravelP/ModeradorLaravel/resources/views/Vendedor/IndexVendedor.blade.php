<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('css/estilosNovedades.css') }}">
    <title>Dashboard del Vendedor - VECY</title>
</head>

<body>
    <!-- Header -->
    <header class="text-white py-3">
        <div class="d-flex flex-column">
            <img src="{{ asset('img/WhatsApp Image 2024-11-21 at 3.45.29 PM.jpeg') }}" width="100" height="80">
            <h4 class="h4">VECY</h4>
            <!-- Dropdown Sesión -->
            <div class="dropdown">
                <i id="iconoPerson" type="button" class="bi bi-person-fill display-6 iconoPerson"
                    data-bs-toggle="dropdown" aria-expanded="false"></i>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Configurar Negocio</a></li>
                    <li><a class="dropdown-item" href="#">Configurar Perfil</a></li>
                    <li><a class="dropdown-item" href="#">Suspender Perfil</a></li>
                    <li><a class="dropdown-item text-danger" href="#">Cerrar Sesión</a></li>
                </ul>
            </div>
            <!-- Notificaciones -->
            <i id="iconoNotification" type="button" class="bi bi-bell-fill display-6 iconoNotificacion"></i>
        </div>
    </header>

    <!-- Contenedor Principal -->
    <div class="d-flex">
        <!-- Sidebar -->
        <nav id="sidebar" class="bg-dark text-white p-5 text-center">
            <ul class="nav flex-column">
                <hr>
                <h4 class="moderador">Vendedor</h4>
                <hr>
                <li class="nav-item realseMenu MenuRealse">
                    <a class="nav-link text-white" href="#NegociosCollapse" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="NegociosCollapse">
                        <i class="bi bi-shop"></i> Mi tienda</a>
                    <div class="collapse" id="NegociosCollapse">
                        <ul class="list-unstyled ms-3">
                            <li class="nav-item realseMenu MenuRealse">
                                <a class="nav-link text-white" href="#">Mis Productos</a>
                            </li>
                            <li class="nav-item realseMenu MenuRealse">
                                <a class="nav-link text-white" href="#">Productos Suspendidos</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="nav-item realseMenu MenuRealse">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-star"></i> Reseñas</a>
                </li>
            </ul>
        </nav>

        <!-- Contenido -->
        <div class="container-fluid">
            <!-- Barra de búsqueda -->
            <div class="card">
                <div class="search-container d-flex justify-content-between align-items-center mb-4 m-4">
                    <div class="d-flex gap-5">
                        <input type="search" class="form-control search-input" placeholder="Buscar Producto">
                        <button class="btn btn-filter"><i class="bi bi-funnel"></i> Filtrar</button>
                        <button id="abrirNegocio" class="btn btn-success">Abrir Negocio</button>
                        <button id="cerrarNegocio" class="btn btn-danger">Cerrar Negocio</button>
                    </div>
                </div>
            </div>

            <!-- Tabla de Productos -->
            <div class="card text-center p-4">
                <div class="d-flex justify-content-end mb-3">
                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregar">
                        <i class="bi bi-plus-circle"></i> Agregar Producto
                    </a>
                </div>
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        @forelse($productos as $producto)
                            <tr>
                                <td>{{ $producto->pkid_prod }}</td> <!-- Cambiado de id a pkid_prod -->
                                <td>{{ $producto->nom_prod }}</td> <!-- Cambiado de nombre a nom_prod -->
                                <p>Negocio: {{ $producto->negocio->nombre }}</p> 
                                <td>
                                    <!-- Botón Detalles (con data-producto) -->
                                    <a href="#" class="btn btn-dark" data-bs-toggle="modal"
                                        data-bs-target="#modalDetalles" data-producto="{{ json_encode($producto) }}">
                                        <i class="bi bi-info-circle"></i> Detalles
                                    </a>

                                    <!-- Botón Editar (con data-producto) -->
                                    <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalEditar" data-producto="{{ json_encode($producto) }}">
                                        <i class="bi bi-pen-fill"></i> Editar
                                    </a>

                                    <!-- Formulario Eliminar (sin foreach, clase btn-eliminar) -->
                                    <form action="{{ route('vendedor.productos.destroy', $producto->pkid_prod) }}"
                                        method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">
                                            <i class="bi bi-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No hay productos registrados</td>
                            </tr>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modals -->
    @include('vendedor.modals.agregar')
    @include('vendedor.modals.editar')
    @include('vendedor.modals.detalles')
    @include('vendedor.modals.borrar')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- JS Personalizado -->
    <script src="{{ asset('js/crudnegocio.js') }}"></script>
    <script src="{{ asset('js/botones.js') }}"></script>
</body>

</html>
