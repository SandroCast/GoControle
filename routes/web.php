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









Route::get('/estoque/conferencia/dashboard', [EstoqueController::class, 'dashboard'])->name('estoque_dashboard')->middleware('auth');
Route::get('/estoque/conferencia/dashboard/itens/{grife}', [EstoqueController::class, 'dashboard_itens'])->name('estoque_dashboard_itens')->middleware('auth');

Route::get('/estoque', [EstoqueController::class, 'index'])->name('estoque')->middleware('auth');
Route::get('/estoque/alameda', [EstoqueController::class, 'show'])->name('estoque_alameda')->middleware('auth');
Route::get('/estoque/alameda/lote', [EstoqueController::class, 'lote_show'])->name('estoque_alameda_lote')->middleware('auth');
Route::get('/estoque/armazenamento/alocar', [EstoqueController::class, 'alocar'])->name('estoque_alocar')->middleware('auth');
Route::get('/estoque/armazenamento/enderecos', [EstoqueController::class, 'enderecos'])->name('estoque_enderecos')->middleware('auth');
Route::get('/estoque/armazenamento/enderecos/editar/{id}', [EstoqueController::class, 'editar'])->name('estoque_enderecos_editar')->middleware('auth');
Route::get('/estoque/armazenamento/enderecos/editar/excluir/{id}', [EstoqueController::class, 'excluir'])->name('estoque_enderecos_editar_excluir')->middleware('auth');
Route::post('/estoque/armazenamento/enderecos/editar/{id}', [EstoqueController::class, 'editar_store'])->name('estoque_enderecos_editar_store')->middleware('auth');

Route::post('/estoque/armazenamento/enderecos/novo/criar', [EstoqueController::class, 'criar'])->name('estoque_enderecos_novo_criar')->middleware('auth');
Route::get('/estoque/armazenamento/buscar', [EstoqueController::class, 'buscar'])->name('estoque_buscar')->middleware('auth');
Route::get('/estoque/armazenamento/retirar/{id}', [EstoqueController::class, 'retirar'])->name('estoque_retirar')->middleware('auth');


