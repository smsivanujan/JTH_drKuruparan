<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PregnanacyController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index.dashboard');

Route::get('/pregnancy', [PregnanacyController::class, 'index'])->name('pregnanacy.index');
Route::post('/complaints', [PregnanacyController::class, 'store'])->name('complaints.store');
Route::get('/search', [PregnanacyController::class, 'search'])->name('patient.search');

