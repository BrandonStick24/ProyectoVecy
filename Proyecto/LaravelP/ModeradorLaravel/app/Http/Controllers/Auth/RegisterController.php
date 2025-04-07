<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Usuario; // Asegúrate de usar el modelo Usuario
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'pri_nom' => 'required|string|max:35',
            'pri_ape' => 'required|string|max:35',
            'correo_elec' => 'required|string|email|max:45|unique:usuarios',
            'password' => 'required|string|min:8|max:15|confirmed',
            'fkid_rol' => 'required|integer|in:1,2', // Asegura que solo acepte 1 (cliente) o 2 (vendedor)
        ]);
    }

    protected function create(array $data)
    {
        return Usuario::create([
            'pkfkt_doc' => 'CC',
            'pri_nom' => $data['pri_nom'],
            'pri_ape' => $data['pri_ape'],
            'correo_elec' => $data['correo_elec'],
            'password' => Hash::make($data['password']),
            'fkid_rol' => $data['fkid_rol'],
            //'fkid_mun' => 1
            //'seg_nom' => null, // Opcional, se guarda como null
            //'seg_ape' => null, // Opcional, se guarda como null
            // Agrega otros campos necesarios según tu estructura
        ]);
    }

    public function register(Request $request)
{
    try {
        $this->validator($request->all())->validate();
        
        $user = $this->create($request->all());
        Auth::login($user);
        
        return $this->registered($request, $user);
        
    } catch (\Illuminate\Validation\ValidationException $e) {
        // Redirige a /register con errores cuando falla la validación
        return redirect('/register')
               ->withErrors($e->errors())
               ->withInput();
    }
}

    protected function registered(Request $request, $user)
    {
        // Redirige según el rol almacenado en el usuario
        return redirect()->route($user->fkid_rol == 1 ? 'cliente.dashboard' : 'vendedor.index');
    }

    public function redirectPath()
    {
        // Redirección temporal, luego la ajustaremos por rol
        return '/dashboard';
    }
}