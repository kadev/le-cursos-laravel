<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventRegistration extends Model
{
    use HasFactory;
    protected $table = 'event_registration';
    protected $fillable = [
        'event_id',
        'event_date_id',
        'name',
        'age',
        'employment',
        'email',
        'cellphone_number',
        'city',
        'state',
        'country'
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }

    public function event_date(){
        return $this->belongsTo(EventDates::class);
    }
}
