<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Negocio;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $negocios = Negocio::with('propietario.usuario')->get();
        return view('negocios.index', compact('negocios'));
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
        $request->validate([
            'pknit_neg' => 'required|string|unique:negocios,pknit_neg',
            'nom_neg' => 'required|string',
            'direcc_neg' => 'required|string',
            'desc_neg' => 'nullable|string',
            'fkid_mun' => 'required|integer',
            'fkt_doc' => 'required|string',
            'fkid_usuario' => 'required|integer',
        ]);

        $negocio = Negocio::create($request->all());

        return response()->json($negocio, 201);
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

