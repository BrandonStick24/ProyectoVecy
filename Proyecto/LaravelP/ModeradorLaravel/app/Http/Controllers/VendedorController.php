<?php

namespace App\Http\Controllers;

use App\Models\Producto;  // Importa el modelo correctamente

class VendedorController extends Controller
{
    public function index()
{
    $productos = \App\Models\Producto::all(); // Obtiene los productos
    return view('Vendedor.IndexVendedor', ['productos' => $productos]); // Pasa datos a la vista
}
}