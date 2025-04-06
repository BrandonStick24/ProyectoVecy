<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use Illuminate\Support\Facades\DB;

Route::get('/prueba-bd', function () {
    return DB::select('SHOW TABLES');
});


use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;


Route::get('/vendedor', [VendedorController::class, 'index'])->name('vendedor.index');
Route::resource('productos', ProductoController::class)->except(['show']);
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');