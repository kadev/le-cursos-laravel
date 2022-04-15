<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassResources extends Model
{
    use HasFactory;
    protected $table = 'class_resources';
    protected $fillable = [
        'class_id',
        'title',
        'type',
        'url'
    ];
}
