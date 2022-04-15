<?php

namespace App\Http\Livewire\Courses;

use App\Helpers\Helper;
use App\Models\CourseStudents;
use Livewire\Component;

class ManageCourseStudents extends Component
{
    public $listeners = ['manageCourseStudentsRefresh' => 'render'];
    public $course_id, $students, $months;

    public function render()
    {
        $this->students = CourseStudents::where("course_id", $this->course_id)->orderBy('id', 'desc')->get();

        return view('livewire.courses.manage-course-students');
    }

    public function mount($course_id){
        $this->course_id = $course_id;
        $this->months = Helper::getMonthsInES();
    }

    public function changeActive($enrollmentID, $active){
        $enrollment = CourseStudents::find($enrollmentID);

        if($enrollment->update(["active" => $active])){
            if($active == 1){
                $text = "Inscripción activada con éxito.";
            }else{
                $text = "Inscripción suspendida con éxito.";
            }

            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> $text,
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
    }

    public function delete($enrollmentID){
        if(CourseStudents::find($enrollmentID)->delete()){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Inscripción eliminada con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'>'#1b55e2'
            ]);
        }
    }
}
