<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Api\BankAccountController;



//user
Route::post("register", [ApiController::class, "register"]);

Route::put('/users/{id}', [UserController::class, 'update']);

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

Route::get('/bank/detail', [BankAccountController::class, 'getAllBank']);
//end Bank
