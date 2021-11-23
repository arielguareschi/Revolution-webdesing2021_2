<?php

use App\Http\Controllers\CategoriasController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\NoticiafotosController;
use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\UsersController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('usuarios', UsersController::class);
Route::resource('categorias', CategoriasController::class);
Route::resource('noticias', NoticiasController::class);


Route::get('noticiafotos/{id}', [NoticiafotosController::class, 'index']);
Route::get('noticiafotos/{id}/{foto}', [NoticiafotosController::class, 'show']);
Route::post('noticiafotos/{id}', [NoticiafotosController::class, 'store']);
Route::patch('noticiafotos/{id}/{foto}', [NoticiafotosController::class, 'update']);
Route::delete('noticiafotos/{id}', [NoticiafotosController::class, 'destroy']);

Route::get('contato', [ContatoController::class, 'index']);
Route::post('contato/enviar', [ContatoController::class, 'enviar']);
