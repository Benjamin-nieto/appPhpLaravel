<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\AuthController;

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
});
