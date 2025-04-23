@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Registro de Usuario') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <!-- Nombre -->
                            <div class="col-md-6">
                                <label for="nombre" class="form-label">{{ __('Nombre') }}*</label>
                                <input type="text" class="form-control @error('nombre') is-invalid @enderror"
                                       id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                                @error('nombre')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Apellido -->
                            <div class="col-md-6">
                                <label for="apellido" class="form-label">{{ __('Apellido') }}*</label>
                                <input type="text" class="form-control @error('apellido') is-invalid @enderror"
                                       id="apellido" name="apellido" value="{{ old('apellido') }}" required>
                                @error('apellido')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <!-- Tipo de Cédula -->
                            <div class="col-md-4">
                                <label for="tipo_cedula" class="form-label">{{ __('Tipo de Cédula') }}*</label>
                                <select class="form-select @error('tipo_cedula') is-invalid @enderror"
                                        id="tipo_cedula" name="tipo_cedula" required>
                                    <option value="CC" {{ old('tipo_cedula') == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                    <option value="CE" {{ old('tipo_cedula') == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                </select>
                                @error('tipo_cedula')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Número de Cédula -->
                            <div class="col-md-8">
                                <label for="numero_cedula" class="form-label">{{ __('Número de Cédula') }}*</label>
                                <input type="text" class="form-control @error('numero_cedula') is-invalid @enderror"
                                       id="numero_cedula" name="numero_cedula" value="{{ old('numero_cedula') }}" required>
                                <small class="form-text text-muted">
                                    @if(old('tipo_cedula') == 'CE')
                                        Formato: Letras, números o guiones (ej: ABC-123-XYZ)
                                    @else
                                        Solo números (ej: 1234567890)
                                    @endif
                                </small>
                                @error('numero_cedula')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Correo Electrónico') }}*</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                   id="email" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row mb-3">
                            <!-- Contraseña -->
                            <div class="col-md-6">
                                <label for="password" class="form-label">{{ __('Contraseña') }}*</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                       id="password" name="password" required autocomplete="new-password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Confirmar Contraseña -->
                            <div class="col-md-6">
                                <label for="password-confirm" class="form-label">{{ __('Confirmar Contraseña') }}*</label>
                                <input type="password" class="form-control"
                                       id="password-confirm" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <!-- Rol -->
                        <div class="mb-3">
                            <label for="rol" class="form-label">{{ __('Rol') }}*</label>
                            <select class="form-select @error('rol') is-invalid @enderror"
                                    id="rol" name="rol" required>
                                <option value="cliente" {{ old('rol') == 'cliente' ? 'selected' : '' }}>Cliente</option>
                                <option value="vendedor" {{ old('rol') == 'vendedor' ? 'selected' : '' }}>Vendedor</option>
                            </select>
                            @error('rol')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Campos adicionales para vendedores -->
                        <div id="camposVendedor" class="border p-3 mb-3 rounded" style="display: {{ old('rol') == 'vendedor' ? 'block' : 'none' }};">
                            <h5 class="mb-3">Información del Negocio</h5>

                            <div class="row mb-3">
                                <!-- NIT del Negocio -->
                                <div class="col-md-6">
                                    <label for="nit_negocio" class="form-label">{{ __('NIT del Negocio') }}*</label>
                                    <input type="text" class="form-control @error('nit_negocio') is-invalid @enderror"
                                           id="nit_negocio" name="nit_negocio" value="{{ old('nit_negocio') }}"
                                           {{ old('rol') == 'vendedor' ? 'required' : '' }}>
                                    @error('nit_negocio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nombre del Negocio -->
                                <div class="col-md-6">
                                    <label for="nombre_negocio" class="form-label">{{ __('Nombre del Negocio') }}*</label>
                                    <input type="text" class="form-control @error('nombre_negocio') is-invalid @enderror"
                                           id="nombre_negocio" name="nombre_negocio" value="{{ old('nombre_negocio') }}"
                                           {{ old('rol') == 'vendedor' ? 'required' : '' }}>
                                    @error('nombre_negocio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Dirección del Negocio -->
                            <div class="mb-3">
                                <label for="direccion_negocio" class="form-label">{{ __('Dirección del Negocio') }}*</label>
                                <input type="text" class="form-control @error('direccion_negocio') is-invalid @enderror"
                                       id="direccion_negocio" name="direccion_negocio" value="{{ old('direccion_negocio') }}"
                                       {{ old('rol') == 'vendedor' ? 'required' : '' }}>
                                @error('direccion_negocio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Tipo de Negocio -->
                            <div class="mb-3">
                                <label for="tipo_negocio" class="form-label">{{ __('Tipo de Negocio') }}*</label>
                                <input type="text" class="form-control @error('tipo_negocio') is-invalid @enderror"
                                       id="tipo_negocio" name="tipo_negocio" value="{{ old('tipo_negocio') }}"
                                       {{ old('rol') == 'vendedor' ? 'required' : '' }}>
                                @error('tipo_negocio')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Botón de Registro -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary btn-lg">
                                {{ __('Registrarse') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Script para mostrar/ocultar campos de vendedor -->
<script>
    document.getElementById('rol').addEventListener('change', function() {
        const camposVendedor = document.getElementById('camposVendedor');
        const esVendedor = this.value === 'vendedor';

        camposVendedor.style.display = esVendedor ? 'block' : 'none';

        // Actualizar atributos required
        document.querySelectorAll('#camposVendedor input, #camposVendedor select').forEach(input => {
            input.required = esVendedor;
        });
    });
</script>
@endsection
