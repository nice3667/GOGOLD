<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\User\UserController;

require __DIR__ . '/guest.php';





// ------ user -----------------------------------


//User
Route::post('/api/update-profile', [ProfileController::class, 'updateProfile']);

Route::get('/dashboardd', function () {
  return Inertia::render('user/Layouts/UserDashboard');
})->name('UserDashboard');

Route::get('/account', function () {
  return Inertia::render('user/Layouts/UserAccount');
})->name('UserAccount');
Route::get('/account/profile', function () {
  return Inertia::render('user/Layouts/UserAccountProfile');
})->name('UserAccountProfile');
Route::get('/account/profile/bank', function () {
  return Inertia::render('user/Layouts/UserAccountProfileBank');
})->name('UserAccountProfileBank');
Route::get('/account/profile/package', function () {
  return Inertia::render('user/Layouts/UserAccountProfilePackage');
})->name('UserAccountProfilePackage');


Route::get('/course', function () {
  return Inertia::render('user/Layouts/UserCourse');
})->name('UserCourse');

Route::get('/homepage', function () {
  return Inertia::render('user/Layouts/UserHomepage');
})->name('UserHomepage');

Route::get('/statistics', function () {
  return Inertia::render('user/Layouts/UserStatistics');
})->name('UserStatistics');

Route::get('/order', function () {
  return Inertia::render('user/Layouts/UserOrder');
})->name('UserOrder');

//End
Route::get('/dashboard', function () {
  Log::info('dashboard');
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');


//eng


Route::get('/OtpCode', [TwoFactorController::class, 'index'])->name('otp');
Route::post('/check-otp/store', [TwoFactorController::class, 'store'])->name('otp.store');
Route::get('/style-guide', function () {
  return Inertia::render('style-guide');
});


Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin.php';