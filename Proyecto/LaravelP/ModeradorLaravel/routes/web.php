<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Models\Negocio;

/*
|--------------------------------------------------------------------------
| Rutas para moderador
|--------------------------------------------------------------------------
*/

// Página de inicio del moderador
Route::get('/Moderador/indexModerador', function () {
    $cantidadNegocios = Negocio::count(); // Contar negocios desde la BD
    return view('Moderador.indexModerador', compact('cantidadNegocios'));
})->name('moderador.index');

// Vista de negocios
Route::get('/negocios', function () {
    $negocios = Negocio::with('propietario.usuario', 'propietario.tipo_documento')->get();
    return view('Moderador.Negocios', compact('negocios'));
})->name('negocios');

/*
|--------------------------------------------------------------------------
| Rutas para productos
|--------------------------------------------------------------------------
*/

// Crear producto
Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');

// Editar producto
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');

// Guardar nuevo producto
Route::post('/productos', [ProductoController::class, 'store'])->name('vendedor.productos.store');

// Eliminar producto
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

// Resource (excepto index y show)
Route::resource('productos', ProductoController::class)->parameters([
    'productos' => 'producto:pkid_prod'
])->names([
    'store' => 'vendedor.productos.store',
    'update' => 'vendedor.productos.update',
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
| Prueba de conexión a la BD
|--------------------------------------------------------------------------
*/

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});
