<?php

namespace App\Http\Livewire\Courses;

use App\Models\CourseModules;
use Livewire\Component;

class CreateUpdateModules extends Component
{
    public $listeners = [
        'createModule' => 'create',
        'deleteModule' => 'delete',
        'editModule' => 'edit'
    ];

    public $course_id, $module_id, $title, $description, $activity;

    protected $rules = [
        'course_id' => 'required',
        'title' => 'required'
    ];

    protected $messages = [
        'title.required' => 'El campo título es obligatorio',
    ];

    public function mount($course_id){
        $this->activity = "store";
        $this->course_id = $course_id;
    }

    public function render()
    {
        return view('livewire.courses.create-update-modules');
    }

    public function create(){
        $this->activity = "store";
        $this->reset(['title', 'description', 'module_id']);
        $this->dispatchBrowserEvent('open-course-module-modal');
    }

    public function store(){
        $this->validate();

        $course = CourseModules::create([
            'title' => $this->title,
            'description' => $this->description,
            'course_id' => $this->course_id,
        ]);

        $this->reset(['title', 'description']);
        $this->emit('emitListeners');
        $this->dispatchBrowserEvent('hide-course-module-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Nueva modulo creado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);
    }

    public function edit($module_id){
        $module = CourseModules::find($module_id);

        $this->activity = "update";
        $this->module_id = $module->id;
        $this->title = $module->title;
        $this->description = $module->description;

        $this->dispatchBrowserEvent('open-course-module-modal');
    }

    public function update(){
        $module = CourseModules::find($this->module_id);

        $this->validate();
        $module->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);

        $this->dispatchBrowserEvent('hide-course-module-modal');
        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> 'Modulo actualizado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);

        $this->emit('emitListeners');
    }

    public function delete($module_id){
        if(CourseModules::find($module_id)->delete()){
            $this->dispatchBrowserEvent('snackbar-success', [
                'text'=> 'Modulo eliminado con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);

            $this->emit('emitListeners');
        }
    }
}
