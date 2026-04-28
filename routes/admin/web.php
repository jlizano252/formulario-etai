<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// Panel de administración
Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
