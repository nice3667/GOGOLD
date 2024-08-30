<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TwoFactorController;
use App\Http\Controllers\User\UserController;


// Route::get('/login', function () {
//   return Inertia::render('HomePage');
// });
//homepage
Route::get('/home', function () {
  return Inertia::render('HomePage');
})->name('test');
Route::get('/stats', function () {
  return Inertia::render('StatsPage');
});
Route::get('/learn', function () {
  return Inertia::render('LearnPage');
});
Route::get('/about', function () {
  return Inertia::render('AboutPage');
});
Route::get('/orderhistory', function () {
  return Inertia::render('OrderhistoryPage');
});
//eng

//Admin Dashboard
Route::get('/admin/dashboard', function () {
  return Inertia::render('Admin/Layouts/AdminDashboard');
})->name('admindashboard');

Route::get('/admin/product', function () {
  return Inertia::render('Admin/Layouts/AdminProduct');
})->name('product');
Route::get('/admin/article', function () {
  return Inertia::render('Admin/Layouts/AdminArticle');
})->name('article');
Route::get('/admin/course', function () {
  return Inertia::render('Admin/Layouts/AdminCourse');
})->name('course');
Route::get('/admin/customer', function () {
  return Inertia::render('Admin/Layouts/AdminCustomer');
})->name('customer');
// Route::get('/admin/dashboard', function () {
//   return Inertia::render('AdminDashboard');
// })->name('dashboard');
Route::get('/admin/order', function () {
  return Inertia::render('Admin/Layouts/AdminOrder');
})->name('order');
Route::get('/admin/package', function () {
  return Inertia::render('Admin/Layouts/AdminPackage');
})->name('package');
Route::get('/admin/report', function () {
  return Inertia::render('Admin/Layouts/AdminReport');
})->name('report');
Route::get('/admin/setting', function () {
  return Inertia::render('Admin/Layouts/AdminSetting');
})->name('setting');


//eng


Route::get('/', [UserController::class, 'index'])->name('home');
Route::get('/OtpCode', [TwoFactorController::class, 'index'])->name('otp');
Route::post('/check-otp/store', [TwoFactorController::class, 'store'])->name('otp.store');
Route::get('/style-guide', function () {
  return Inertia::render('style-guide');
});

Route::get('/dashboard', function () {
  Log::info('dashboard');
  return Inertia::render('Dashboard');
})->middleware(['auth', 'verified',])->name('dashboard');

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
  Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';