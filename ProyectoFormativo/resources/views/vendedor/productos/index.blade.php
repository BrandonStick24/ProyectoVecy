@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Mis Productos</h1>
        <a href="{{ route('vendedor.productos.create') }}" class="btn btn-success">
            <i class="fas fa-plus"></i> Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Contenedor principal con flex -->
    <div class="d-flex gap-4"> <!-- gap-4 añade espacio entre la tabla y el aside -->
        <!-- Tabla (ocupa 75% del espacio) -->
        <div class="table-responsive flex-grow-1"> <!-- flex-grow-1 para que ocupe el espacio restante -->
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('vendedor.productos.show', $producto) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-eye"></i> Detalle
                                    </a>
                                    <a href="{{ route('vendedor.productos.edit', $producto) }}" class="btn btn-sm btn-primary">
                                        <i class="fas fa-edit"></i> Editar
                                    </a>
                                    <form action="{{ route('vendedor.productos.destroy', $producto) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro?')">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center">No hay productos registrados</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Aside (ocupa 25% del espacio) -->
        <aside class="bg-light p-4 rounded" style="width: 300px; min-width: 300px;"> <!-- Ancho fijo -->
            <h4 class="mb-4">Estado del Negocio</h4>
            <!-- Botón estático (simula cambio con JavaScript básico) -->
            <button id="negocioBtn" class="btn btn-success w-100 mb-3">
                <i class="fas fa-store-open me-2"></i> Abrir Negocio
            </button>
            <!-- Alert estático (oculto inicialmente) -->
            <div id="negocioAlert" class="alert alert-success d-none">
                <i class="fas fa-check-circle me-2"></i> Negocio abierto
            </div>
            <!-- Botón alternativo (para simular cierre) -->
            <button id="cerrarBtn" class="btn btn-outline-danger w-100 d-none">
                <i class="fas fa-store-slash me-2"></i> Cerrar Negocio
            </button>
        </aside>
    </div>
</div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const negocioBtn = document.getElementById('negocioBtn');
        const cerrarBtn = document.getElementById('cerrarBtn');
        const negocioAlert = document.getElementById('negocioAlert');

        negocioBtn.addEventListener('click', function() {
            // Cambia el botón principal a "Cerrar Negocio"
            negocioBtn.classList.add('d-none');
            negocioBtn.classList.remove('btn-success');

            // Muestra el alert y el botón de cierre
            negocioAlert.classList.remove('d-none');
            cerrarBtn.classList.remove('d-none');
        });

        cerrarBtn.addEventListener('click', function() {
            // Vuelve al estado inicial
            negocioBtn.classList.remove('d-none');
            negocioBtn.classList.add('btn-success');

            // Oculta el alert y el botón de cierre
            negocioAlert.classList.add('d-none');
            cerrarBtn.classList.add('d-none');
        });
    });
</script>
