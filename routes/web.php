<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CreditoController;
use App\Http\Controllers\ClienteController;
use App\Http\Livewire\SuppliersController;
use App\Http\Controllers\ProveedorController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::get('usuarios', [UserController::class, 'list'])->name('usuarios');
});

Route::group(['middleware' => 'auth:sanctum', 'verified'], function () {
    Route::get('creditos', [CreditosController::class, 'main'])->name('creditos');
});

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Route::get('/supplier', function () {
    //     return view('supplier.lista');
    // })->name('supplier');

    // Route::view('clientes', 'clientes');
    // Route::get('clientes', [ClienteController::class, 'lista'])->name('clientes');
    // Route::get('suppliers', [SuppliersController::class, 'render'])->name('suppliers');
    Route::get('creditos', [CreditoController::class, 'list'])->name('creditos');
    Route::get('proveedores', [ProveedorController::class, 'lista'])->name('proveedores');

    // Route::get('/creditos', function () {
    //     return view('admin.creditos');
    // })->name('creditos');   

    Route::get('/pagos', function () {
        return view('admin.pagos');
    })->name('pagos');

    Route::view('suppliers', 'suppliers');

    //Route::get('/proveedores', function () {
    //    return view('admin.proveedores');
    //})->name('proveedores');

    Route::get('/navigation-menus', function () {
        return view('layouts.navigation-menus');
    })->name('navigation-menus');
});
