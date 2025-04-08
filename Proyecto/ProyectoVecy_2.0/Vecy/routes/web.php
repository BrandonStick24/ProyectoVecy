<?php

use Illuminate\Support\Facades\Route;


/**
|-------------------------------------------------------------------------
|                              Moderador
|-------------------------------------------------------------------------
 */

Route::get('/', function () {
    return view('dash-principal');
});
Route::view('Moderador/indexModerador',
'Moderador.indexModerador');
Route::get('/Moderador/Negocios', function () {
    return view('Moderador.Negocios');
});

/*
|--------------------------------------------------------------------------
| Registro de Usuario
|--------------------------------------------------------------------------
*/
// Registro básico
/*
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Formulario de negocio para vendedores
Route::get('/vendedor/registro-negocio', [VendedorController::class, 'showNegocioForm'])
     ->middleware('auth');
Route::post('/vendedor/registro-negocio', [VendedorController::class, 'storeNegocio']);
*/

