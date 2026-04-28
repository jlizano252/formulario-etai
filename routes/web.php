<?php

use App\Http\Controllers\PostulationController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

// Formulario público de registro de estudiantes
Route::get('/', [PostulationController::class, 'index'])->name('public.postularse.index');

// Páginas de resultado
Route::get('/register/success', [RegisterController::class, 'emailViewTest'])->name('public.register.success');
Route::get('/register/error',   [RegisterController::class, 'emailViewError'])->name('public.register.error');
