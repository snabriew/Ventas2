<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\MarcasController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\ProductosController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para clientes
Route::resource('clientes', ClientesController::class);

// Rutas para marcas
Route::resource('marcas', MarcasController::class);

// Rutas para proveedores
Route::resource('proveedores', ProveedoresController::class);

// Rutas para productos
Route::resource('productos', ProductosController::class);

