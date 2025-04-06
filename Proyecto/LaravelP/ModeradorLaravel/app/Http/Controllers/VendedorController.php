<?php

namespace App\Http\Controllers;

use App\Models\Producto;  // Importa el modelo correctamente
class VendedorController extends Controller

{
    public function indexVendedor()
{
    $productos = Producto::all(); 
    
    return view('Vendedor.IndexVendedor', compact('productos')); 
}
}