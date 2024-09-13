<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard', function () {
  return Inertia::render('admin/Layouts/AdminDashboard');
})->name('admindashboard');

Route::get('/admin/product', function () {
  return Inertia::render('admin/Layouts/AdminProduct');
})->name('product');
Route::get('/admin/article', function () {
  return Inertia::render('admin/Layouts/AdminArticle');
})->name('article');
Route::get('/admin/course', function () {
  return Inertia::render('admin/Layouts/AdminCourse');
})->name('course');
Route::get('/admin/customer', function () {
  return Inertia::render('admin/Layouts/AdminCustomer');
})->name('customer');

Route::get('/admin/order', function () {
  return Inertia::render('admin/Layouts/AdminOrder');
})->name('order');
Route::get('/admin/package', function () {
  return Inertia::render('admin/Layouts/AdminPackage');
})->name('package');
Route::get('/admin/report', function () {
  return Inertia::render('admin/Layouts/AdminReport');
})->name('report');
Route::get('/admin/setting', function () {
  return Inertia::render('admin/Layouts/AdminSetting');
})->name('setting');
