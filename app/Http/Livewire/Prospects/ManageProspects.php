<?php

namespace App\Http\Livewire\Prospects;

use App\Models\Event;
use App\Models\EventRegistration;
use Livewire\Component;
use Livewire\WithPagination;

class ManageProspects extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $filter_event, $search;

    public function render()
    {
        if(empty($this->filter_event) OR $this->filter_event == "all"){
            $prospects = EventRegistration::where('name', 'like', '%'. $this->search . '%')->paginate(25);
        }else{
            $prospects = EventRegistration::where('event_id', $this->filter_event)->paginate(25);
        }

        return view('livewire.prospects.manage-prospects', [ 'prospects' => $prospects]);
    }

    public function mount(){
        $this->search = "";
        $this->filter_event = "all";
    }

    public function delete($prospectId){
        if(EventRegistration::find($prospectId)->delete()){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Prospecto eliminado.',
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
