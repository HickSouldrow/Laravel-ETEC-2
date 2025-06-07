<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\CursosController;
use App\Http\Controllers\DepartamentosController;
use App\Http\Controllers\ContatoController;

Route::get('/', function () {
    return view('Bem-Vindo a Etec Zona Leste');
});
    Route::get('/', [PrincipalController::class, 'home'])->name('site.home');
    Route::get('/departamentos', [PrincipalController::class, 'departamentos'])->name('site.departamentos');
    Route::get('/contato', [PrincipalController::class, 'contato'])->name('site.contato');
    Route::get('/cursos', [PrincipalController::class, 'cursos'])->name('site.cursos');
    Route::get('/termos', [PrincipalController::class, 'termos'])->name('site.termos');
    Route::get('/politica', [PrincipalController::class, 'politica'])->name('site.politica');
    Route::get('/sobre', [PrincipalController::class, 'sobre'])->name('site.sobre');
    



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
