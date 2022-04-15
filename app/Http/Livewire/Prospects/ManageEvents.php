<?php

namespace App\Http\Livewire\Prospects;

use App\Models\EventRegistration;
use Livewire\Component;

class ManageEvents extends Component
{
    public function render()
    {
        $prospects = EventRegistration::latest('id')->get();
        return view('livewire.prospects.manage-prospects', compact('prospects'));
    }

    public function delete($prospectId){
        EventRegistration::find($prospectId)->delete();
        session()->flash('message','Registro eliminado de forma éxitosa.');
    }
}
