@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel de Moderador</h1>

    <div class="row">
        <!-- Sección Usuarios -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Usuarios Registrados</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($usuarios as $usuario)
    <tr>
        <td>{{ $usuario->nombre }}</td>
        <td>
            <form action="{{ route('moderador.usuario.toggle-bloqueo', $usuario) }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-sm {{ $usuario->bloqueado ? 'btn-success' : 'btn-warning' }}">
                    {{ $usuario->bloqueado ? 'Desbloquear' : 'Bloquear' }}
                </button>
            </form>
        </td>
    </tr>
@endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Sección Negocios -->
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0">Negocios Registrados</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        @foreach($negocios as $negocio)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $negocio->nombre_negocio }} ({{ $negocio->email }})
                                <form action="{{ route('moderador.negocio.toggle-bloqueo', $negocio) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-sm {{ $negocio->bloqueado ? 'btn-success' : 'btn-warning' }}">
                                        {{ $negocio->bloqueado ? 'Desbloquear' : 'Bloquear' }}
                                    </button>
                                </form>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
