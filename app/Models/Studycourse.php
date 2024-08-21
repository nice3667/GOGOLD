<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Studycourse extends Model
{
    protected $table = 'studycourses';
    protected $fillable = [
        'course_name',
        'descriptions',
        'course_img',
        'course_vidio',
    ];

    protected $primaryKey = 'course_id'; // course_id เป็น primary key
    public $incrementing = true; // primary key
    protected $keyType = 'int'; // ตั้งประเภทของคอลัมน์ primary key
}
