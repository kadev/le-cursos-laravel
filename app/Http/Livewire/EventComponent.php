<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Event;

class EventComponent extends Component
{
    public $event_id, $name, $key_name, $description, $type, $place, $url, $maximum_people, $price, $is_free;

    public function render()
    {
        $events = Event::latest('id')->get();
        return view('livewire.event-component', compact('events'));
    }

    public function store(){
        Event::create([
            'name' =>    $this->name,
            'key_name' => $this->key_name,
            'description' => $this->description,
            'type' => $this->type,
            'place' => $this->place,
            'url' => $this->url,
            'maximum_people' => $this->maximum_people,
            'price' => $this->price,
            'is_free' => $this->is_free
        ]);

        $this->reset(['name', 'key_name', 'description', 'type', 'place', 'url', 'maximum_people', 'price', 'is_free']);
    }

    public function edit(Event $event){
        $this->name = $event->name;
        $this->event_id   = $event->id;
    }

    public function update(){
        $event = Event::find($this->event_id);
        $event->update([
            'name' =>    $this->name,
            'key_name' => $this->key_name,
            'description' => $this->description,
            'type' => $this->type,
            'place' => $this->place,
            'url' => $this->url,
            'maximum_people' => $this->maximum_people,
            'price' => $this->price,
            'is_free' => $this->is_free
        ]);
    }

    public function delete($eventId){
        Event::find($eventId)->delete();
        session()->flash('message','Evento eliminado de forma éxitosa.');
    }
}
