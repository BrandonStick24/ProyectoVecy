@extends('layouts.app')

@section('content')
<style>
    body {
        background-color: #f8f9fa;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .register-container {
        background-color: white;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
        width: 100%;
        max-width: 500px;
    }
    .register-container img {
        display: block;
        margin: 0 auto 20px;
    }
    .register-container .form-group {
        margin-bottom: 15px;
    }
    .register-container button {
        width: 100%;
        padding: 10px;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 5px;
    }
    .register-container button:hover {
        background-color: #0056b3;
    }
    .optional-field {
        display: none;
    }
    .business-fields {
        display: none;
    }
    .required-field {
        display: block;
    }
    /* Estilo para asegurar que el video ocupe toda la pantalla */
    .video-background {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;
        z-index: -1;
    }
    body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    .invalid-feedback {
        color: #dc3545;
        font-size: 0.875em;
    }
    .is-invalid {
        border-color: #dc3545;
    }
</style>

<!-- Video de fondo -->
<video autoplay muted loop class="video-background">
    <source src="{{ asset('videos/fondoV.mp4') }}" type="video/mp4">
    Tu navegador no soporta el formato de video.
</video>

<div class="register-container">
    <img src="https://via.placeholder.com/150" alt="Logo" class="img-fluid">

    <form id="registroForm" method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Campos Obligatorios -->
        <div class="form-group">
            <label for="primer_nombre">Primer Nombre *</label>
            <input type="text" class="form-control @error('primer_nombre') is-invalid @enderror" id="primer_nombre" name="primer_nombre" value="{{ old('primer_nombre') }}" placeholder="Primer Nombre" required>
            @error('primer_nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group optional-field" id="segundo_nombre_group">
            <label for="segundo_nombre">Segundo Nombre (Opcional)</label>
            <input type="text" class="form-control @error('segundo_nombre') is-invalid @enderror" id="segundo_nombre" name="segundo_nombre" value="{{ old('segundo_nombre') }}" placeholder="Segundo Nombre">
            @error('segundo_nombre')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="primer_apellido">Primer Apellido *</label>
            <input type="text" class="form-control @error('primer_apellido') is-invalid @enderror" id="primer_apellido" name="primer_apellido" value="{{ old('primer_apellido') }}" placeholder="Primer Apellido" required>
            @error('primer_apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group optional-field" id="segundo_apellido_group">
            <label for="segundo_apellido">Segundo Apellido (Opcional)</label>
            <input type="text" class="form-control @error('segundo_apellido') is-invalid @enderror" id="segundo_apellido" name="segundo_apellido" value="{{ old('segundo_apellido') }}" placeholder="Segundo Apellido">
            @error('segundo_apellido')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="tipo_documento">Tipo de Documento *</label>
            <select class="form-control @error('tipo_documento') is-invalid @enderror" id="tipo_documento" name="tipo_documento" required>
                <option value="TI" {{ old('tipo_documento') == 'TI' ? 'selected' : '' }}>TI</option>
                <option value="CC" {{ old('tipo_documento') == 'CC' ? 'selected' : '' }}>CC</option>
            </select>
            @error('tipo_documento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="numero_documento">Número de Documento *</label>
            <input type="number" class="form-control @error('numero_documento') is-invalid @enderror" id="numero_documento" name="numero_documento" value="{{ old('numero_documento') }}" placeholder="Número de Documento" required>
            @error('numero_documento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico *</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" placeholder="Correo Electrónico" required>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Contraseña *</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" placeholder="Contraseña (Mayor a 5 caracteres)" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña *</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirmar Contraseña" required>
        </div>

        <div class="form-group">
            <label for="rol">Seleccionar Rol *</label>
            <select class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol" required>
                <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                <option value="vendedor" {{ old('rol') == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
            </select>
            @error('rol')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Campos para Vendedor -->
        <div class="business-fields" id="business_fields">
            <p class="text-center">Información del Negocio</p>
            <div class="form-group">
                <label for="nit">NIT del Negocio *</label>
                <input type="text" class="form-control @error('nit') is-invalid @enderror" id="nit" name="nit" value="{{ old('nit') }}" placeholder="NIT del Negocio">
                @error('nit')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="nombre_negocio">Nombre del Negocio *</label>
                <input type="text" class="form-control @error('nombre_negocio') is-invalid @enderror" id="nombre_negocio" name="nombre_negocio" value="{{ old('nombre_negocio') }}" placeholder="Nombre del Negocio">
                @error('nombre_negocio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descripcion_negocio">Descripción del Negocio *</label>
                <textarea class="form-control @error('descripcion_negocio') is-invalid @enderror" id="descripcion_negocio" name="descripcion_negocio" placeholder="Descripción del Negocio">{{ old('descripcion_negocio') }}</textarea>
                @error('descripcion_negocio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="tipo_negocio">Tipo de Negocio *</label>
                <select class="form-control @error('tipo_negocio') is-invalid @enderror" id="tipo_negocio" name="tipo_negocio">
                    <option value="tecnologia" {{ old('tipo_negocio') == 'tecnologia' ? 'selected' : '' }}>Tecnología</option>
                    <option value="restaurante" {{ old('tipo_negocio') == 'restaurante' ? 'selected' : '' }}>Restaurante</option>
                    <option value="panaderia" {{ old('tipo_negocio') == 'panaderia' ? 'selected' : '' }}>Panadería</option>
                    <option value="ropa" {{ old('tipo_negocio') == 'ropa' ? 'selected' : '' }}>Ropa</option>
                    <option value="taller_mecanico" {{ old('tipo_negocio') == 'taller_mecanico' ? 'selected' : '' }}>Taller Mecánico</option>
                    <option value="veterinaria" {{ old('tipo_negocio') == 'veterinaria' ? 'selected' : '' }}>Veterinaria</option>
                </select>
                @error('tipo_negocio')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Botón de Registro -->
        <button type="submit" class="btn btn-primary w-100" id="submitButton">Registrarse</button>
    </form>
</div>

<!-- Modal de Información para Vendedor -->
<div class="modal fade" id="businessModal" tabindex="-1" aria-labelledby="businessModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="businessModalLabel">Información Requerida</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Señor usuario, debe ingresar el NIT del negocio para poder continuar con el proceso de registro.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).ready(function() {
        // Mostrar campos de negocio si se selecciona vendedor
        $('#rol').change(function() {
            if ($('#rol').val() === 'vendedor') {
                $('#business_fields').show();
                $('#businessModal').modal('show');

                // Hacer required los campos de negocio
                $('#nit, #nombre_negocio, #descripcion_negocio, #tipo_negocio').prop('required', true);
            } else {
                $('#business_fields').hide();

                // Quitar required de los campos de negocio
                $('#nit, #nombre_negocio, #descripcion_negocio, #tipo_negocio').prop('required', false);
            }
        });

        // Habilitar el botón de registro si el NIT es ingresado (solo para vendedor)
        $('#nit').on('input', function() {
            if ($('#rol').val() === 'vendedor') {
                if ($(this).val().trim() !== '') {
                    $('#submitButton').prop('disabled', false);
                } else {
                    $('#submitButton').prop('disabled', true);
                }
            }
        });

        // Mostrar campos opcionales si hay valores antiguos
        @if(old('segundo_nombre'))
            $('#segundo_nombre_group').show();
        @endif

        @if(old('segundo_apellido'))
            $('#segundo_apellido_group').show();
        @endif

        // Mostrar campos de negocio si hay errores y el rol es vendedor
        @if($errors->any() && old('rol') == 'vendedor')
            $('#business_fields').show();
        @endif
    });
</script>
@endsection
@endsection
