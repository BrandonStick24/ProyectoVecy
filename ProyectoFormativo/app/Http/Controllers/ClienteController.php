<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function principal()
    {
        return view('principal');
    }

    // Nuevo método para "Info de Negocio"
    public function infoNegocio()
    {
        return view('cliente.info-negocio'); // Vista que crearemos luego
    }
}
