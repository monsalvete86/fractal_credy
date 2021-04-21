<?php
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function (){

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/clientes', function () {
        return view('admin.clientes');
    })->name('clientes');

    Route::get('/creditos', function () {
        return view('admin.creditos');
    })->name('creditos');  
    
    Route::get('/pagos', function () {
        return view('admin.pagos');
    })->name('pagos');

    Route::get('/proveedores', function () {
        return view('admin.proveedores');
    })->name('proveedores');

    Route::get('/navigation-menus', function () {
        return view('layouts.navigation-menus');
    })->name('navigation-menus');
});

