<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Facades\Hash;

class TipouSeeder extends Seeder

{
    /**
     * Run the databases seeds
     */
    public function run(): void
    {
        DB::table('usuarios')->inset([
            'Nombre'=> 'Nicolas'
            'Apellido'=> 'Mendoza'
            'Correo'=> 'Nico@correo.com'
            'Contraseña'=> Hash::make('nico1234')
        ]);
    }
}