<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationServiceController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Redirect root to login if no view is available
Route::get('/', function () {
    return view('landing.index'); // Landing page view
})->name('landing');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [RegisterController::class, 'register'])->name('register');

    
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Routes for guests
    Route::middleware('guest')->group(function () {
        Route::resource('hotels', RoomController::class);
        Route::get('/reservation-form', function () {
            return view('reservation.form'); // Guest reservation form view
        })->name('reservation.form');
        Route::get('/reservation-guest-detail', function () {
            return view('reservation.guest-detail'); // Guest detail page view
        })->name('reservation.guest-detail');

       
    });

    // Routes for admins
    Route::middleware('admin')->group(function () {
        Route::resource('rooms', RoomController::class);
        Route::resource('books', BookController::class);
        Route::resource('guests', GuestController::class);
        Route::resource('staff', StaffController::class);
        Route::resource('services', ServiceController::class);
        Route::resource('payment', PaymentController::class);
        Route::resource('reservation', ReservationController::class);
        Route::resource('reservation_services', ReservationServiceController::class);
    });
});
