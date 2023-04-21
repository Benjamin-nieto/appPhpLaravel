<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ProductoCategoriaController;
use App\Http\Controllers\ProductoController;

use App\Http\Controllers\RolController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [App\Http\Controllers\Auth\AuthController::class, 'register']);

Route::post('login', [App\Http\Controllers\Auth\AuthController::class, 'login']);


Route::middleware(['jwt.verify'])->group(function () {
    // rutas protegidas
    Route::get('mensaje', function () {
        return "OK";
    });
    Route::get('users', [UserController::class, 'index']);

    Route::get('/roles', [RolController::class, 'index']);
    Route::post('/roles', [RolController::class, 'store']);
    Route::get('/roles/{id}', [RolController::class, 'show']);
    Route::put('/roles/{id}', [RolController::class, 'update']);
    Route::delete('/roles/{id}', [RolController::class, 'destroy']);

    Route::get('/productoCategoria', [ProductoCategoriaController::class, 'index']);
    Route::post('/productoCategoria', [ProductoCategoriaController::class, 'store']);
    Route::get('/productoCategoria/{id}', [ProductoCategoriaController::class, 'show']);
    Route::put('/productoCategoria/{id}', [ProductoCategoriaController::class, 'update']);
    Route::delete('/productoCategoria/{id}', [ProductoCategoriaController::class, 'destroy']);

    Route::get('/productos', [ProductoController::class, 'index']);
    Route::post('/productos', [ProductoController::class, 'store']);
    Route::get('/productos/{id}', [ProductoController::class, 'show']);
    Route::put('/productos/{id}', [ProductoController::class, 'update']);
    Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

    Route::get('/categorias', [CategoriaController::class, 'index']);
    Route::post('/categorias', [CategoriaController::class, 'store']);
    Route::get('/categorias/{id}', [CategoriaController::class, 'show']);
    Route::put('/categorias/{id}', [CategoriaController::class, 'update']);
    Route::delete('/categorias/{id}', [CategoriaController::class, 'destroy']);
});
