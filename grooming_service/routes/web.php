<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroomingController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/grooming', [GroomingController::class, 'index'])->name('grooming.index');
Route::post('/grooming', [GroomingController::class, 'store'])->name('grooming.store');