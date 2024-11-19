<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnimalController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\Api\Auth\AuthController;

Route::post('/users', [UserController::class,'completeStore'])->name('users.store');
Route::get('/users/create', [UserController::class,'create'])->name('users.create');


Route::middleware(['auth'])->group(function () {
    Route::get('/users', [UserController::class,'index']);

    Route::put('/users/edit/{id}', [UserController::class,'completeUpdate'])->name('users.update');
    Route::get('/users/edit/{id}', [UserController::class,'atualizar'])->name('users.atualizar');
    Route::get('/users/{id}', [UserController::class,'show'])->name('users.show');
    Route::delete('/users/{id}', [UserController::class,'destroy']);
    
    Route::post('/animals', [AnimalController::class,'store'])->name('animals.store');
    Route::get('/animals/create', [AnimalController::class,'create'])->name('animals.create');
    Route::get('/animals', [AnimalController::class,'index'])->name('animals.index');
    Route::get('/animals/{id}', [AnimalController::class,'show'])->name('animals.show');
    Route::put('/animals/{id}', [AnimalController::class,'update'])->name('animals.update');
    Route::get('/animals/edit/{id}', [AnimalController::class,'atualizar'])->name('animals.atualizar');
    Route::delete('/animals/{id}', [AnimalController::class,'destroy']);
    
    Route::post('/solicitacoes', [SolicitacaoController::class,'store'])->name('solicitacoes.store');
    
    Route::post('/solicitacoes/aceitar/{id}', [SolicitacaoController::class,'aceitarSolicitacao'])->name('solicitacoes.aceitar');
    Route::post('/solicitacoes/recusar/{id}', [SolicitacaoController::class,'recusarSolicitacao'])->name('solicitacoes.recusar');
    Route::get('/solicitacoes', [SolicitacaoController::class,'index'])->name('solicitacoes.index');
    Route::get('/solicitacoes/{id}', [SolicitacaoController::class,'show']);
    Route::put('/solicitacoes/{id}', [SolicitacaoController::class,'update']);
    Route::delete('/solicitacoes/{id}', [SolicitacaoController::class,'destroy']); 

    Route::get('/carrossel', [AnimalController::class,'carrossel'])->name('carrossel');
});

Route::get('/', function () {
    return redirect()->route('carrossel');
})->name('home');

Route::get('/home', function () {
    return redirect()->route('carrossel');;
})->name('home');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
