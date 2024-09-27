<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PregnanacyController;
use App\Http\Controllers\PregnancyVisitController;
use App\Models\SocialsHx;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index.dashboard');

Route::get('/pregnancy', [PregnanacyController::class, 'index'])->name('pregnanacy.index');
Route::get('/pregnanacy/show', [PregnanacyController::class, 'SearchByPHN'])->name('pregnanacy.show');
Route::post('/complaints', [PregnanacyController::class, 'store'])->name('complaints.store');
Route::get('/search', [PregnanacyController::class, 'search'])->name('patient.search');

Route::get('/pregnancyVisit', [PregnancyVisitController::class, 'index'])->name('pregnanacyVisit.index');