<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_type',
        'bank',
        'account_name',
        'account_number',
        'price',
        'transferred_price',
        'transfer_date',
        'transfer_time',
        'reason',
        'proof_of_payment_path',
        'package_id',
        'bank_id'
    ];
}
