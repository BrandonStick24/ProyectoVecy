@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registro') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" id="registerForm">
                        @csrf
                        
                        <!-- Campos del formulario -->
                        <div class="mb-3">
                            <label for="pri_nom">Primer Nombre *</label>
                            <input type="text" name="pri_nom" class="form-control" required>
                        </div>
                        
                        <!-- ... otros campos ... -->
                        
                        <!-- Campo oculto para el rol (se actualizará via JS) -->
                        <input type="hidden" name="fkid_rol" id="inputRol" value="1">
                        
                        <button type="button" class="btn btn-primary" onclick="showRoleSelection()">
                            Continuar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal de selección de rol -->
<div class="modal fade" id="roleModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Selecciona tu rol</h5>
            </div>
            <div class="modal-body text-center">
                <button type="button" class="btn btn-outline-primary mx-2" onclick="selectRole(1)">
                    <i class="bi bi-person"></i> Cliente
                </button>
                <button type="button" class="btn btn-outline-success mx-2" onclick="selectRole(2)">
                    <i class="bi bi-shop"></i> Vendedor
                </button>
            </div>
        </div>
    </div>
</div>

<script>
function showRoleSelection() {
    // Validar formulario primero
    if (document.getElementById('registerForm').checkValidity()) {
        new bootstrap.Modal(document.getElementById('roleModal')).show();
    }
}

function selectRole(roleId) {
    document.getElementById('inputRol').value = roleId;
    document.getElementById('registerForm').submit();
}
</script>
@endsection
