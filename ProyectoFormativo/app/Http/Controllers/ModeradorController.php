<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ModeradorController extends Controller
{
    /**
     * Dashboard principal del moderador
     */
    public function dashboard()
    {
        $usuarios = User::where('rol', '!=', 'moderador')->get();
        $negocios = User::where('rol', 'vendedor')->get();

        return view('moderador.dashboard', compact('usuarios', 'negocios'));
    }

    /**
     * Bloquear/desbloquear usuario
     */
    // En ModeradorController.php
public function toggleBloqueoUsuario(User $user)
{
    if ($user->rol === 'moderador') {
        return back()->with('error', 'No puedes bloquear a otro moderador.');
    }

    $user->update(['bloqueado' => !$user->bloqueado]);
    $action = $user->bloqueado ? 'bloqueado' : 'desbloqueado';
    return back()->with('success', "Usuario {$action} correctamente.");
}

    /**
     * Bloquear/desbloquear negocio (vendedor)
     */
    public function toggleBloqueoNegocio(User $vendedor)
    {
        if ($vendedor->rol !== 'vendedor') {
            abort(403, 'Solo se pueden bloquear negocios (vendedores)');
        }

        $vendedor->update(['bloqueado' => !$vendedor->bloqueado]);

        $action = $vendedor->bloqueado ? 'bloqueado' : 'desbloqueado';
        return back()->with('success', "Negocio {$action} correctamente");
    }
}
