<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroomingController;

Route::get('/groomings', [GroomingController::class, 'index']);
Route::get('/groomings/{id}', [GroomingController::class, 'show']);
Route::post('/groomings', [GroomingController::class, 'store']);
Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'service' => 'grooming']);
});
Route::get('/api/services', [GroomingController::class, 'apiServices']);