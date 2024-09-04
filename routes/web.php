<?php

use App\Http\Controllers\IndexController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/visit', function () {
    return view('pages.visitIndex');
});

Route::post('/complaints', [IndexController::class, 'store'])->name('complaints.store');
Route::get('/search', [IndexController::class, 'search'])->name('patient.search');

