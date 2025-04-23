@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Información de Negocio</h1>
    <div class="card">
        <div class="card-body">
            <!-- Contenido vacío (lo personalizarás después) -->
            <p class="text-muted">Aquí irá la información del negocio.</p>
        </div>
    </div>
    <a href="{{ route('cliente.dashboard') }}" class="btn btn-primary mt-3">
        Volver al Dashboard
    </a>
</div>
@endsection
