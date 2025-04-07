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
        DB::table('usuarios')->insert([
            'pri_nom' => 'Juan',          // Cambia estos valores por los que deseas
            'seg_nom' => 'Carlos',        // Nombre secundario del usuario
            'pri_ape' => 'Pérez',         // Apellido primario del usuario
            'seg_ape' => 'Gómez',         // Apellido secundario
            'Correo_elec' => 'juan@example.com', // Correo electrónico del usuario
            'password' => Hash::make('mi_contraseña_segura'), // Contraseña cifrada
        ]);
    }
}

