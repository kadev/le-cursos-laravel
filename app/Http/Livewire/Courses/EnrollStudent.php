<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use App\Models\CourseStudents;
use App\Models\User;
use Livewire\Component;

class EnrollStudent extends Component
{
    public $course, $student_id, $students;

    protected $rules = [
        'student_id' => 'required'
    ];

    protected $messages = [
        'student_id.required' => 'El campo estudiante es obligatorio'
    ];

    public function render()
    {
        return view('livewire.courses.enroll-student');
    }

    public function mount($course_id){
        $this->course = Course::find($course_id);
        $this->students = User::where(["role_id" => 5, 'enabled' => 1])->get();
    }

    public function enrollStudent(){
        $this->validate();
        $checkEnroll = CourseStudents::where(['course_id' => $this->course->id, 'user_id' => $this->student_id])->get();

        if($checkEnroll->count() == 0){
            $result = CourseStudents::create([
                'course_id' => $this->course->id,
                'user_id' => $this->student_id,
                'activve' => 1
            ]);

            if($result){
                $this->dispatchBrowserEvent('show-snackbar', [
                    'text'=> 'Estudiante inscrito con éxito.',
                    'actionTextColor'=>'#fff',
                    'backgroundColor'>'#8dbf42'
                ]);
            }else{
                $this->dispatchBrowserEvent('show-snackbar', [
                    'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                    'actionTextColor'=>'#fff',
                    'backgroundColor'=>'#e7515a'
                ]);
            }

            $this->emit('manageCourseStudentsRefresh');
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'El estudiante ya está inscrito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }

        $this->reset(['student_id']);
        $this->dispatchBrowserEvent('hide-enroll-student-modal');
    }
}
