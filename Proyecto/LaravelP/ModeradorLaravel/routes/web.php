<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\VendedorController;
use App\Http\Controllers\ProductoController;
use App\Models\Negocio; // Asegúrate de tener este modelo creado

// Ruta principal redireccionada a /negocios
Route::get('/', function () {
    return redirect('/negocios');
});

// Ruta para probar la conexión a la BD
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



// Ruta para mostrar los negocios y pasar los datos a la vista
Route::get('/negocios', function () {
    $negocios = Negocio::with('propietario.usuario', 'propietario.tipo_documento')->get();
    return view('Moderador.Negocios', compact('negocios'));
});

// Rutas de vendedores y productos
//Route::get('/vendedor', [VendedorController::class, 'index'])->name('vendedor.index');
Route::resource('productos', ProductoController::class)->except(['show']);
Route::delete('/productos/{producto}', [ProductoController::class, 'destroy'])->name('productos.destroy');

