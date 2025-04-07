<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Models\Negocio;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;

/*
|--------------------------------------------------------------------------
| Rutas Públicas
|--------------------------------------------------------------------------
*/

// Página principal
Route::get('/dashmain', function () {
    return view('RegistroVecy.RegistroUsuario');
})->name('home');

// Ruta alternativa para la página principal
Route::get('/dash', function () {
    return view('RegistroVecy.RegistroUsuario');
});

// Formulario de registro de usuario
Route::get('/registro-usuario', function () {
    return view('RegistroVecy.RegistroUsuario');
})->name('registro.usuario');

/*
|--------------------------------------------------------------------------
| Rutas de Autenticación Personalizadas
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// Registro 
Route::post('/register', [RegisterController::class, 'register'])->name('register');

// Logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| Rutas para restablecimiento de contraseña (deben ir ANTES de las rutas auth)
|--------------------------------------------------------------------------
*/

Route::prefix('password')->group(function () {
    Route::get('/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])
         ->name('password.request');
    
    Route::post('/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])
         ->name('password.email');
    
    Route::get('/reset/{token}', [ResetPasswordController::class, 'showResetForm'])
         ->name('password.reset');
    
    Route::post('/reset', [ResetPasswordController::class, 'reset'])
         ->name('password.update');
});
/*
|--------------------------------------------------------------------------
| Rutas para Vendedor
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard del vendedor
    Route::get('/vendedor', [VendedorController::class, 'indexVendedor'])
        ->name('vendedor.index');
    
    // Productos del vendedor
    Route::prefix('vendedor')->group(function () {
        Route::resource('productos', ProductoController::class)
            ->parameters(['productos' => 'producto:pkid_prod'])
            ->names([
                'create' => 'vendedor.productos.create',
                'store' => 'vendedor.productos.store',
                'edit' => 'vendedor.productos.edit',
                'update' => 'vendedor.productos.update',
                'destroy' => 'vendedor.productos.destroy',
            ])
            ->except(['index', 'show']);
    });
});

/*
|--------------------------------------------------------------------------
| Rutas para Moderador
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    // Dashboard del moderador
    Route::get('/moderador/indexModerador', function () {
        $cantidadNegocios = Negocio::count();
        return view('Moderador.indexModerador', compact('cantidadNegocios'));
    })->name('moderador.index');

    // Gestión de negocios
    Route::get('/negocios', function () {
        $negocios = Negocio::with('propietario.usuario', 'propietario.tipo_documento')->get();
        return view('Moderador.Negocios', compact('negocios'));
    })->name('negocios');

    // Negocios bloqueados
    Route::get('/moderador/negociosBloqueados', function () {
        $negociosBloqueados = Negocio::where('estado', 'bloqueado')->with('propietario.usuario')->get();
        return view('Moderador.negociosBloqueados', compact('negociosBloqueados'));
    })->name('negocios.bloqueados');
});

/*
|--------------------------------------------------------------------------
| Ruta de prueba de conexión a la base de datos
|--------------------------------------------------------------------------
*/

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});