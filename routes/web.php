<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PregnanacyController;
use App\Http\Controllers\PregnancyVisitController;
use App\Http\Controllers\SocialsHxController;
use App\Models\SocialsHx;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('index.dashboard');

Route::get('/pregnancy', [PregnanacyController::class, 'index'])->name('pregnanacy.index');
Route::get('/pregnanacy/show', [PregnanacyController::class, 'SearchByPHN'])->name('pregnanacy.show');
Route::post('/complaints', [PregnanacyController::class, 'store'])->name('complaints.store');
Route::get('/search', [PregnanacyController::class, 'search'])->name('patient.search');

Route::get('/pregnancyVisit', [PregnanacyController::class, 'index'])->name('pregnanacyVisit.index');

Route::get('/textIndex', [SocialsHxController::class, 'index'])->name('test.index');
Route::post('/textStore', [SocialsHxController::class, 'store'])->name('test.store');