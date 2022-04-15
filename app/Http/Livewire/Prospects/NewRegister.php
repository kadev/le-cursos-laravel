<?php

namespace App\Http\Livewire\Prospects;

use App\Mail\EventRegistrationForAdminsMailable;
use App\Mail\EventRegistrationMailable;
use App\Models\Event;
use App\Models\EventDates;
use App\Models\EventRegistration;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class NewRegister extends Component
{
    public $registerStatus = false;
    public $name, $age, $employment, $email, $cellphone_number, $city, $state, $country, $event_id, $event, $nextDate;

    protected $rules = [
        'name' => 'required',
        'age' => 'required',
        'email' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required'

    ];

    protected $messages = [
        'name.required' => 'El campo Nombre Completo es obligatorio',
        'age.required' => 'El campo Edad es obligatorio',
        'email.required' => 'El campo Correo Electrónico es obligatorio',
        'city.required' => 'El campo Ciudad es obligatorio',
        'state.required' => 'El campo Estado/Región es obligatorio',
        'country.required' => 'El campo País es obligatorio'
    ];

    public function mount($eventID, $nextDate)
    {
        $this->event = Event::findOrFail($eventID);
        $this->event_id = $eventID;
        $this->nextDate = $nextDate;
    }

    public function render()
    {
        return view('livewire.prospects.new-register');
    }

    public function store()
    {
        $this->validate();
        $admins = User::where(['role_id' => 1, 'enabled' => 1])
            ->orWhere(['role_id' => 2, 'enabled' => 1])
            ->get();

        $newRegister = EventRegistration::create([
            'name' =>    $this->name,
            'age' => $this->age,
            'employment' => $this->employment,
            'email' => $this->email,
            'cellphone_number' => $this->cellphone_number,
            'city' => $this->city,
            'state' => $this->state,
            'country' => $this->country,
            'event_id' => $this->event_id,
            'event_date_id' => $this->nextDate->id
        ]);

        if($newRegister){
            $this->event->date = EventDates::where('event_id', $this->event->id)->first();
            $this->registerStatus = true;

            Mail::to($newRegister->email)->send(new EventRegistrationMailable($newRegister, $this->event));

            $mailForTheAdmins = new EventRegistrationForAdminsMailable($newRegister, $this->event);
            foreach ($admins as $admin){
                Mail::to($admin->email)->send($mailForTheAdmins);
            }

            $this->reset(['name', 'age', 'employment', 'email', 'cellphone_number', 'city', 'state', 'country' ]);
        }else{
            $this->registerStatus = "error";
        }
    }
}
