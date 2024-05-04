<?php

use App\Http\Controllers\Carro\CarroController;
use App\Http\Controllers\Cliente\ClienteController;
use App\Http\Controllers\Locacao\LocacaoController;
use App\Http\Controllers\Marca\MarcaController;
use App\Http\Controllers\Modelo\ModeloController;
use App\Models\Locacao\Locacao;
use Illuminate\Support\Facades\Route;

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

Route::prefix('locadora/')->group(function () {

    Route::prefix('marca')->group(function () {
        Route::get('/', [MarcaController::class, 'index']);
        Route::post('/store', [MarcaController::class, 'store']);
        Route::get('/show/{id}', [MarcaController::class, 'show']);
        Route::put('/update/{id}', [MarcaController::class, 'update']);
        Route::delete('/delete/{id}', [MarcaController::class, 'delete']);
    });

    Route::prefix('modelo')->group(function () {
        Route::get('/', [ModeloController::class, 'index']);
        Route::post('/store', [ModeloController::class, 'store']);
        Route::get('/show/{id}', [ModeloController::class, 'show']);
        Route::put('/update/{id}', [ModeloController::class, 'update']);
        Route::delete('/delete/{id}', [ModeloController::class, 'delete']);
    });

    Route::prefix('carro')->group(function () {
        Route::get('/', [CarroController::class, 'index']);
        Route::post('/store', [CarroController::class, 'store']);
        Route::get('/show/{id}', [CarroController::class, 'show']);
        Route::put('/update/{id}', [CarroController::class, 'update']);
        Route::delete('/delete/{id}', [CarroController::class, 'delete']);
    });

    Route::prefix('cliente')->group(function () {
        Route::get('/', [ClienteController::class, 'index']);
        Route::post('/store', [ClienteController::class, 'store']);
        Route::get('/show/{id}', [ClienteController::class, 'show']);
        Route::put('/update/{id}', [ClienteController::class, 'update']);
        Route::delete('/delete/{id}', [ClienteController::class, 'delete']);
    });

    Route::prefix('locacao')->group(function () {
        Route::get('/', [LocacaoController::class, 'index']);
        Route::post('/store', [LocacaoController::class, 'store']);
        Route::get('/show/{id}', [LocacaoController::class, 'show']);
        Route::put('/update/{id}', [LocacaoController::class, 'update']);
        Route::delete('/delete/{id}', [LocacaoController::class, 'delete']);
    });
});
