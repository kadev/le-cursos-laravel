<?php

namespace App\Http\Livewire\Events;

use App\Helpers\Helper;
use App\Models\EventDates;
use Livewire\Component;

class ManageEventDates extends Component
{
    public $listeners = ['EventDatesRefresh' => 'render'];
    public $event_id, $event_dates, $months;

    public function mount($event_id)
    {
        $this->event_id = $event_id;
        $this->months = Helper::getMonthsInES();
    }

    public function render()
    {
        $this->event_dates = EventDates::where("event_id", $this->event_id)->orderBy('id', 'desc')->get();

        return view('livewire.events.manage-event-dates');
    }

    public function delete($eventDateId){
        if(EventDates::find($eventDateId)->delete()){
            $this->dispatchBrowserEvent('snackbar-success', [
                'text'=> 'Fecha eliminada con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }
    }
}
