<?php

namespace App\Http\Livewire\Prospects;

use App\Helpers\Helper;
use App\Models\Event;
use App\Models\EventRegistration;
use Livewire\Component;

class CreateUpdate extends Component
{
    public $activity;
    public $createStatus = null;
    public $prospect_id, $event_id, $name, $age, $employment, $email, $cellphone_number, $city, $state, $country;
    public $events, $countries;

    protected $rules = [
        'event_id' => 'required',
        'email' => 'required|email',
        'name' => 'required',
        'age' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required'

    ];

    protected $messages = [
        'event_id.required' => 'El campo evento es obligatorio',
        'name.required' => 'El campo nombre es obligatorio',
        'email.required' => 'El campo correo electrónico es obligatorio',
        'email.email' => 'Ingresa un correo electrónico valido.',
        'age.required' => 'El campo edad es obligatorio',
        'city.required' => 'El campo ciudad es obligatorio',
        'state.required' => 'El campo estado es obligatorio',
        'country.required' => 'El campo país es obligatorio'
    ];

    public function mount($activity, $prospect_id)
    {
        $this->activity = $activity;

        if($this->activity == "update"){
            $prospect = EventRegistration::find($this->prospect_id);

            $this->name = $prospect->name;
            $this->age = $prospect->age;
            $this->employment = $prospect->employment;
            $this->email = $prospect->email;
            $this->cellphone_number = $prospect->cellphone_number;
            $this->city = $prospect->city;
            $this->state = $prospect->state;
            $this->country = $prospect->country;
            $this->event_id = $prospect->event_id;
        }
    }

    public function render()
    {
        $this->events = Event::latest('id')->get();
        $this->countries = Helper::getCountries();
        return view('livewire.prospects.create-update');
    }

    public function store()
    {
        $this->validate();

        EventRegistration::create([
            'name' =>    $this->name,
            'age' => $this->age,
            'employment' => $this->employment,
            'email' => $this->email,
            'cellphone_number' => $this->cellphone_number,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'event_id' => $this->event_id
        ]);

        $this->reset(['name', 'age', 'employment', 'email', 'cellphone_number', 'city', 'state', 'country', 'event_id' ]);
        $this->dispatchBrowserEvent('create-success-alert');
    }

    public function update()
    {
        $this->validate();

        $prospect = EventRegistration::find($this->prospect_id);
        $prospect->update([
            'name' =>    $this->name,
            'age' => $this->age,
            'employment' => $this->employment,
            'email' => $this->email,
            'cellphone_number' => $this->cellphone_number,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'event_id' => $this->event_id
        ]);

        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Prospecto actualizado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
    }

    public function enableCreateForm(){
        $this->activity = "create";
        $this->createStatus = "";
    }
}
