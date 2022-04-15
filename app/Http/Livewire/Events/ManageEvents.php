<?php

namespace App\Http\Livewire\Events;

use App\Models\Course;
use Livewire\Component;
use App\Models\Event;

class ManageEvents extends Component
{
    public $event_id, $name, $key_name, $description, $type, $place, $url, $maximum_people, $price, $is_free;

    public function render()
    {
        $events = Event::latest('id')->get();
        return view('livewire.events.manage-events', compact('events'));
    }

    public function edit(Event $event){
        $this->name = $event->name;
        $this->event_id   = $event->id;
    }

    public function updateEnabled($eventID, $value){
        $event = Event::find($eventID);

        $event->update([
            'enabled' => $value
        ]);

        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> ($value == 1) ? 'Evento activado con éxito.' : 'Evento desactivado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
    }

    public function delete($eventId){
        $result = Event::find($eventId)->delete();

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Evento eliminado.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }
    }
}
