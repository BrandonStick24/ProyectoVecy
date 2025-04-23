@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard del Cliente</h1>
    <p>Bienvenido, {{ auth()->user()->nombre }}</p>

    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title">Información de tu cuenta</h5>
            <p class="card-text">
                Email: {{ auth()->user()->email }}<br>
                Cédula: {{ auth()->user()->tipo_cedula }} {{ auth()->user()->numero_cedula }}
            </p>
            <a href="{{ route('cliente.info-negocio') }}" class="btn btn-primary">
                Información de Negocio
            </a>
        </div>
    </div>
</div>
@endsection
