<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $table = 'courses';
    protected $fillable = [
        'id',
        'title',
        'key_name',
        'short_description',
        'description',
        'category_id',
        'price',
        'discount_price',
        'is_free',
        'has_a_discount',
        'overview_provider',
        'overview_url',
        'thumbnail',
        'meta_keywords',
        'meta_description',
        'page_cover',
        'page_main_color',
        'featured',
        'enabled',
        'owner_id',
        'created_at',
        'updated_at'
    ];

    /**
     * Get the modules for the course.
     */
    public function modules()
    {
        return $this->hasMany(CourseModules::class, 'course_id');
    }
}
