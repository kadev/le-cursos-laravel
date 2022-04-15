<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseModules;
use App\Models\ModuleUnits;
use App\Models\UnitClasses;
use Livewire\Component;

class UpdateClasses extends Component
{
    protected $listeners = ['updateClass' => 'update', 'updateUnitsDropdown' => 'updateUnits'];

    public $title, $description, $unit_id, $url, $type;
    public $class, $class_id, $course_modules, $module_id, $course_module_units, $course_id;
    public $live_datetime, $live_instructions;

    protected $rules = [
        'unit_id' => 'required',
        'title' => 'required',
    ];

    protected $messages = [
        'title.required' => 'El campo título es obligatorio',
        'unit_id.required' => 'El campo unidad es obligatorio',
    ];

    public function mount($class_id){
        $this->class = UnitClasses::findOrFail($class_id);
        $this->module_id = $this->class->unit->module->id;
        $this->unit_id = $this->class->unit->id;
        $this->title = $this->class->title;
        $this->description = $this->class->description;
        $this->type = $this->class->type;
        $this->url = $this->class->url;
        $this->live_datetime = $this->class->live_datetime;
        $this->live_instructions = $this->class->live_instructions;
        $this->course_id = $this->class->unit->module->course->id;
    }

    public function render()
    {
        //$this->course_module_units = array();
        $this->course_modules = Course::find($this->course_id)->modules; //->units;

        if(!empty($this->module_id)){
            $this->course_module_units = CourseModules::find($this->module_id)->units;
        }

        return view('livewire.courses.update-classes');
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

        $this->dispatchBrowserEvent('show-snackbar', [
            'text'=> 'Clase actualizada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
    }

    public function updateUnits(){
        $this->dispatchBrowserEvent('update-units-dropdown', [
            'units' => (!empty($this->module_id)) ? $this->course_module_units : ''
        ]);
    }
}
