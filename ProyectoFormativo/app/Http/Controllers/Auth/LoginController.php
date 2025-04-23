<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request; // Faltaba esta importación
use Illuminate\Support\Facades\Auth; // Faltaba esta importación

class LoginController extends Controller
{
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Redirección personalizada por rol
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->bloqueado) {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Tu cuenta está bloqueada.');
        }

        switch ($user->rol) {
            case 'moderador':
                return redirect()->route('moderador.dashboard');
            case 'vendedor':
                return redirect()->route('vendedor.productos.index');
            default: // cliente
                return redirect()->route('cliente.dashboard');
        }
    }
}
