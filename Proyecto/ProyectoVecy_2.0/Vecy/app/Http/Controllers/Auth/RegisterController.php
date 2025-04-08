<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuarios;

class RegisterController extends Controller
{
    public function register(Request $request) {
        $request->validate([
            'pri_nom' => 'required|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'correo_elec' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
            'fkid_rol' => 'required|in:1,2' // 1:cliente, 2:vendedor
        ]);

        $user = Usuarios::create([
            'pkid_user' => uniqid(),
            'pri_nom' => $request->pri_nom,
            'pri_ape' => $request->pri_ape,
            'correo_elec' => $request->correo_elec,
            'password' => Hash::make($request->password),
            'fkid_rol' => $request->fkid_rol,
        ]);

        Auth::login($user);

        return response()->json([
            'success' => true,
            'redirect' => $request->fkid_rol == 2
                ? route('vendedor.registro-negocio')
                : route('home')
        ]);
    }
    /**
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
