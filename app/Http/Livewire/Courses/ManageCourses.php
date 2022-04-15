<?php

namespace App\Http\Livewire\Courses;

use App\Models\Course;
use Livewire\Component;

class ManageCourses extends Component
{
    public $courses;
    public function render()
    {
        $this->courses = Course::latest()->get();
        return view('livewire.courses.manage-courses');
    }

    public function updateEnabled($courseId, $value){
        $link = Course::find($courseId);

        $link->update([
            'enabled' => $value
        ]);

        $this->dispatchBrowserEvent('snackbar-success', [
            'text'=> ($value == 1) ? 'Curso activado con éxito.' : 'Curso desactivado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'=>'#8dbf42'
        ]);
    }

    public function delete($courseId){
        $result = Course::find($courseId)->delete();

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Curso eliminado.',
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
