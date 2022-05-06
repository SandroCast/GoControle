<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\HomeController;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');

Route::get('/estoque/novo', [MasterController::class, 'endereco_novo'])->name('endereco_novo')->middleware('auth');
Route::post('/estoque/novo/criar', [MasterController::class, 'endereco_criar'])->name('endereco_criar')->middleware('auth');
Route::get('/estoque/enderecos', [MasterController::class, 'enderecos_lista'])->name('enderecos_lista')->middleware('auth');
Route::get('/estoque/endereco/editar/{id}', [MasterController::class, 'endereco_editar'])->name('endereco_editar')->middleware('auth');
Route::post('/estoque/endereco/update/{id}', [MasterController::class, 'endereco_update'])->name('endereco_update')->middleware('auth');
Route::post('/estoque/endereco/delete/{id}', [MasterController::class, 'endereco_delete'])->name('endereco_delete')->middleware('auth');
Route::get('/estoque/buscar', [MasterController::class, 'buscar'])->name('buscar')->middleware('auth');
Route::post('/estoque/retirar/{url}/{id}', [MasterController::class, 'retirar'])->name('retirar')->middleware('auth');
Route::get('/estoque/alocar', [MasterController::class, 'alocar'])->name('alocar')->middleware('auth');
Route::get('/estoque/movimentacoes', [MasterController::class, 'movimentacoes'])->name('movimentacoes')->middleware('auth');

Route::get('/estoque/lista', [MasterController::class, 'estoque_lista'])->name('estoque_lista')->middleware('auth');

Route::get('/codigo', [MasterController::class, 'codigo'])->name('codigo')->middleware('auth');
Route::post('/codigo/update', [MasterController::class, 'codigo_update'])->name('codigo_update')->middleware('auth');

Route::get('/reposicao', [MasterController::class, 'reposicao'])->name('reposicao')->middleware('auth');