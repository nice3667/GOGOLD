<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\User\UserController;

//homepage
Route::get('/home', function () {
    return Inertia::render('HomePage');
});
Route::get('/stats', function () {
    return Inertia::render('StatsPage');
});
Route::get('/learn', function () {
    return Inertia::render('LearnPage');
});
Route::get('/about', function () {
    return Inertia::render('AboutPage');
});
//eng

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/OtpCode', [TwoFactorController::class, 'index'])->name('otp');
Route::post('/check-otp/store', [TwoFactorController::class, 'store'])->name('otp.store');

Route::get('/style-guide', function () {
    return Inertia::render('style-guide');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
