@extends('layouts.app')

@section('content')
<div class="auth-modal">
    <h2>Confirma tu contraseña</h2>

    <p>Por seguridad, confirma tu contraseña antes de continuar.</p>

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <label for="password">Contraseña</label>
            <input id="password" type="password" name="password" required autocomplete="current-password">
            
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit">Confirmar contraseña</button>
        </div>
    </form>
</div>
@endsection