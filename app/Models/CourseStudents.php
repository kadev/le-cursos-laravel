<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseStudents extends Model
{
    use HasFactory;
    protected $table = 'course_students';
    protected $fillable = [
        'id',
        'course_id',
        'user_id',
        'active',
        'created_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id', 'user_id');
    }
}
