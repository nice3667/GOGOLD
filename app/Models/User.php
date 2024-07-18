<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',
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
        $this->timestamps = false;
        $this->otp_code = rand(1000, 9999);
        $this->expire_at = now()->addMinutes(15);
        $this->save();

    }
}