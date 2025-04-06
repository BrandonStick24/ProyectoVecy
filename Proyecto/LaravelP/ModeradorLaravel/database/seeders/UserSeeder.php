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
            'pri_nom'=> 
            'seg_nom'=>
            'pri_ape'=> 
            'seg_ape'=>
            'Correo_elec'=> 
            'password'=> Hash::make
        ]);
    }
}