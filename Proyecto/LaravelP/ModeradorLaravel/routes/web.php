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
use App\Models\Producto;

/*
|--------------------------------------------------------------------------
| Ruta raíz redirige al index del moderador
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('moderador.index');
});

/*
|--------------------------------------------------------------------------
| Rutas para moderador
|--------------------------------------------------------------------------
*/

// Vista del moderador (dashboard)
Route::get('/Moderador/indexModerador', function () {
    $cantidadNegocios = Negocio::count();
    return view('Moderador.indexModerador', compact('cantidadNegocios'));
})->name('moderador.index');

// Vista de negocios
Route::get('/Moderador/Negocios', function () {
    $negocios = Negocio::with('propietario.usuario', 'propietario.tipo_documento')->get();
    return view('Moderador.Negocios', compact('negocios'));
})->name('negocios');

// Vista de negocios bloqueados (sin usar columna estado)
Route::get('/Moderador/NegociosBloqueados', function () {
    $negociosBloqueados = Negocio::with('propietario.usuario')->get(); // sin filtro por 'estado'
    return view('Moderador.negociosBloqueados', compact('negociosBloqueados'));
})->name('negocios.bloqueados');

// Vista de negocios suspendidos (sin usar columna estado)
Route::get('/NegociosSuspendidos', function () {
    $negociosSuspendidos = Negocio::with('propietario.usuario')->get(); // sin filtro por 'estado'
    return view('Moderador.negociosSuspendidos', compact('negociosSuspendidos'));
})->name('negocios.suspendidos');

// Usuarios reportados (rellena si tienes esta vista)
Route::get('/UsuariosReportados', function () {
    return view('Moderador.usuariosReportados');
})->name('usuarios.reportados');

/*
|--------------------------------------------------------------------------
| Rutas para productos
|--------------------------------------------------------------------------
*/

Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::post('/productos', [ProductoController::class, 'store'])->name('vendedor.productos.store');
Route::post('/vendedor/productos', [ProductoController::class, 'store'])->name('vendedor.productos.store');
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::delete('/vendedor/productos/{producto}', [ProductoController::class, 'destroy'])->name('vendedor.productos.destroy');

Route::resource('productos', ProductoController::class)->parameters([
    'productos' => 'producto:pkid_prod'
])->names([
    'store'   => 'vendedor.productos.store',
    'update'  => 'vendedor.productos.update',
    'destroy' => 'vendedor.productos.destroy',
])->except(['index', 'show']);

/*
|--------------------------------------------------------------------------
| Ruta para vista del vendedor
|--------------------------------------------------------------------------
*/

Route::get('/vendedor', [VendedorController::class, 'indexVendedor'])->name('vendedor.index');

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
| Ruta de prueba Moderador sin logeo ni registro
|--------------------------------------------------------------------------
*/
Route::get('/prueba', function () {  //Dasboard principal
    $cantidadNegocios = \App\Models\Negocio::count();
    return view('Moderador.indexModerador', compact('cantidadNegocios'));
})->name('prueba');  // Ruta sin autenticación
/*
|--------------------------------------------------------------------------
| Ruta de prueba de conexión a la base de datos
|--------------------------------------------------------------------------
*/

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});
