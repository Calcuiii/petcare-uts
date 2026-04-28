<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroomingController;

Route::get('/health', function () {
    return response()->json(['status' => 'ok', 'service' => 'grooming']);
});
Route::get('/api/services', [GroomingController::class, 'apiServices']);
