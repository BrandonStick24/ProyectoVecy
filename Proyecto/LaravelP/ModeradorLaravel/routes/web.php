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
Route::get('/vendedor', [VendedorController::class, 'index']);