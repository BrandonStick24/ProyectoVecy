<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VendedorController extends Controller
{

public function showNegocioForm() {
        return view('vendedor.registro-negocio'); // Vista con formulario de negocio
    }

    public function storeNegocio(Request $request) {
        $request->validate([
            'nombre_negocio' => 'required',
            'direccion' => 'required',
            // ... otros campos del negocio
        ]);

        $negocio = Negocio::create([
            'pkid_negocio' => uniqid(),
            'nombre' => $request->nombre_negocio,
            'fkid_user' => auth()->id(),
            // ... otros campos
        ]);

        // Actualiza al usuario con el ID del negocio
        auth()->user()->update(['fkid_negocio' => $negocio->pkid_negocio]);

        return redirect()->route('vendedor.dashboard');
    }    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
