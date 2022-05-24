<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'class_id',
        'course_code',
        'desc',
        'units',
        'teacher_id'
    ];
}
