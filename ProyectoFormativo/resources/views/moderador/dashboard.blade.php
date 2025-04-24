@extends('layouts.app')

@section('content')
    <style>
        h1 {
            color: #55AD9B;
            font-weight: bold;
        }

        .encabezado_carta {
            background-color: #55AD9B;
            color: white;
            text-align: center;
            padding: 15px 10px;
        }

        .table th {
            background-color: #55AD9B !important;
            color: white !important;
            text-align: center;
            border: none;
        }
    </style>
    <div class="container">
        <h1 class="mb-4">Panel de Moderador</h1>

        <div class="row">
            <!-- Sección Usuarios -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header encabezado_carta">
                        <h5 class="mb-0">Usuarios Registrados</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tipo Documento</th>
                                        <th>No. Documento</th>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Rol</th>
                                        <th>Acción</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usuarios as $usuario)
                                        <tr>
                                            <td>{{ $usuario->tipo_cedula }}</td>
                                            <td> {{ $usuario->numero_cedula }}</td>
                                            <td>{{ $usuario->nombre }}</td>
                                            <td>{{ $usuario->apellido }}</td>
                                            <td>{{ $usuario->rol }}</td>
                                            <td>
                                                <form action="{{ route('moderador.usuario.toggle-bloqueo', $usuario) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                        class="btn btn-sm text-white {{ $usuario->bloqueado ? 'btn-success' : 'btn-warning' }}">
                                                        {{ $usuario->bloqueado ? 'Desbloquear' : 'Bloquear' }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Sección Negocios -->
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header encabezado_carta">
                        <h5 class="mb-0">Negocios Registrados</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <table class="table table-bordered table-striped">
                            <thead class="text-center">
                                <tr>
                                    <th>NIT Negocio</th>
                                    <th>Nombre Negocio</th>
                                    <th>Dirección Negocio</th>
                                    <th>Tipo Negocio</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($negocios as $negocio)
                                    <tr>
                                        <td>{{ $negocio->nit_negocio}}</td>
                                        <td>{{ $negocio->nombre_negocio }}</td>
                                        <td>{{ $negocio->direccion_negocio}}</td>
                                        <td>{{ $negocio->tipo_negocio }}</td>
                                        <td>
                                            <form action="{{ route('moderador.negocio.toggle-bloqueo', $negocio) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="btn btn-sm text-white {{ $negocio->bloqueado ? 'btn-success' : 'btn-warning' }}">
                                                    {{ $negocio->bloqueado ? 'Desbloquear' : 'Bloquear' }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
