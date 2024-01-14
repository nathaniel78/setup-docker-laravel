<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutosController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::prefix('produtos')->group( function() {
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/cadastrar', [ProdutosController::class, 'cadastrar'])->name('produto.cadastrar');
    Route::post('/cadastrar', [ProdutosController::class, 'cadastrar'])->name('produto.cadastrar');
    Route::get('/atualizar/{id}', [ProdutosController::class, 'atualizar'])->name('produto.atualizar');
    Route::put('/atualizar/{id}', [ProdutosController::class, 'atualizar'])->name('produto.editar');
    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});

Route::prefix('clientes')->group( function() {
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cadastrar', [ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
    Route::post('/cadastrar', [ClienteController::class, 'cadastrar'])->name('cliente.cadastrar');
    Route::get('/atualizar/{id}', [ClienteController::class, 'atualizar'])->name('cliente.atualizar');
    Route::put('/atualizar/{id}', [ClienteController::class, 'atualizar'])->name('cliente.editar');
    Route::delete('/delete', [ClienteController::class, 'delete'])->name('cliente.delete');
});