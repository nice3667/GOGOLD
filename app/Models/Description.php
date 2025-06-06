<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Description extends Model
{
  use HasFactory;

  protected $fillable = [
    'package_id',
    'description',
  ];

  public function package()
  {
    return $this->belongsTo(Package::class);
  }
}