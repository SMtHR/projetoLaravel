<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/lista', [ProdutoController::class, 'index'])->name('lista.index');
Route::get('/lista/adicionar', [ProdutoController::class, 'adicionarProduto'])->name('lista.adicionar');
//Route::get('/lista/{id}', [ProdutoController::class, 'detalhes'])->name('lista.detalhes'); //Sem Route Model Binding
Route::get('/lista/{produto}', [ProdutoController::class, 'detalhes'])->name('lista.detalhes'); //Com Route Model Binding
Route::post('/lista',[ProdutoController::class, 'guardarDados'])->name('lista.guardarDados');
//Route::delete('/lista/{id}',[ProdutoController::class, 'deletarDado'])->name('lista.deletarDado'); //Sem Route Model Binding
Route::delete('/lista/{produto}',[ProdutoController::class, 'deletarDado'])->name('lista.deletarDado'); //Com Route Model Binding
