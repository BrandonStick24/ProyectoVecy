<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'pri_nom' => 'required|string|max:50',
            'seg_nom' => 'nullable|string|max:50',
            'pri_ape' => 'required|string|max:50',
            'seg_ape' => 'nullable|string|max:50',
            'correo_elec' => 'required|email|unique:usuarios,correo_elec',
            'password' => 'required|min:8|confirmed',
            'fkid_rol' => 'required|in:1,2'
        ]);

        $user = Usuarios::create([
            'pkid_user' => uniqid(),
            'pri_nom' => $request->pri_nom,
            'seg_nom' => $request->seg_nom,
            'pri_ape' => $request->pri_ape,
            'seg_ape' => $request->seg_ape,
            'correo_elec' => $request->correo_elec,
            'password' => Hash::make($request->password),
            'fkid_rol' => $request->fkid_rol,
        ]);

        Auth::login($user);

        if ($request->fkid_rol == 2) {
            return redirect()->route('vendedor.registro-negocio');
        }

        return redirect()->route('home');
    }}
