<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;

Route::get('/', [UserController::class, 'index'])->name('home');

Route::get('/stats', function () {
  return Inertia::render('StatsPage');
})->name('StatsPage');

Route::get('/learn', function () {
  return Inertia::render('LearnPage');
})->name('LearnPage');

Route::get('/about', function () {
  return Inertia::render('AboutPage');
})->name('AboutPage');

Route::get('/orderhistory', function () {
  return Inertia::render('OrderhistoryPage');
})->name('OrderhistoryPage');
//eng
