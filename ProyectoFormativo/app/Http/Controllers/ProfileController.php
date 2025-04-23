<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function updateBusiness(Request $request)
{
    // Validación
    $request->validate([
        'nombre_negocio' => 'required|string|max:100',
        'nit_negocio' => 'required|string|max:20',
        'direccion_negocio' => 'required|string|max:200',
        'tipo_negocio' => 'required|in:restaurante,tienda,servicios',
    ]);

    // Actualizar solo si el usuario es vendedor
    if (auth()->user()->rol === 'vendedor') {
        auth()->user()->update([
            'nombre_negocio' => $request->nombre_negocio,
            'nit_negocio' => $request->nit_negocio,
            'direccion_negocio' => $request->direccion_negocio,
            'tipo_negocio' => $request->tipo_negocio,
        ]);

        return back()->with('success', '¡Información del negocio actualizada!');
    }

    return back()->with('error', 'No tienes permisos para esta acción.');
}
}
