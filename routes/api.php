<?php

use App\Http\Controllers\Auth\AuthController;
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

    Route::middleware('jwt.auth')->group(function () {
        Route::middleware('acl')->group(function () {
            Route::prefix('marca')->group(function () {
                Route::get('/', [MarcaController::class, 'index'])->name('marca.index');
                Route::post('/store', [MarcaController::class, 'store'])->name('marca.store');
                Route::get('/show/{id}', [MarcaController::class, 'show'])->name('marca.show');
                Route::put('/update/{id}', [MarcaController::class, 'update'])->name('marca.update');
                Route::delete('/delete/{id}', [MarcaController::class, 'delete'])->name('marca.delete');
            });

            Route::prefix('modelo')->group(function () {
                Route::get('/', [ModeloController::class, 'index'])->name('modelo.index');
                Route::post('/store', [ModeloController::class, 'store'])->name('modelo.store');
                Route::get('/show/{id}', [ModeloController::class, 'show'])->name('modelo.show');
                Route::put('/update/{id}', [ModeloController::class, 'update'])->name('modelo.update');
                Route::delete('/delete/{id}', [ModeloController::class, 'delete'])->name('modelo.delete');
            });

            Route::prefix('carro')->group(function () {
                Route::get('/', [CarroController::class, 'index'])->name('carro.index');
                Route::post('/store', [CarroController::class, 'store'])->name('carro.store');
                Route::get('/show/{id}', [CarroController::class, 'show'])->name('carro.show');
                Route::put('/update/{id}', [CarroController::class, 'update'])->name('carro.update');
                Route::delete('/delete/{id}', [CarroController::class, 'delete'])->name('carro.delete');
            });

            Route::prefix('cliente')->group(function () {
                Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
                Route::post('/store', [ClienteController::class, 'store'])->name('cliente.store');
                Route::get('/show/{id}', [ClienteController::class, 'show'])->name('cliente.show');
                Route::put('/update/{id}', [ClienteController::class, 'update'])->name('cliente.update');
                Route::delete('/delete/{id}', [ClienteController::class, 'delete'])->name('cliente.delete');
            });

            Route::prefix('locacao')->group(function () {
                Route::get('/', [LocacaoController::class, 'index'])->name('locacao.index');
                Route::post('/store', [LocacaoController::class, 'store'])->name('locacao.store');
                Route::get('/show/{id}', [LocacaoController::class, 'show'])->name('locacao.show');
                Route::put('/update/{id}', [LocacaoController::class, 'update'])->name('locacao.update');
                Route::delete('/delete/{id}', [LocacaoController::class, 'delete'])->name('locacao.delete');
            });
        });

        //AUTH
        Route::prefix('auth')->group(function () {
            Route::get('me', [AuthController::class, 'me'])->name('auth.me');
            Route::get('refresh', [AuthController::class, 'refresh']);
        });
    });
    
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::post('login', [AuthController::class, 'login']);
});
