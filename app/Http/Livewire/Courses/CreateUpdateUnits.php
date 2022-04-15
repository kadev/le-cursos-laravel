<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseModules;
use App\Models\ModuleUnits;
use Livewire\Component;

class CreateUpdateUnits extends Component
{
    public $listeners = [
        'createUnit' => 'create',
        'editUnit' => 'edit',
        'renderCreateUpdateUnits' => 'render',
        'deleteUnit' => 'delete'
    ];

    public $activity, $title, $description, $module_id, $unit_id;
    public $course_modules, $course_id;

    protected $rules = [
        'course_id' => 'required',
        'title' => 'required',
        'module_id' => 'required'
    ];

    protected $messages = [
        'title.required' => 'El campo título es obligatorio',
        'module_id.required' => 'El campo módulo es obligatorio',
    ];

    public function mount($course_id){
        //$this->activity = "store";
        $this->course_id = $course_id;
    }

    public function render()
    {
        $this->course_modules = Course::find($this->course_id)->modules;

        return view('livewire.courses.create-update-units');
    }

    public function create(){
        $this->activity = "store";
        $this->reset(['title', 'description', 'module_id', 'unit_id']);
        $this->dispatchBrowserEvent('open-module-unit-modal');
    }

    public function store(){
        $this->validate();

        $unit = ModuleUnits::create([
            'title' => $this->title,
            'description' => $this->description,
            'module_id' => $this->module_id,
        ]);

        $this->reset(['title', 'description', 'module_id']);
        $this->emit('emitListeners');
        $this->dispatchBrowserEvent('hide-module-unit-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Nueva unidad creada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
    }

    public function edit($unit_id){
        $unit = ModuleUnits::find($unit_id);

        $this->activity = "update";
        $this->unit_id = $unit->id;
        $this->title = $unit->title;
        $this->description = $unit->description;
        $this->module_id = $unit->module_id;

        $this->dispatchBrowserEvent('open-module-unit-modal');
    }

    public function update(){
        $unit = ModuleUnits::find($this->unit_id);

        $this->validate();
        $unit->update([
            'title' => $this->title,
            'description' => $this->description,
            'module_id' => $this->module_id
        ]);

        $this->dispatchBrowserEvent('hide-module-unit-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Unidad actualizada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);

        $this->emit('emitListeners');
    }

    public function delete($unit_id){
        if(ModuleUnits::find($unit_id)->delete()){
            $this->dispatchBrowserEvent('snackbar-success', [
                'text'=> 'Unidad eliminado con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);

            $this->emit('emitListeners');
        }
    }
}
