<?php

namespace App\Http\Livewire\Links;

use App\Models\Link;
use Livewire\Component;

class CreateUpdate extends Component
{
    public $action;
    public $link_id, $name, $key_name, $link;

    public $listeners = [
        'editLink' => 'edit',
        'changeAction' => 'changeAction'
    ];

    protected $rules = [
        'name' => 'required',
        'key_name' => 'required|unique:links',
        'link' => 'required'
    ];

    protected $messages = [
        'name.required' => 'El campo nombre es obligatorio',
        'key_name.required' => 'El campo clave es obligatorio',
        'key_name.unique' => 'Ya existe esta clave en la base de datos, elige otro.',
        'link.required' => 'El campo link es obligatorio'
    ];

    public function mount(){
        $this->action = "store";
    }

    public function render()
    {
        return view('livewire.links.create-update');
    }

    public function store(){
        $this->validate();

        $link = Link::create([
            'name' =>    $this->name,
            'key_name' => $this->key_name,
            'link' => $this->link,
            'enabled' => 1,
        ]);

        $this->dispatchBrowserEvent('hide-cu-links-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Link creado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
        $this->emit('LinksTableRefresh');
    }

    public function changeAction($action){
        $this->action = $action;
        $this->dispatchBrowserEvent('change-modal-labels', $action);

        if($action == "store"){
            $this->reset(['name', 'key_name', 'link']);
        }
    }

    public function edit($linkId){
        $linkData = Link::find($linkId);
        $this->link_id = $linkData->id;
        $this->name = $linkData->name;
        $this->key_name = $linkData->key_name;
        $this->link = $linkData->link;
        $this->changeAction("update");

        $this->dispatchBrowserEvent('open-cu-links-modal');
    }

    public function update(){
        $link = Link::find($this->link_id);

        $this->validate([
            'name' => 'required',
            'key_name' => 'required',
            'link' => 'required'
        ]);

        $link->update([
            'name' =>    $this->name,
            'key_name' => $this->key_name,
            'link' => $this->link
        ]);

        $this->reset(['link_id', 'name', 'key_name', 'link']);

        $this->dispatchBrowserEvent('hide-cu-links-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Link actualizado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
        $this->emit('LinksTableRefresh');
    }

    public function generateKeyname(){
        $this->key_name = strtolower(str_replace(' ', '-', trim($this->name)));
    }
}
