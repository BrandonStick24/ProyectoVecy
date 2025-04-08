<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\VendedorController;

// Página principal
Route::get('/dashi', function () {
    return view('dash-principal');
});

Route::get('/dash', function () {
    return view('dash-principal');
})->name('home');

// Autenticación
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    
    // Registro
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    // Recuperación de contraseña
    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');
});

// Vendedor
Route::middleware(['auth', 'rol:vendedor'])->prefix('vendedor')->group(function () {
    Route::get('/registro-negocio', [VendedorController::class, 'showNegocioForm'])->name('vendedor.registro-negocio');
    Route::post('/registro-negocio', [VendedorController::class, 'storeNegocio']);
    Route::get('/dashboard', [VendedorController::class, 'dashboard'])->name('vendedor.dashboard');
});

// Moderador (si es necesario)
Route::prefix('moderador')->group(function () {
    Route::get('/', function () {
        return view('Moderador.indexModerador');
    });
    Route::get('/negocios', function () {
        return view('Moderador.Negocios');
    });
});