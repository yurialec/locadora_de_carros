<?php

use App\Http\Controllers\Cliente\ClienteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('locadora/')->group(function () {
    Route::prefix('clientes')->group(function () {
        Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    });
});
