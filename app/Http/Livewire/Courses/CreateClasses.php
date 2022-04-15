<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseModules;
use App\Models\UnitClasses;
use Livewire\Component;

class CreateClasses extends Component
{
    public $title, $unit_id, $type;
    public $class_id, $course_modules, $module_id, $course_module_units, $course_id;

    public $listeners = [
        'createClass' => 'create',
        'renderCreateClasses' => 'render',
        'deleteClass' => 'delete'
    ];

    protected $rules = [
        'unit_id' => 'required',
        'title' => 'required',
    ];

    protected $messages = [
        'unit_id.required' => 'El campo unidad es obligatorio',
        'title.required' => 'El campo título es obligatorio',
    ];

    public function mount($course_id){
        $this->course_id = $course_id;
    }

    public function render()
    {
        //$this->course_module_units = array();
        $this->course_modules = Course::find($this->course_id)->modules; //->units;

        if(!empty($this->module_id)){
            $this->course_module_units = CourseModules::find($this->module_id)->units;
        }

        return view('livewire.courses.create-classes');
    }

    public function create(){
        $this->reset(['module_id', 'unit_id', 'title', 'type', 'class_id']);
        $this->dispatchBrowserEvent('open-unit-class-modal');
    }

    public function store(){
        $this->validate();

        $unit = UnitClasses::create([
            'title' => $this->title,
            'type' => $this->type,
            'unit_id' => $this->unit_id
        ]);

        $this->reset(['module_id', 'unit_id', 'title', 'type', 'class_id']);
        $this->emit('emitListeners');
        $this->dispatchBrowserEvent('hide-unit-class-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Nueva clase creada con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
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
