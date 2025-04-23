<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function redirectTo()
{
    if (auth()->user()->rol === 'vendedor') {
        return route('vendedor.productos.index');
    } elseif (auth()->user()->rol === 'moderador') {
        return route('moderador.dashboard');
    } elseif (auth()->user()->rol === 'cliente') {
        return route('cliente.dashboard');
    }
    return '/';
}
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
{
    return Validator::make($data, [
        'nombre' => ['required', 'string', 'max:255'],
        'apellido' => ['required', 'string', 'max:255'],
        'tipo_cedula' => ['required', 'string', 'in:CC,CE'],
        'numero_cedula' => ['required','string','max:20','unique:users','regex:/^[A-Za-z0-9\-]+$/'],
        'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
        'rol' => ['required', 'string', 'in:cliente,vendedor,moderador'],
        'nit_negocio' => ['required_if:rol,vendedor', 'nullable', 'string'],
        'nombre_negocio' => ['required_if:rol,vendedor', 'nullable', 'string'],
        'direccion_negocio' => ['required_if:rol,vendedor', 'nullable', 'string'],
        'tipo_negocio' => ['required_if:rol,vendedor', 'nullable', 'string'],
     [
        'email.required' => 'El correo electrónico es obligatorio.',
        'email.email' => 'Ingresa un correo electrónico válido.',
        'email.unique' => 'Este correo ya está registrado.',
    ]
    ]);
}

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
{
    return User::create([
        'nombre' => $data['nombre'],
        'apellido' => $data['apellido'],
        'tipo_cedula' => $data['tipo_cedula'],
        'numero_cedula' => $data['numero_cedula'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'rol' => $data['rol'],
        'nit_negocio' => $data['nit_negocio'] ?? null,
        'nombre_negocio' => $data['nombre_negocio'] ?? null,
        'direccion_negocio' => $data['direccion_negocio'] ?? null,
        'tipo_negocio' => $data['tipo_negocio'] ?? null,
        'bloqueado' => false,
    ]);
}
}
