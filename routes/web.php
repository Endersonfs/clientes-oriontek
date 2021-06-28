<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;

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
//lista de rutas de los usuarios
Route::get('/usuarios',[UsuariosController::class,'lista'])->name('usuaios.lista');
Route::get('/usuario/crear',[UsuariosController::class,'crearusuario'])->name('usuaios.crear');
Route::post('/usuario/crear',[UsuariosController::class,'guardarusuarios'])->name('usuarios.guardar');
Route::get('/usuario/{detallesid}',[UsuariosController::class,'usuariodetalles'])->name('usuarios.detalles');
