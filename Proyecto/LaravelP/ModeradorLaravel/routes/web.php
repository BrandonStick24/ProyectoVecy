<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;

// Rutas básicas
Route::get('/', function () {
    return view('welcome');
});

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});

Route::get('/productos/create', [ProductoController::class, 'create'])->name('productos.create');
Route::get('/productos/{producto}/edit', [ProductoController::class, 'edit'])->name('productos.edit');
Route::post('/productos', [ProductoController::class, 'store'])
     ->name('vendedor.productos.store'); // Nombre exacto
// RUTAS PARA VENDEDOR (tu sección)
Route::get('/vendedor', [VendedorController::class, 'indexVendedor'])->name('vendedor.index');

// Rutas CRUD de productos (redirigen a vendedor.index)
Route::resource('productos', ProductoController::class)->parameters([
    'productos' => 'producto:pkid_prod'
])->names([
    'store' => 'vendedor.productos.store',
    'update' => 'vendedor.productos.update',
    'destroy' => 'vendedor.productos.destroy',
])->except(['index']); // Excluye el index estándar (usamos indexVendedor)


