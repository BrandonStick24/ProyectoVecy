<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\TipoProducto;
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
            'fkid_t_prod' => 'required|integer|exists:tipos_producto,pkid_t_prod',
            'est_prod' => 'sometimes|boolean'
        ]);

        try {
            // Asignación automática del negocio
            $validated['fknit_neg'] = auth()->user()->negocio_id;

            Producto::create($validated);

            return redirect()->route('vendedor.index')
                ->with('success', 'Producto creado exitosamente');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al crear el producto: ' . $e->getMessage());
        }
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

        try {
            $producto->update($validated);

            return redirect()->route('vendedor.index')
                ->with('success', 'Producto actualizado exitosamente');

        } catch (\Exception $e) {
            return back()->withInput()
                ->with('error', 'Error al actualizar: ' . $e->getMessage());
        }
    }

    public function destroy(Producto $producto)
    {
        try {
            $producto->delete();
            return redirect()->route('vendedor.index')
                ->with('success', 'Producto eliminado');

        } catch (\Exception $e) {
            return back()->with('error', 'Error al eliminar: ' . $e->getMessage());
        }
    }
    
    public function create()
    {
        $tiposProducto = TipoProducto::all();
        return view('Vendedor.modals.agregar', compact('tiposProducto'));
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);
        $tiposProducto = TipoProducto::all();
        return view('Vendedor.modals.editar', compact('producto', 'tiposProducto'));
    }
}