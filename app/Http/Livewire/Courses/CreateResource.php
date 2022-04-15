<?php

namespace App\Http\Livewire\Courses;

use App\Models\ClassResources;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateResource extends Component
{
    use WithFileUploads;

    public $class_id, $title, $url, $type, $file;

    public $listeners = [
        'storeResource' => 'store',
    ];

    protected $rules = [
        'title' => 'required',
        'class_id' => 'required',
        'type' => 'required',
        'file' => 'max:10240'
    ];

    protected $messages = [
        'class_id.required' => 'El campo "Clase" es obligatorio.',
        'url.required' => 'El campo "URL" es obligatorio',
        'type.required' => 'El campo "Tipo" es obligatorio',
        'file.required' => 'El campo "Archivo" es obligatorio',
        'file.max' => 'El archivo es muy grande, el peso máximo es de 10mb'
    ];

    public function mount($class_id){
        $this->class_id = $class_id;
    }

    public function render()
    {
        return view('livewire.courses.create-resource');
    }

    public function updatedFile()

    {

        $this->validate([

            'file' => 'max:10240', // 10MB Max

        ]);

    }

    public function store(){
        if($this->type == "file"){
            $this->validate([
                'title' => 'required',
                'class_id' => 'required',
                'type' => 'required',
                'file' => 'required|max:10240'
            ]);

            if(method_exists($this->file, "store")){
                $fileURL = $this->file->store('courses/resources', 'public');
            }else{
                $fileURL = NULL;
            }

            ClassResources::create([
                'class_id' => $this->class_id,
                'title' => $this->title,
                'type' => $this->type,
                'url' => $fileURL
            ]);
        }elseif ($this->type == "link"){
            $this->validate([
                'title' => 'required',
                'class_id' => 'required',
                'type' => 'required',
                'url' => 'required'
            ]);

            ClassResources::create([
                'class_id' => $this->class_id,
                'title' => $this->title,
                'type' => $this->type,
                'url' => $this->url
            ]);

        }

        $this->reset(['url', 'type', 'title', 'file']);
        $this->emit('renderManageClassResources');
        $this->dispatchBrowserEvent('hide-create-class-resources-modal');
        $this->dispatchBrowserEvent('show-snackbar', [
            'text'=> 'Nuevo recurso creado con éxito.',
            'actionTextColor'=>'#fff',
            'backgroundColor'>'#1b55e2'
        ]);

    }
}
