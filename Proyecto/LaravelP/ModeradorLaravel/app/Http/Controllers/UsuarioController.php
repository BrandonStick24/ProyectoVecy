<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Muestra el formulario (opcional si lo haces desde vista principal).
     */
    public function crear()
    {
        return view('registro'); // Solo si usas una vista aparte para registrar
    }

    /**
     * Guarda el usuario en la base de datos.
     */
    public function guardar(Request $request)
    {
        // Validación de datos
        $request->validate([
            'pkfkt_doc' => 'required|string|size:2',
            'pkid_usuario' => 'required|string|max:15|unique:usuarios,pkid_usuario',
            'pri_nom' => 'required|string|max:35',
            'seg_nom' => 'nullable|string|max:35',
            'pri_ape' => 'required|string|max:35',
            'seg_ape' => 'nullable|string|max:35',
            'correo_elec' => 'required|email|max:45|unique:usuarios,correo_elec',
            'password' => 'required|string|min:8|confirmed',
            'fkid_rol' => 'nullable|integer'
        ]);

        // Crear el usuario
        Usuario::create([
            'pkfkt_doc' => $request->pkfkt_doc,
            'pkid_usuario' => $request->pkid_usuario,
            'pri_nom' => $request->pri_nom,
            'seg_nom' => $request->seg_nom,
            'pri_ape' => $request->pri_ape,
            'seg_ape' => $request->seg_ape,
            'correo_elec' => $request->correo_elec,
            'password' => Hash::make($request->password),
            'fkid_rol' => $request->fkid_rol
        ]);

        // Redireccionar con mensaje
        return redirect()->back()->with('exito', '¡Usuario registrado correctamente!');
    }
}
