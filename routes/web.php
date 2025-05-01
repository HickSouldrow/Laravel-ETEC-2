<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;

Route::get('/', [PrincipalController::class, 'home'])->name('site.home');
Route::get('/departamentos', [PrincipalController::class, 'departamentos'])->name('site.departamentos');
Route::get('/contato', [PrincipalController::class, 'contato'])->name('site.contato');
Route::get('/cursos', [PrincipalController::class, 'cursos'])->name('site.cursos');
