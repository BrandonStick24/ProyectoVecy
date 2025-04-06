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

// RUTAS PARA VENDEDOR (tu sección)
Route::get('/vendedor', [VendedorController::class, 'indexVendedor'])->name('vendedor.index');

// RUTAS PARA PRODUCTOS (compartidas)
Route::resource('productos', ProductoController::class)->parameters([
    'productos' => 'producto:pkid_prod'
])->except(['index']); // Excluye el index si está siendo usado por otro dev

// Si necesitas un index alternativo para productos
Route::get('/productos-vendedor', [ProductoController::class, 'indexVendedor'])->name('productos.vendedor.index');