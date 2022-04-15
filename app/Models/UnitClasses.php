<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitClasses extends Model
{
    use HasFactory;
    protected $table = 'unit_classes';
    protected $fillable = [
        'id',
        'title',
        'description',
        'type',
        'url',
        'live_datetime',
        'live_instructions',
        'unit_id',
        'sort',
        'created_at',
        'updated_at'
    ];

    public function unit()
    {
        return $this->belongsTo(ModuleUnits::class);
    }

    public function course_advance()
    {
        return $this->hasOne(CourseAdvance::class, 'class_id')->orderBy('id', 'DESC');
    }

    public function resources()
    {
        return $this->hasMany(ClassResources::class, 'class_id');
    }

}
