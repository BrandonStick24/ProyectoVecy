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
        // Validar los datos del formulario
        $validated = $request->validate([
            'nom_prod' => 'required|string|max:255',  // Validación de nombre
            'pre_prod' => 'required|numeric|min:0',   // Validación de precio (numérico y mayor o igual a 0)
            'fkid_t_prod' => 'required|exists:tipos_productos,pkid_t_prod', // Validación del tipo de producto
            'desc_prod' => 'nullable|string',         // Descripción opcional
            'est_prod' => 'required|boolean',         // Estado del producto
            // No es necesario validar fknit_neg ya que se asigna automáticamente
        ]);

        try {
            // Asignación automática del negocio
            $validated['fknit_neg'] = auth()->user()->negocio_id;

            // Verificar si los datos son válidos y no están vacíos
            if (empty($validated['nom_prod']) || empty($validated['pre_prod']) || empty($validated['fkid_t_prod'])) {
                return back()->withInput()->with('error', 'Todos los campos obligatorios deben ser completados.');
            }

            // Crear el producto
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
