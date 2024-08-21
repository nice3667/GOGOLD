<?php

use App\Http\Controllers\StudycoursesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Api\BankAccountController;



//user
Route::post("register", [ApiController::class, "register"]);

Route::put('/users', [UserController::class, 'update']);

Route::post('password/set', [PasswordController::class, 'setPassword']);

Route::post('/user/bank/account/info', [UserController::class, 'updateBankAccountInfo']);

Route::put('/user/status', [UserController::class, 'updateStatus']);

Route::delete('/users', [UserController::class, 'destroy']);

Route::post('/user', [UserController::class, 'getUserById']);

Route::get('/users', [UserController::class, 'getAllUsers']);
//User end

//Bank
Route::post('/bank/add', [BankAccountController::class, 'store']);

Route::put('/bank/update', [BankAccountController::class, 'update']);

Route::post('/bank/detail', [BankAccountController::class, 'getBankById']);

Route::get('/bank/detailAll', [BankAccountController::class, 'getAllBank']);

//end Bank
//package
Route::post('/packages/add', [PackageController::class, 'store']);

Route::put('/packages/update', [PackageController::class, 'update']);

Route::delete('/packages/delete', [PackageController::class, 'destroy']);

Route::get('/packages/get', [PackageController::class, 'show']);

Route::get('/packages/getlist', [PackageController::class, 'index']);

//end package

//buy package

Route::post('/payment', [PaymentController::class, 'store']);

Route::post('/payment/update', [PaymentController::class, 'update']);

//end buy package

//admin
Route::get('/admin/getlist', [AdminController::class, 'index']);

Route::post('/admin/add', [AdminController::class, 'store']);

Route::post('/admin/setPassword', [AdminController::class, 'setPassword']);

Route::get('/admin/get', [AdminController::class, 'show']);

Route::put('/admin/update', [AdminController::class, 'update']);

Route::put('/admin/updateStatus', [AdminController::class, 'updateStatus']);

Route::delete('/admin/delete', [AdminController::class, 'destroy']);

//studycourses

Route::post('/studycourses/add', [StudycoursesController::class, 'store']);

Route::post('/studycourses/update', [StudycoursesController::class, 'update']);

Route::post('/studycourses/delete', [StudycoursesController::class, 'destroy']);

Route::get('/studycourses/details', [StudycoursesController::class, 'show']);


//studycourses end