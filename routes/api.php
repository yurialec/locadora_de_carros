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

Route::apiResource('cliente', ClienteController::class);
Route::apiResource('carro', CarroController::class);
Route::apiResource('locacao', LocacaoController::class);
Route::apiResource('marca', MarcaController::class);
Route::apiResource('modelo', ModeloController::class);
