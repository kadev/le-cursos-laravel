<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Models\EventDates;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUpdate extends Component
{
    use WithFileUploads;

    public $activity;
    public $createStatus = null, $image = null, $updatedImage = false;
    public $event_id, $name, $key_name, $description, $type, $place, $url, $maximum_people, $price, $is_free;
    public $short_description, $page_cover = null, $page_main_color, $access_comments;

    protected $rules = [
        'name' => 'required',
        'key_name' => 'required|unique:events',
        'type' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'key_name.required' => 'El campo clave es obligatorio',
        'key_name.unique' => 'Ya existe esta clave en la base de datos, elige otro.',
        'type' => 'El campo tipo es obligatorio'
    ];

    public function mount($activity, $event_id)
    {
        $this->activity = $activity;
        $this->page_main_color = "#FF851B";

        if($this->activity == "update"){
            $event = Event::find($this->event_id);

            $this->name = $event->name;
            $this->key_name = $event->key_name;
            $this->image = $event->image;
            $this->description = $event->description;
            $this->type = $event->type;
            $this->place = $event->place;
            $this->url = $event->url;
            $this->maximum_people = $event->maximum_people;
            $this->price = $event->price;
            $this->is_free = $event->is_free;
            $this->short_description = $event->short_description;
            $this->page_cover = $event->page_cover;
            $this->page_main_color = $event->page_main_color;
            $this->access_comments = $event->access_comments;
        }
    }

    public function render()
    {
        if($this->is_free == 1){
            $this->price = 0;
        }

        return view('livewire.events.create-update');
    }

    public function updatedImage()
    {
        //$this->avatar = $this->avatar->temporaryUrl();
        //$this->updatedImage = true;
        $this->validate([
            'image' => 'image|max:5000', // 1MB Max
        ]);

        //$this->dispatchBrowserEvent('reload-dropify', $this->image->temporaryUrl());
    }

    public function updatedPage_cover()
    {
        $this->validate([
            'image' => 'image|max:5000', // 1MB Max
        ]);
    }

    public function store()
    {
        $this->validate(['name' => 'required', 'key_name' => 'required', 'type' => 'required']);

        if(method_exists($this->image, "store")){
            $imgName = $this->image->store('events', 'public');
        }else{
            $imgName = $this->image;
        }

        if(method_exists($this->page_cover, "store")){
            $imgCover = $this->page_cover->store('events', 'public');
        }else{
            $imgCover = $this->page_cover;
        }

        $result = $event = Event::create([
            'name' =>    $this->name,
            'key_name' => $this->key_name,
            'image' => $imgName,
            'description' => $this->description,
            'type' => $this->type,
            'place' => $this->place,
            'url' => $this->url,
            'maximum_people' => $this->maximum_people,
            'price' => $this->price,
            'is_free' => $this->is_free,
            'short_description' => $this->short_description,
            'page_cover' => $imgCover,
            'page_main_color' => $this->page_main_color,
            'access_comments' => $this->access_comments
        ]);

        if($result){
            $this->reset(['name', 'key_name', 'description', 'type', 'place', 'url', 'maximum_people', 'price', 'is_free']);
            $this->dispatchBrowserEvent('create-success-alert');
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }
    }

    public function update()
    {
        $event = Event::find($this->event_id);

        //if($this->updatedImage == true){
        $this->validate(['name' => 'required', 'key_name' => 'required', 'type' => 'required']);

        if(method_exists($this->image, "store")){
            $imgName = $this->image->store('events', 'public');
        }else{
            $imgName = $this->image;
        }

        if(method_exists($this->page_cover, "store")){
            $imgCover = $this->page_cover->store('events', 'public');
        }else{
            $imgCover = $this->page_cover;
        }

        $event->update([
                'name' =>    $this->name,
                'key_name' => $this->key_name,
                'image' => $imgName,
                'description' => $this->description,
                'type' => $this->type,
                'place' => $this->place,
                'url' => $this->url,
                'maximum_people' => $this->maximum_people,
                'price' => $this->price,
                'is_free' => $this->is_free,
                'short_description' => $this->short_description,
                'page_cover' => $imgCover,
                'page_main_color' => $this->page_main_color,
                'access_comments' => $this->access_comments
            ]);

        $this->dispatchBrowserEvent('show-snackbar', [
            'text'=> 'Evento actualizado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
    }

    public function enableCreateForm(){
        $this->activity = "create";
        $this->createStatus = "";
    }

    public function generateKeyname(){
        $this->key_name = strtolower(str_replace(' ', '-', trim($this->name)));
    }
}
