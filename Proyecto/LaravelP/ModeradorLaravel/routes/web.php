<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsuarioController;
use App\Models\Negocio;

/*
|--------------------------------------------------------------------------
| Ruta raíz (puedes personalizar esta vista)
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('RegistroVecy.RegistroUsuario'); // Asegúrate que la vista exista
});

/*
|--------------------------------------------------------------------------
| Rutas del Moderador
|--------------------------------------------------------------------------
*/
Route::prefix('Moderador')->group(function () {
    Route::get('/indexModerador', function () {
        $cantidadNegocios = Negocio::count();
        return view('Moderador.indexModerador', compact('cantidadNegocios'));
    })->name('moderador.index');

    Route::get('/Negocios', function () {
        $negocios = Negocio::with('propietario.usuario', 'propietario.tipo_documento')->get();
        return view('Moderador.Negocios', compact('negocios'));
    })->name('negocios');

    Route::get('/NegociosBloqueados', function () {
        $negociosBloqueados = Negocio::with('propietario.usuario')->get();
        return view('Moderador.negociosBloqueados', compact('negociosBloqueados'));
    })->name('negocios.bloqueados');

    Route::get('/NegociosSuspendidos', function () {
        $negociosSuspendidos = Negocio::with('propietario.usuario')->get();
        return view('Moderador.negociosSuspendidos', compact('negociosSuspendidos'));
    })->name('negocios.suspendidos');

    Route::get('/UsuariosReportados', function () {
        return view('Moderador.usuariosReportados');
    })->name('usuarios.reportados');
});

/*
|--------------------------------------------------------------------------
| Rutas del Vendedor
|--------------------------------------------------------------------------
*/
Route::get('/vendedor', [VendedorController::class, 'indexVendedor'])->name('vendedor.index');

/*
|--------------------------------------------------------------------------
| Rutas para Productos
|--------------------------------------------------------------------------
*/
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

Route::post('/productos', [ProductoController::class, 'store'])->name('vendedor.productos.store');
Route::post('/vendedor/productos', [ProductoController::class, 'store'])->name('vendedor.productos.store');

Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');
Route::delete('/vendedor/productos/{producto}', [ProductoController::class, 'destroy'])->name('vendedor.productos.destroy');

// Solo si usas resource (ajústalo según tus modelos y claves primarias)
Route::resource('productos', ProductoController::class)
    ->parameters(['productos' => 'producto:pkid_prod'])
    ->names([
        'store'   => 'vendedor.productos.store',
        'update'  => 'vendedor.productos.update',
        'destroy' => 'vendedor.productos.destroy',
    ])
    ->except(['index', 'show']);

/*
|--------------------------------------------------------------------------
| Registro de Usuario
|--------------------------------------------------------------------------

/*
|--------------------------------------------------------------------------
| Rutas de Prueba
|--------------------------------------------------------------------------
*/
Route::get('/prueba', function () {
    $cantidadNegocios = Negocio::count();
    return view('Moderador.indexModerador', compact('cantidadNegocios'));
})->name('prueba');

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});
