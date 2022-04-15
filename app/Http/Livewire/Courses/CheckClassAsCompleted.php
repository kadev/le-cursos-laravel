<?php

namespace App\Http\Livewire\Courses;

use App\Models\CourseAdvance;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CheckClassAsCompleted extends Component
{
    public $user_id;
    public $class_id;
    public $class_status;

    protected $rules = [
        'user_id' => 'required',
        'class_id' => 'required',
        'class_status' => 'required'
    ];

    public function mount($class_id){
        $this->class_id = $class_id;
        $this->user_id = Auth::id();
    }

    public function render(){
        $row = CourseAdvance::select('status')
            ->where(["class_id" => $this->class_id, "user_id" => $this->user_id])
            ->orderByDesc('id')
            ->first();

        if($row == NULL OR empty($row)) {
            $this->class_status = 0;
        }else{
            $this->class_status = $row->status;
        }

        return <<<'blade'
            <div class="n-chk mt-3">
                 <label class="new-control new-checkbox checkbox-success">
                    <span class="new-control-indicator"></span>Marcar como clase terminada
                    <input wire:model="class_status" wire:change="changeStatus()" type="checkbox" class="new-control-input" @if($this->class_status==1) checked @endif>
                 </label>
            </div>
        blade;
    }

    public function changeStatus(){
        $this->validate();

        $result = CourseAdvance::updateOrCreate(
            ['class_id' => $this->class_id, 'user_id' => $this->user_id],
            ['status' => $this->class_status]
        );

        if($result){
            $this->emit('renderCourseContent');
        }
    }
}
