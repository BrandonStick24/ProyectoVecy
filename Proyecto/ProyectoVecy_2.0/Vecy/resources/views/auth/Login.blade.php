@extends('layouts.app') <!-- Usa tu layout base -->

@section('content')
<div class="container">
    <!-- Modal de Login (copiado de tu dash-principal pero mejorado) -->
    <div class="modal fade show" id="loginModal" tabindex="-1" aria-hidden="true" style="display: block; position: static;">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content p-3" style="border-radius: 20px; width: 400px; background: transparent; border: none;">
                <div class="modal-body">
                    <div class="login-container">
                        <div class="login-box">
                            <div class="logolore">
                                <img class="imglore" src="{{ asset('Registro/IMG/WhatsApp_Image_2024-11-21_at_3.45.29_PM.jpeg') }}" alt="Logo Login">
                            </div>
                            <p class="p">Iniciar sesión</p>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3"> <!-- Mejorado con clases de Bootstrap -->
                                    <label for="email" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="email" required autofocus>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" required>
                                </div>
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" name="remember">
                                    <label class="form-check-label">Recuérdame</label>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                                
                                @if (Route::has('password.request'))
                                    <div class="text-center mt-3">
                                        <a href="{{ route('password.request') }}" class="text-decoration-none">
                                            ¿Olvidó su contraseña?
                                        </a>
                                    </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection