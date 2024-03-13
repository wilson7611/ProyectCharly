<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MovientoContableController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('proveedores', ProveedorController::class);
Route::apiResource('movimientos', MovientoContableController::class);
Route::apiResource('productos', ProductoController::class);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
