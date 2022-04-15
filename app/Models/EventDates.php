<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventDates extends Model
{
    use HasFactory;
    protected $table = 'event_dates';
    protected $fillable = [
        'event_id',
        'start_datetime',
        'end_datetime'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function EventRegistration(){
        return $this->hasMany(EventRegistration::class,'event_date_id');
    }
}
