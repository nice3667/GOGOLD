<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  use HasFactory, Notifiable;


  protected $fillable = [
    'firstname',
    'lastname',
    'email',
    'phone',
    'password',
    'unhashed_password',
    'otp_code',
    'expire_at',
    'bank_account_name',
    'bank_name',
    'bank_account_number',
    'status'
  ];


  protected $hidden = [
    'password',
    'remember_token',
  ];


  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  public function generateCode()
  {
    Log::info('test2');

    $this->timestamps = false;
    $this->otp_code = rand(10000, 99999);
    $this->expire_at = now()->addMinutes(15);
    $this->save();
    Log::info('test3');

  }
}