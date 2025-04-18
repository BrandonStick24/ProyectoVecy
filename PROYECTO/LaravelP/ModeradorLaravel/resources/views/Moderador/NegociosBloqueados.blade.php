<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>

    {{-- CSS personalizado --}}
    <link rel="stylesheet" href="{{ asset('Moderador/CSS/Negocios.css') }}" />

    {{-- Iconos Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    <title>Negocios Bloqueados</title>
  </head>
  <body>
    <div class="contenido_vecy">
      <nav class="menu_vecy">
        <img id="img_vecy" src="{{ asset('Moderador/IMG/logo.png') }}" alt="Logo Vecy" />
        <hr />
        <ul>
          <h6>PRINCIPAL</h6>
          <li class="nav-item">
            <a href="{{ url('Moderador/indexModerador') }}">
                <i class="bi bi-house-fill"></i> Inicio
              </a>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <i class="bi bi-shop"></i> Negocios
            </a>
            <ul class="dropdown-menu">
              <li><i class="bi bi-lock-fill"></i><a href="#">Bloqueados</a></li>
              <li><i class="bi bi-stop-circle-fill"></i><a href="{{ url('NegociosSuspendidos') }}">Suspendidos</a></li>
              <li><i class="bi bi-exclamation-triangle-fill"></i><a href="#">Reportados</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
              <i class="bi bi-people-fill"></i>Usuarios
            </a>
            <ul class="dropdown-menu">
              <li><i class="bi bi-lock-fill"></i><a href="{{ url('UsuariosBloqueados') }}">Bloqueados</a></li>
              <li><i class="bi bi-stop-circle-fill"></i><a href="{{ url('UsuariosSuspendidos') }}">Suspendidos</a></li>
              <li><i class="bi bi-exclamation-triangle-fill"></i><a href="{{ url('UsuariosReportados') }}">Reportados</a></li>
            </ul>
          </li>
          <h6>ESTADISTICAS</h6>
          <li><i class="bi bi-bar-chart"></i>Estadísticas</li>
          <li><i class="bi bi-graph-up"></i>Gráficos</li>
          <h6>PERSONAL</h6>
          <li><i class="bi bi-person-fill"></i>Mi perfil</li>
          <li><i class="bi bi-gear"></i>Configuración</li>
        </ul>
      </nav>

      <!-- Contenido principal -->
      <div class="contenidoPrincipal">
        <div class="container text-center">
          <div class="card novedades">
            <div class="card-body">
              <h3 class="card-title">Negocios bloqueados de VECY</h3>
              <p>Encuentra todos los negocios bloqueados de VECY</p>
            </div>
          </div>

          {{-- Barra de búsqueda --}}
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-6">
                <div class="search-container">
                  <div class="input-group">
                    <input type="text" class="form-control search-input" placeholder="Buscar..." />
                    <button class="colorIcono" type="button">
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

          {{-- Tabla --}}
          <div class="row justify-content-center">
            <div class="col-md-10">
              <table class="table table-bordered Negocios">
                <thead>
                  <tr>
                    <th>Nit</th>
                    <th>Propietario</th>
                    <th>Descripción</th>
                    <th>Categoría</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>123456</td>
                    <td>Andres</td>
                    <td>Negocios de venta de muebles</td>
                    <td>Mueblería</td>
                    <td>
                      <button class="botonAccion">
                        <p>Ver info</p>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>

    {{-- Footer --}}
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

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
