<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'id',
        'name',
        'key_name',
        'image',
        'description',
        'type',
        'place',
        'url',
        'maximum_people',
        'price',
        'is_free',
        'enabled',
        'short_description',
        'page_cover',
        'page_main_color',
        'access_comments'
    ];

    public function EventDates(){
        return $this->hasMany(EventDates::class)->orderBy('start_datetime', 'desc');
    }

    public function EventRegistration(){
        return $this->hasMany(EventRegistration::class);
    }
}
