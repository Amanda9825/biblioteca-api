<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;

Route::apiResource('autores', AutorController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('livros', LivroController::class);

Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->apiResource('usuarios', UsuarioController::class);