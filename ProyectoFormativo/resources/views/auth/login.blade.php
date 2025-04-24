@extends('layouts.app')

@section('content')
    <video autoplay muted loop id="videoFondo">
        <source src="{{ asset('fondoV.mp4') }}" type="video/mp4">
        Tu navegador no soporta el video HTML5.
    </video>
    <style>
        .encabezado_carta {
            background-color: #55AD9B;
            color: white;
            font-weight: bold;
            padding: 15px 10px;
            font-size: 20px;
            display: flex;
            justify-content: center;
        }

        #videoFondo {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(0.5);
            /* Opcional para oscurecer un poco el video */
        }

        .container {
            position: relative;
            z-index: 1;
        }

        .logoV {
            width: 150px;
            height: auto;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            position: relative;
            left: 30%;
            margin-bottom: 25px;
        }

        h3 {
            color: #55AD9B;
            text-align: center;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .iniciarS {
            background-color: #55AD9B;
            color: white;
            border: none;
            padding: 10px;
        }

        .olvidarC {
            color: #55AD9B;
        }

        input.form-control:focus,
        textarea.form-control:focus,
        select.form-control:focus {
            border-color: #55AD9B !important;
            /* Verde agua bonito */
            box-shadow: 0 0 0 0.25rem rgba(149, 210, 179, 0.5) !important;
            /* Sombra con tu color */
            outline: none;
        }

    </style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <form class="formulario" method="POST" action="{{ route('login') }}">
                            @csrf
                            <img src="{{ asset('IMG/logo.png') }}" alt="" class="logoV">
                            <h3>Iniciar Sesion</h3>

                            <div class="mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">Correo elctrónico</label>

                                <div class="col-md-12">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3 text-start">
                                <label for="password" class="col-md-4 col-form-label">Contraseña</label>

                                <div class="col-md-12">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            Recuérdame
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="col-md-12 text-center">
                                    <button type="submit" class=" w-100 iniciarS">
                                        Iniciar Sesión
                                    </button>
                                    <br>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link olvidarC" href="{{ route('password.request') }}">
                                            ¿Olvidaste tu contraseña?
                                        </a>
                                    @endif
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
