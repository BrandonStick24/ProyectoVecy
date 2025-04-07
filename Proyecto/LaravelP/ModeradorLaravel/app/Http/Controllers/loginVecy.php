<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginVecy extends Controller
{
    public function verLogin()
    {
        return view('RegistroVecy.RegistroUsuario'); // Vista del formulario login
    }

    public function login(Request $request)
    {
        // Validación de campos
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // ✅ Verificación de moderador fijo
        if (
            $request->email === 'moderador@correo.com' &&
            $request->password === '123456'
        ) {
            session(['rol' => 'moderador']);
            return redirect('/moderador/inicio');
        }

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();

            // Redirigir según el rol
            switch ($user->rol) {
                case 'vendedor':
                    return redirect('/vendedor/dashboard');
                case 'cliente':
                    return redirect('/cliente/dashboard');
                default:
                    return redirect('/'); // Otra ruta por defecto
            }
        }
        return back()->withErrors([
            'email' => 'Correo o contraseña incorrectos',
        ])->withInput();
    }
}
