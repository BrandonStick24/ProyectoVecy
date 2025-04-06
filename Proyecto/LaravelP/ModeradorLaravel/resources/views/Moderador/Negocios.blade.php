<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('Moderador/CSS/Negocios.css') }}" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"/>
    <title>Negocios | VECY</title>
  </head>
  <body>
    <div class="contenido_vecy">
      <nav class="menu_vecy">
        <img id="img_vecy" src="{{ asset('Moderador/IMG/logo.png') }}" alt="Logo VECY" />
        <hr />
        <ul>
          <h6>PRINCIPAL</h6>
          <li class="nav-item">
            <a href="{{ url('index') }}">
              <i class="bi bi-house-fill"></i> Inicio
            </a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link active" data-bs-toggle="dropdown" href="#" role="button">
              <i class="bi bi-shop"></i> Negocios
            </a>
            <ul class="dropdown-menu">
              <li><i class="bi bi-lock-fill"></i><a href="{{ url('NegociosBloqueados') }}">Bloqueados</a></li>
              <li><i class="bi bi-stop-circle-fill"></i><a href="{{ url('NegociosSuspendidos') }}">Suspendidos</a></li>
              <li><i class="bi bi-exclamation-triangle-fill"></i><a href="{{ url('UsuariosReportados') }}">Reportados</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
              <i class="bi bi-people-fill"></i> Usuarios
            </a>
            <ul class="dropdown-menu">
              <li><i class="bi bi-lock-fill"></i><a href="#">Bloqueados</a></li>
              <li><i class="bi bi-stop-circle-fill"></i><a href="#">Suspendidos</a></li>
              <li><i class="bi bi-exclamation-triangle-fill"></i><a href="#">Reportados</a></li>
            </ul>
          </li>
          <h6>ESTADÍSTICAS</h6>
          <li><i class="bi bi-bar-chart"></i> Estadísticas</li>
          <li><i class="bi bi-graph-up"></i> Gráficos</li>
          <h6>PERSONAL</h6>
          <li><i class="bi bi-person-fill"></i> Mi perfil</li>
          <li><i class="bi bi-gear"></i> Configuración</li>
        </ul>
      </nav>

      <!-- Contenido principal -->
      <div class="contenidoPrincipal">
        <div class="container text-center">
          <div class="card novedades">
            <div class="card-body">
              <h3 class="card-title">Negocios de VECY</h3>
              <p>Encuentra todos los negocios registrados en VECY</p>
            </div>
          </div>

          <!-- Barra de búsqueda -->
          <div class="container">
            <div class="row justify-content-center mb-4">
              <div class="col-md-6">
                <div class="search-container">
                  <div class="input-group">
                    <input id="barraBusqueda" type="text" class="form-control search-input" placeholder="Buscar..." />
                    <button class="colorIcono" type="button" id="botonBuscar">
                      <i class="bi bi-search"></i>
                    </button>
                    <button class="colorIcono" type="button">
                      <i class="bi bi-funnel"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Tabla de negocios -->
          <div class="row justify-content-center">
            <div class="col-md-11">
              <table id="tablaNegocios" class="table table-bordered table-hover Negocios">
                <thead class="table-dark">
                  <tr>
                    <th>NIT</th>
                    <th>Nombre</th>
                    <th>Propietario</th>
                    <th>Estado</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($negocios as $negocio)
                    <tr>
                      <td>{{ $negocio->pknit_neg }}</td>
                      <td>{{ $negocio->nom_neg }}</td>
                      <td>
                        {{ $negocio->usuario->pri_nom ?? '' }} {{ $negocio->usuario->pri_ape ?? '' }} {{$negocio->usuario->seg_ape ?? ''}}
                      </td>
                      <td>
                        @if ($negocio->estado === 'activo')
                          <span class="badge bg-success">Activo</span>
                        @elseif ($negocio->estado === 'inactivo')
                          <span class="badge bg-secondary">Inactivo</span>
                        @elseif ($negocio->estado === 'suspendido')
                          <span class="badge bg-warning text-dark">Suspendido</span>
                        @elseif ($negocio->estado === 'bloqueado')
                          <span class="badge bg-danger">Bloqueado</span>
                        @else
                          <span class="badge bg-dark">No definido</span>
                        @endif
                      </td>
                      <td>
                        <a href=""">
                          <button class="botonAccion">
                            Ver info
                          </button>
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="6" class="text-center">No hay negocios registrados.</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer -->
    <footer>
      <div class="pieVecy">
        <p>&copy; 2025 Derechos reservados</p>
        <div class="iconos_redes">
          <a href="https://www.facebook.com"><i class="bi bi-facebook"></i></a>
          <a href="https://www.twitter.com"><i class="bi bi-twitter"></i></a>
          <a href="https://www.tiktok.com"><i class="bi bi-tiktok"></i></a>
          <a href="https://www.youtube.com"><i class="bi bi-youtube"></i></a>
          <a href="https://www.instagram.com"><i class="bi bi-instagram"></i></a>
        </div>
      </div>
    </footer>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    ></script>
    <script src="{{ asset('Moderador/JS/busquedaNeg.js') }}"></script>
  </body>
</html>
