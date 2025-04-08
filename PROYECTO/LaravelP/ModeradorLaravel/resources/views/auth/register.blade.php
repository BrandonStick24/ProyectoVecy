@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <!-- Copia aquí los mismos campos que tienes en tu modal -->
        <div class="mb-3">
            <label for="pri_nom" class="form-label">Nombre </label>
            <input type="text" name="pri_nom" class="form-control" placeholder="" required>
        </div>
        <div class="mb-3">
             <label for="pri_ape" class="form-label">Apellido </label>
             <input type="text" name="pri_ape" class="form-control" placeholder="" required>
        </div>
            <!-- Campos ocultos (valor vacío por defecto) -->
            <input type="hidden" name="seg_nom" value="">
                                    <input type="hidden" name="seg_ape" value="">
                                {{-- 
                                    <!-- Campos opcionales -->
                                <div class="mb-3">
                                    <label for="seg_nom" class="form-label">Segundo Nombre</label>                                
                                    <input type="text" name="seg_nom" class="form-control" placeholder="Ej: Carlos">
                                </div> --}}
                                {{--
                                <div class="mb-3">
                                    <label for="seg_ape" class="form-label">Segundo Apellido</label>                                    
                                    <input type="text" name="seg_ape" class="form-control" placeholder="Ej: López">
                                </div>
                                --}}
                                <!-- Correo y contraseña -->
                                <div class="mb-3">
                                    <label for="correo_elec" class="form-label">Correo Electrónico</label>
                                    <input type="email" name="correo_elec" class="form-control" placeholder="Ej: juan@example.com" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña *</label>
                                    <input type="password" name="password" class="form-control" placeholder="Mínimo 8 caracteres" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password_confirmation" class="form-label">Confirmar Contraseña *</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Repite la contraseña" required>
                                </div>
                                <!-- Campo oculto para el rol (ej: 1 por defecto para cliente) -->
                                
                                <button type="submit" class="btn btn-primary w-100">Registrarse</button>
        <!-- resto de campos -->
    </form>
</div>
@endsection