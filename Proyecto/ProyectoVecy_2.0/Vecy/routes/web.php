<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;

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

