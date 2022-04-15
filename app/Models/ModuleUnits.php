<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleUnits extends Model
{
    use HasFactory;
    protected $table = 'module_units';
    protected $fillable = [
        'id',
        'title',
        'description',
        'module_id',
        'sort',
        'enabled',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the classes for the units.
     */
    public function classes()
    {
        return $this->hasMany(UnitClasses::class, 'unit_id');
    }

    public function module()
    {
        return $this->belongsTo(CourseModules::class);
    }
}
