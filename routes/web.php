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
// Route::get('/', function () {
//     return auth()->check() ? redirect()->route('reservation.index') : redirect()->route('login');
// });

// Authentication Routes
// use Illuminate\Support\Facades\Auth;

// Route::get('/logout', function () {
//     Auth::logout(); // Log out the user

//     // Optionally, invalidate the session
//     session()->invalidate();
//     session()->regenerateToken();

//     // Redirect to the login page or anywhere else
//     return redirect('/login'); // Or any other route
// });
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware(['auth', 'guest'])->group(function () {
    Route::resource('hotels', RoomController::class);

    
    Route::get('/reservation-form', function () {
        return view('reservation.form');  // Guest reservation form view
    })->name('reservation.form');
    
    Route::get('/reservation-guest-detail', function () {
        return view('reservation.guest-detail');  // Guest detail page view
    })->name('reservation.guest-detail');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});


Route::middleware(['auth', 'admin'])->group(function () {
        Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


    Route::resource('rooms', RoomController::class);
    Route::resource('books', BookController::class);
    Route::resource('guests', GuestController::class);
    Route::resource('staff', StaffController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('payment', PaymentController::class);
    Route::resource('reservation', ReservationController::class);
    Route::resource('reservation_services', ReservationServiceController::class);
});


