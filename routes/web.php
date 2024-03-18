<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BonificacionController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprasController;
use App\Http\Controllers\DetalleCompraController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\EgresoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IngresoController;
use App\Http\Controllers\MovientoContableController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;


Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('categorias', CategoriaController::class);
Route::resource('clientes', ClienteController::class);
Route::resource('proveedores', ProveedorController::class);
Route::resource('movimientos', MovientoContableController::class);
Route::resource('productos', ProductoController::class);
Route::resource('ventas', VentaController::class);
Route::resource('detalle-ventas', DetalleVentaController::class);
Route::resource('ingresos', IngresoController::class);
Route::resource('bonificaciones', BonificacionController::class);
Route::resource('compras', ComprasController::class);
Route::resource('detalle-compras', DetalleCompraController::class);
Route::resource('egresos', EgresoController::class);