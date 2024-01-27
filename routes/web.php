<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VendaController;
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

Route::prefix('dashboard')->group( function() {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
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

Route::prefix('vendas')->group( function() {
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');
    Route::get('/cadastrar', [VendaController::class, 'cadastrar'])->name('venda.cadastrar');
    Route::post('/cadastrar', [VendaController::class, 'cadastrar'])->name('venda.cadastrar');
    Route::get('/atualizar/{id}', [VendaController::class, 'atualizar'])->name('venda.atualizar');
    Route::put('/atualizar/{id}', [VendaController::class, 'atualizar'])->name('venda.editar');
    Route::delete('/delete', [VendaController::class, 'delete'])->name('venda.delete');
    Route::get('/comprovante/{id}', [VendaController::class, 'enviarComprovanteEmail'])->name('venda.comprovante');
});

Route::prefix('usuarios')->group( function() {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuario.index');
    Route::get('/cadastrar', [UsuarioController::class, 'cadastrar'])->name('usuario.cadastrar');
    Route::post('/cadastrar', [UsuarioController::class, 'cadastrar'])->name('usuario.cadastrar');
    Route::get('/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('usuario.atualizar');
    Route::put('/atualizar/{id}', [UsuarioController::class, 'atualizar'])->name('usuario.editar');
    Route::delete('/delete', [UsuarioController::class, 'delete'])->name('usuario.delete');
    Route::get('/comprovante/{id}', [UsuarioController::class, 'enviarComprovanteEmail'])->name('usuario.comprovante');
});