<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class VendedorProductosController extends Controller
{
    /**
     * Muestra el listado de productos del vendedor
     */
    public function index()
{
    $productos = auth()->user()->productos()->latest()->get(); // Ordenados por los más recientes
    return view('vendedor.productos.index', compact('productos'));
}


    /**
     * Muestra el formulario para crear nuevo producto
     */
    public function create()
    {
        return view('vendedor.productos.create');
    }

    /**
     * Guarda un nuevo producto en la base de datos
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',

        ]);

        auth()->user()->productos()->create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
             // O puedes eliminarlo del fillable en el modelo
        ]);

        return redirect()->route('vendedor.productos.index')
            ->with('success', 'Producto creado correctamente');
    }

    /**
     * Muestra un producto específico (puedes omitirlo si no es necesario)
     */
    public function show(Producto $producto)
    {
        $this->authorize('view', $producto); // Verifica que el producto pertenezca al vendedor
        return view('vendedor.productos.show', compact('producto'));
    }

    /**
     * Muestra el formulario para editar un producto
     */
    public function edit(Producto $producto)
    {
        $this->authorize('update', $producto); // Verifica propiedad
        return view('vendedor.productos.edit', compact('producto'));
    }

    /**
     * Actualiza el producto en la base de datos
     */
    public function update(Request $request, Producto $producto)
    {
        $this->authorize('update', $producto);

        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto->update($request->all());

        return redirect()->route('vendedor.productos.index')
            ->with('success', 'Producto actualizado correctamente');
    }

    /**
     * Elimina un producto
     */
    public function destroy(Producto $producto)
    {
        //$this->authorize('delete', $producto);
        $producto->delete();

        return redirect()->route('vendedor.productos.index')
            ->with('success', 'Producto eliminado correctamente');
    }
}
