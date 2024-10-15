<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocPurchase extends Model
{
  use HasFactory;

  protected $fillable = [
    'package_id',
    'price',
    'discount',
    'total_amount_to_be_paid',
    'payment_channels',
    'account_number',
    'bank_name',
    'account_name',
    'transfer_money',
    'transfer_date',
    'transfer_time',
    'image_path',
  ];
}