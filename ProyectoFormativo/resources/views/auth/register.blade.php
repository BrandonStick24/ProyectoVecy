@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <!-- Campos base (nombre, apellido, cédula, email, contraseña) -->
                            <div class="form-group">
    <label for="nombre">Nombre</label>
    <input type="text" class="form-control" id="nombre" name="nombre" required>
</div>

<div class="form-group">
    <label for="apellido">Apellido</label>
    <input type="text" class="form-control" id="apellido" name="apellido" required>
</div>

<div class="form-group">
    <label for="tipo_cedula">Tipo de Cédula</label>
    <select class="form-control" id="tipo_cedula" name="tipo_cedula" required>
        <option value="CC">Cédula de Ciudadanía</option>
        <option value="CE">Cédula de Extranjería</option>
    </select>
</div>

<div class="form-group">
    <label for="numero_cedula">Número de Cédula</label>
    <input type="text" class="form-control" id="numero_cedula" name="numero_cedula" required>
</div>
<div class="form-group">
    <label for="email">Correo Electrónico</label>
    <input
        type="email"
        class="form-control @error('email') is-invalid @enderror"
        id="email"
        name="email"
        value="{{ old('email') }}"  <!-- Mantiene el valor si hay error -->
        required
        autocomplete="email"
    >
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    <label for="password">Contraseña</label>
    <input
        type="password"
        class="form-control"
        id="password"
        name="password"
        required
        autocomplete="new-password"
    >
</div>

<div class="form-group">
    <label for="password-confirm">Confirmar Contraseña</label>
    <input
        type="password"
        class="form-control"
        id="password-confirm"
        name="password_confirmation"
        required
        autocomplete="new-password"
    >
</div>
<!-- Rol (cliente, vendedor, moderador) -->
<div class="form-group">
    <label for="rol">Rol</label>
    <select class="form-control" id="rol" name="rol" required>
        <option value="cliente">Cliente</option>
        <option value="vendedor">Vendedor</option>
    </select>
</div>

<!-- Campos adicionales para vendedores (aparecen dinámicamente) -->
<div id="camposVendedor" style="display: none;">
    <div class="form-group">
        <label for="nit_negocio">NIT del Negocio</label>
        <input type="text" class="form-control" id="nit_negocio" name="nit_negocio">
    </div>
    <div class="form-group">
        <label for="nombre_negocio">Nombre del Negocio</label>
        <input type="text" class="form-control" id="nombre_negocio" name="nombre_negocio">
    </div>
    <div class="form-group">
        <label for="direccion_negocio">Dirección del Negocio</label>
        <input type="text" class="form-control" id="direccion_negocio" name="direccion_negocio">
    </div>
    <div class="form-group">
        <label for="tipo_negocio">Tipo de Negocio</label>
        <input type="text" class="form-control" id="tipo_negocio" name="tipo_negocio">
    </div>
</div>

<!-- Script para mostrar campos de vendedor si se selecciona -->
<script>
    document.getElementById('rol').addEventListener('change', function() {
        const camposVendedor = document.getElementById('camposVendedor');
        if (this.value === 'vendedor') {
            camposVendedor.style.display = 'block';
            // Hacer campos requeridos
            document.getElementById('nit_negocio').required = true;
            document.getElementById('nombre_negocio').required = true;
            document.getElementById('direccion_negocio').required = true;
            document.getElementById('tipo_negocio').required = true;
        } else {
            camposVendedor.style.display = 'none';
            // Quitar requeridos si no es vendedor
            document.getElementById('nit_negocio').required = false;
            document.getElementById('nombre_negocio').required = false;
            document.getElementById('direccion_negocio').required = false;
            document.getElementById('tipo_negocio').required = false;
        }
    });
</script>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
