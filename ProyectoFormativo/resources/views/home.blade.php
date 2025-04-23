@extends('layouts.app')

@section('content')
<div class="container">
    @auth
        <div class="alert alert-success">
            Has iniciado sesión como {{ auth()->user()->nombre }} (Rol: {{ auth()->user()->rol }})
        </div>

        @if(auth()->user()->rol === 'cliente')
            <a href="{{ route('cliente.dashboard') }}" class="btn btn-primary">
                Ir a mi Dashboard
            </a>
        @elseif(auth()->user()->rol === 'vendedor')
            <a href="{{ route('vendedor.productos.index') }}" class="btn btn-primary">
                Administrar mis Productos
            </a>
        @elseif(auth()->user()->rol === 'moderador')
            <a href="{{ route('moderador.dashboard') }}" class="btn btn-primary">
                Panel de Moderación
            </a>
        @endif

    @else
        <div class="text-center">
            <h2>Bienvenido</h2>
            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
        </div>
    @endauth
</div>
@endsection
