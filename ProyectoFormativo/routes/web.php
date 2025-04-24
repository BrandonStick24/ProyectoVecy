<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendedorProductosController;
use App\Http\Controllers\ModeradorController;
use App\Http\Controllers\ProfileController;

/*--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------*/
Route::get('/', function () {
    return view('/principal');
});

// Rutas de autenticación (login/registro/logout) - Generadas por Laravel UI
Auth::routes();

/*--------------------------------------------------------------------------
| Rutas Protegidas (requieren login)
|--------------------------------------------------------------------------*/
Route::middleware('auth')->group(function () {

    //-----------------------------
    // 1. RUTAS PARA CLIENTE
    //-----------------------------
    Route::prefix('cliente')->group(function () {
        Route::get('/dashboard', [ClienteController::class, 'dashboard'])->name('cliente.dashboard');
        Route::get('/info-negocio', [ClienteController::class, 'infoNegocio'])->name('cliente.info-negocio'); // Nueva ruta
    });

    //-----------------------------
    // 2. RUTAS PARA VENDEDOR (CRUD Productos)
    //-----------------------------
    Route::prefix('vendedor')->group(function () {
        Route::resource('productos', VendedorProductosController::class)
            ->names([
                'index'   => 'vendedor.productos.index',
                'create'  => 'vendedor.productos.create',
                'store'   => 'vendedor.productos.store',
                'show'    => 'vendedor.productos.show',
                'edit'    => 'vendedor.productos.edit',
                'update'  => 'vendedor.productos.update',
                'destroy' => 'vendedor.productos.destroy'
            ]);
    });


Route::put('/profile/update-business', [ProfileController::class, 'updateBusiness'])
     ->name('profile.update.business');
    //-----------------------------
    // 3. RUTAS PARA MODERADOR
    //-----------------------------
    Route::prefix('moderador')->group(function () {
        // Dashboard principal
        Route::get('/dashboard', [ModeradorController::class, 'dashboard'])
            ->name('moderador.dashboard');

        // Bloquear/Desbloquear Usuarios
        Route::post('/usuario/{user}/toggle-bloqueo', [ModeradorController::class, 'toggleBloqueoUsuario'])
            ->name('moderador.usuario.toggle-bloqueo');

        // Bloquear/Desbloquear Negocios (vendedores)
        Route::post('/negocio/{vendedor}/toggle-bloqueo', [ModeradorController::class, 'toggleBloqueoNegocio'])
            ->name('moderador.negocio.toggle-bloqueo');
    });
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
