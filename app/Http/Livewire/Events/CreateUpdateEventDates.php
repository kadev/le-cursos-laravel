<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Models\EventDates;
use Livewire\Component;

class CreateUpdateEventDates extends Component
{
    public $event_id, $start_datetime, $end_datetime;

    protected $rules = [
        'event_id' => 'required',
        'start_datetime' => 'required'
    ];

    protected $messages = [
        'event_id.required' => 'El campo evento es obligatorio',
        'start_datetime.required' => 'La Fecha de inicio es obligatorio',
    ];

    public function mount($event_id)
    {
        $this->event_id = $event_id;
    }

    public function render()
    {
        return view('livewire.events.create-update-event-dates');
    }

    public function store()
    {
        $this->validate();

        EventDates::create([
            'event_id' => $this->event_id,
            'start_datetime' => $this->start_datetime,
            'end_datetime' => $this->end_datetime
        ]);

        $this->reset(['start_datetime', 'end_datetime']);
        $this->emit('EventDatesRefresh');
        $this->dispatchBrowserEvent('hide-create-date-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Nueva fecha creada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);

    }
}
