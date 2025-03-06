<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdutoController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/register', 'showRegister')->name('show.register');
    Route::get('/login', 'showLogin')->name('show.login');
    Route::post('/register', 'register')->name('register');
    Route::post('/login', 'login')->name('login');
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/lista',[ProdutoController::class, 'index'])->name('lista.index');
Route::middleware('auth')->controller(ProdutoController::class)->group(function () {
    Route::get('/lista/adicionar', 'adicionarProduto')->name('lista.adicionar');
    Route::get('/lista/{produto}','detalhes')->name('lista.detalhes'); //Com Route Model Binding
    Route::post('/lista','guardarDados')->name('lista.guardarDados');
    Route::delete('/lista/{produto}','deletarDado')->name('lista.deletarDado'); //Com Route Model Binding
    //Route::get('/lista/{id}', [ProdutoController::class, 'detalhes'])->name('lista.detalhes'); //Sem Route Model Binding
    //Route::delete('/lista/{id}',[ProdutoController::class, 'deletarDado'])->name('lista.deletarDado'); //Sem Route Model Binding
    });
