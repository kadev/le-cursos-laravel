<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseModules extends Model
{
    use HasFactory;
    protected $table = 'course_modules';
    protected $fillable = [
        'id',
        'title',
        'description',
        'course_id',
        'sort',
        'enabled',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the units for the module.
     */
    public function units()
    {
        return $this->hasMany(ModuleUnits::class, 'module_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
