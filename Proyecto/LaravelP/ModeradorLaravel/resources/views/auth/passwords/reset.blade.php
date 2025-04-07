@extends('layouts.app') {{-- O tu layout base --}}

@section('content')
    <div class="container">
        <h2>¿Olvidaste tu contraseña?</h2>

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="form-group">
                <label for="email">Correo electrónico</label>
                <input type="email" name="email" id="email" required class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Enviar enlace de recuperación</button>
        </form>
    </div>
@endsection