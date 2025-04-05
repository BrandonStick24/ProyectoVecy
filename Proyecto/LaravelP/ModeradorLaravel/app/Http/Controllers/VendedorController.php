<?php

namespace App\Http\Controllers; // ¡Esto es esencial!

class VendedorController extends Controller
{
    public function index()
    {
        return view('vendedor.indexVendedor'); // Asegúrate de que coincida con el nombre del archivo
    }
}