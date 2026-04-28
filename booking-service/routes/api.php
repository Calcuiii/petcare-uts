<?php

use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/bookings', [BookingController::class, 'index']);
Route::get('/bookings/history/{userId}', [BookingController::class, 'historyByUser']);
Route::post('/bookings', [BookingController::class, 'store']);
Route::get('/health', function () {
    return response()->json([
        'status' => 'ok',
        'service' => 'booking'
    ]);
});
