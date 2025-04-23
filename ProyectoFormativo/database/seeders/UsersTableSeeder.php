<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    // Crear usuario moderador
    User::create([
        'nombre' => 'Moderador',
        'apellido' => 'Sistema',
        'tipo_cedula' => 'CC',
        'numero_cedula' => '123456789',
        'email' => 'moderador@example.com',
        'password' => Hash::make('moderador123'),
        'rol' => 'moderador',
        'bloqueado' => false,
    ]);

    // (Opcional) Crear ejemplos de cliente y vendedor
    User::create([
        'nombre' => 'Cliente',
        'apellido' => 'Ejemplo',
        'tipo_cedula' => 'CC',
        'numero_cedula' => '987654321',
        'email' => 'cliente@example.com',
        'password' => Hash::make('cliente123'),
        'rol' => 'cliente',
        'bloqueado' => false,
    ]);

    User::create([
        'nombre' => 'Vendedor',
        'apellido' => 'Ejemplo',
        'tipo_cedula' => 'CC',
        'numero_cedula' => '456789123',
        'email' => 'vendedor@example.com',
        'password' => Hash::make('vendedor123'),
        'rol' => 'vendedor',
        'nit_negocio' => '123456789-1',
        'nombre_negocio' => 'Tienda Ejemplo',
        'direccion_negocio' => 'Calle 123',
        'tipo_negocio' => 'Ropa',
        'bloqueado' => false,
    ]);
}
}
