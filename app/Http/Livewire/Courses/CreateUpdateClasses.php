<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseModules;
use App\Models\ModuleUnits;
use App\Models\UnitClasses;
use Livewire\Component;

class CreateUpdateClasses extends Component
{
    public $listeners = [
        'createClass' => 'create',
        'editClass' => 'edit',
        'renderCreateUpdateClasses' => 'render',
        'deleteClass' => 'delete'
    ];

    public $activity, $title, $description, $unit_id, $url, $type;
    public $class_id, $course_modules, $module_id, $course_module_units, $course_id;
    public $live_datetime, $live_instructions;

    protected $rules = [
        'unit_id' => 'required',
        'title' => 'required',
    ];

    protected $messages = [
        'title.required' => 'El campo título es obligatorio',
        'unit_id.required' => 'El campo unidad es obligatorio',
    ];

    public function mount($course_id){
        $this->activity = "store";
        $this->course_id = $course_id;
    }

    public function render()
    {
        //$this->course_module_units = array();
        $this->course_modules = Course::find($this->course_id)->modules; //->units;

        if(!empty($this->module_id)){
            $this->course_module_units = CourseModules::find($this->module_id)->units;
        }

        return view('livewire.courses.create-update-classes');
    }

    public function create(){
        $this->activity = "store";
        $this->reset(['module_id', 'title', 'description', 'unit_id', 'url', 'type', 'class_id']);
        $this->dispatchBrowserEvent('open-unit-class-modal');
    }

    public function store(){
        $this->validate();

        $unit = UnitClasses::create([
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'url' => $this->url,
            'unit_id' => $this->unit_id,
            'live_datetime' => $this->live_datetime,
            'live_instructions' => $this->live_instructions
        ]);

        $this->reset(['title', 'description', 'unit_id', 'type', 'url', 'live_datetime', 'live_instructions']);
        $this->emit('emitListeners');
        $this->dispatchBrowserEvent('hide-unit-class-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Nueva clase creada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
    }

    public function edit($class_id){
        $class = UnitClasses::find($class_id);
        $unit = ModuleUnits::find($class->unit_id);

        $this->activity = "update";
        $this->class_id = $class->id;
        $this->title = $class->title;
        $this->description = $class->description;
        $this->type = $class->type;
        $this->url = $class->url;
        $this->module_id = $unit->module_id;
        $this->unit_id = $class->unit_id;
        $this->live_datetime = $class->live_datetime;
        $this->live_instructions = $class->live_instructions;

        $this->dispatchBrowserEvent('open-unit-class-modal');
    }

    public function update(){
        $class = UnitClasses::find($this->class_id);

        $this->validate();
        $class->update([
            'title' => $this->title,
            'description' => $this->description,
            'type' => $this->type,
            'url' => $this->url,
            'unit_id' => $this->unit_id,
            'live_datetime' => $this->live_datetime,
            'live_instructions' => $this->live_instructions
        ]);

        $this->dispatchBrowserEvent('hide-unit-class-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Clase actualizada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);

        $this->emit('emitListeners');
    }

    public function delete($class_id){
        if(UnitClasses::find($class_id)->delete()){
            $this->dispatchBrowserEvent('snackbar-success', [
                'text'=> 'Clase eliminada con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);

            $this->emit('emitListeners');
        }
    }
}
