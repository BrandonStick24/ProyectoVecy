<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function dashboard()
    {
        return view('cliente.dashboard');
    }

    // Nuevo método para "Info de Negocio"
    public function infoNegocio()
    {
        return view('cliente.info-negocio'); // Vista que crearemos luego
    }
}
