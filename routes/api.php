<?php

use App\Http\Controllers\AlarmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ClienteInteresController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoDetalleController;
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
    Route::get('/users', [UserController::class, 'index']);

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

    Route::get('/clientes', [ClienteController::class, 'index']);
    Route::post('/clientes', [ClienteController::class, 'store']);
    Route::get('/clientes/{id}', [ClienteController::class, 'show']);
    Route::put('/clientes/{id}', [ClienteController::class, 'update']);
    Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

    Route::get('/clientesInteres', [ClienteInteresController::class, 'index']);
    Route::post('/clientesInteres', [ClienteInteresController::class, 'store']);
    Route::get('/clientesInteres/{id}', [ClienteInteresController::class, 'show']);
    Route::put('/clientesInteres/{id}', [ClienteInteresController::class, 'update']);
    Route::delete('/clientesInteres/{id}', [ClienteInteresController::class, 'destroy']);

    Route::get('/pedido', [PedidoController::class, 'index']);
    Route::post('/pedido', [PedidoController::class, 'store']);
    Route::get('/pedido/{id}', [PedidoController::class, 'show']);
    Route::put('/pedido/{id}', [PedidoController::class, 'update']);
    Route::delete('/pedido/{id}', [PedidoController::class, 'destroy']);

    Route::get('/pedidoDetalle', [PedidoDetalleController::class, 'index']);
    Route::post('/pedidoDetalle', [PedidoDetalleController::class, 'store']);
    Route::get('/pedidoDetalle/{id}', [PedidoDetalleController::class, 'show']);
    Route::put('/pedidoDetalle/{id}', [PedidoDetalleController::class, 'update']);
    Route::delete('/pedidoDetalle/{id}', [PedidoDetalleController::class, 'destroy']);
    Route::delete('/pedidoDetalle/ByPedido/{id}', [PedidoDetalleController::class, 'destroyIdPedido']);

    Route::get('/alarma', [AlarmaController::class, 'index']);
    Route::post('/alarma', [AlarmaController::class, 'store']);
    Route::get('/alarma/{id}', [AlarmaController::class, 'show']);
    Route::put('/alarma/{id}', [AlarmaController::class, 'update']);
    Route::delete('/alarma/{id}', [AlarmaController::class, 'destroy']);

});
