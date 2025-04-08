<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Renderiza la vista que creamos
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials, $request->remember)) {
            return redirect()->intended('/dashboard'); // Redirige al dashboard tras login
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas',
        ]);
    }
}