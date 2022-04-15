<?php

namespace App\Http\Livewire\Courses;

use App\Models\ClassResources;
use App\Models\UnitClasses;
use Livewire\Component;

class ManageResources extends Component
{
    public $class_id, $class, $resources;

    public $listeners = [
        'renderManageClassResources' => 'render',
    ];

    public function mount($class_id){
        $this->class_id = $class_id;
        $this->class = UnitClasses::find($this->class_id);
    }

    public function render()
    {
        $this->resources = ClassResources::where("class_id", $this->class_id)->orderBy("id", "DESC")->get();

        return view('livewire.courses.manage-resources');
    }

    public function delete($resource_id){
        if(ClassResources::find($resource_id)->delete()){
            $this->dispatchBrowserEvent('snackbar-success', [
                'text'=> 'Recurso eliminado con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }
    }
}
