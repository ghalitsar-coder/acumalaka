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
use Illuminate\Support\Facades\Route;

// Redirect root to books index
Route::get('/', function () {
    return redirect()->route('reservation.index');
});

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    
    // Books Routes - Protected by authentication
    Route::resource('rooms', RoomController::class);
    Route::resource('books', BookController::class);
    Route::resource('guests', GuestController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('reservation_services', ReservationServiceController::class);


});