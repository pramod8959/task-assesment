<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LocationController;
use App\Http\Middleware\checkUserId;
use App\Http\Middleware\checkOtp;

// Registration route
Route::get('/', [AuthController::class, 'showRegistrationForm']);
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::middleware(checkOtp::class)->group(function () {
    // OTP verification route
    Route::get('/verify', [AuthController::class, 'showVerificationForm'])->name('verify');
    Route::post('/verify', [AuthController::class, 'verify']);
    Route::get('/get-otp', [AuthController::class, 'getOtp'])->name('get-otp');
});

Route::middleware(checkUserId::class)->group(function () {
   //Location route
   Route::get('/dashboard', [LocationController::class, 'getLocation'])->name('dashboard');
   Route::get('/locations', [LocationController::class, 'showLocationForm'])->name('location.show');
   Route::post('/locations', [LocationController::class,'storeLocation'])->name('locations.store');
   Route::get('locations/{location}/edit', [LocationController::class, 'getedit'])->name('locations.edit');
   Route::post('locations/{location}/edit', [LocationController::class, 'updateLocation'])->name('locations.update');
   Route::get('locations/{location}/delete', [LocationController::class, 'deleteLocation'])->name('locations.delete');
});

//logout
Route::get('/logout',[AuthController::class,'logOut'])->name('logout');
