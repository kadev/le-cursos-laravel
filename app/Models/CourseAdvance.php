<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseAdvance extends Model
{
    use HasFactory;
    protected $table = 'course_advance';
    protected $fillable = [
        'id',
        'class_id',
        'user_id',
        'status'
    ];
}
