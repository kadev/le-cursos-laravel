<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\UnitClasses;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowCourseContent extends Component
{
    public $listeners = [
        'renderCourseContent' => 'render',
    ];

    public $course, $class;

    public function mount($course_id, $class_id){
        $this->course = Course::findOrFail($course_id);

        if($class_id != null){
            $this->class = UnitClasses::findOrFail($class_id);
        }else{
            $this->class = null;
        }
    }

    public function render()
    {
        return view('livewire.courses.show-course-content');
    }
}
