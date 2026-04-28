<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GroomingController;
use App\Http\Controllers\BookingController;

// Welcome page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

// Protected routes
Route::middleware(['web', 'auth.session'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/grooming', [GroomingController::class, 'index'])->name('grooming.index');
    Route::post('/grooming', [GroomingController::class, 'store'])->name('grooming.store');
    Route::get('/booking', function () {
        return view('booking.index', [
            'user' => session('user')
        ]);
    })->name('booking.index');
    Route::get('/bookings/history', [BookingController::class, 'history'])->name('bookings.history');
});