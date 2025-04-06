<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
{
    $productos = Producto::all();
    return view('productos.index', compact('productos'));
}

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_prod' => 'required|string|max:255',
            'pre_prod' => 'required|numeric|min:0',
            'desc_prod' => 'nullable|string',
            'fkid_t_prod' => 'required|integer|exists:tipos_producto,pkid_t_prod', // Ajusta según tu tabla de tipos
            'est_prod' => 'sometimes|boolean'
        ]);

        // Asignación automática del negocio (ejemplo)
        $validated['fknit_neg'] = auth()->user()->negocio_id; // Ajusta según tu lógica

        Producto::create($validated);

        return redirect()->route('vendedor.index')
            ->with('success', 'Producto creado exitosamente');
    }

    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nom_prod' => 'required|string|max:255',
            'pre_prod' => 'required|numeric|min:0',
            'desc_prod' => 'nullable|string',
            'fkid_t_prod' => 'required|integer|exists:tipos_producto,pkid_t_prod',
            'est_prod' => 'sometimes|boolean'
        ]);

        $producto->update($validated);

        return redirect()->route('vendedor.index')
            ->with('success', 'Producto actualizado exitosamente');
    }

    public function destroy(Producto $producto)
{
    $producto->delete();
    return redirect()->route('productos.index')->with('success', 'Producto eliminado');
}
    
    public function create()
    {
        $tiposProducto = \App\Models\TipoProducto::all(); // Ajusta según tu modelo
        return view('Vendedor.modals.agregar', compact('tiposProducto'));
    }


}