<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class has_class_students extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'email',
        'subject_codes',
    ];
}
