<?php

namespace App\Http\Livewire\Courses;

use App\Helpers\Helper;
use App\Models\Course;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateUpdate extends Component
{
    use WithFileUploads;

    public $listeners = [
        'renderCreateUpdateCourse' => 'render',
        'emitListeners' => 'emitListeners'
    ];

    public $activity, $createStatus, $tab;
    public $course_id, $title, $key_name, $short_description, $description, $category_id, $price;
    public $discount_price, $is_free, $has_a_discount, $overview_provider, $overview_url;
    public $thumbnail, $page_cover, $page_main_color, $meta_keywords, $meta_description, $featured, $enabled, $owner_id;
    public $content;

    protected $rules = [
        'title' => 'required',
        'key_name' => 'required|unique:events'
    ];

    protected $messages = [
        'title.required' => 'El campo título es obligatorio',
        'key_name.required' => 'El campo clave es obligatorio',
        'key_name.unique' => 'Ya existe esta clave en la base de datos, elige otro.'
    ];

    public function mount($activity, $course_id){
        $this->activity = $activity;
        $this->course_id = $course_id;
        $this->tab = "general";
        $this->page_main_color = "#FF851B";

        if($this->activity == "update"){
            $course = Course::find($this->course_id);
            $this->content = $course->modules;

            $this->title = $course->title;
            $this->key_name = $course->key_name;
            $this->short_description = $course->short_description;
            $this->description = $course->description;
            $this->category_id = $course->category_id;
            $this->price = $course->price;
            $this->discount_price = $course->discount_price;
            $this->is_free = $course->is_free;
            $this->has_a_discount = $course->has_a_discount;
            $this->overview_provider = $course->overview_provider;
            $this->overview_url = $course->overview_url;
            $this->thumbnail = $course->thumbnail;
            $this->page_cover = $course->page_cover;
            $this->page_main_color = (empty($course->page_main_color)) ? '#FF851B' : $course->page_main_color;
            $this->meta_keywords = $course->meta_keywords;
            $this->meta_description = $course->meta_description;
            $this->featured = $course->featured;
            $this->enabled = $course->enabled;
            $this->owner_id = $course->owner_id;
        }
    }

    public function render()
    {
        if($this->activity == "update"){
            $course = Course::find($this->course_id);
            $this->content = $course->modules;
        }

        return view('livewire.courses.create-update');
    }

    public function store(){
        $this->validate();

        if(method_exists($this->thumbnail, "store")){
            $imgThumbnail = $this->thumbnail->store('courses', 'public');
        }else{
            $imgThumbnail = $this->thumbnail;
        }

        if(method_exists($this->page_cover, "store")){
            $imgCover = $this->page_cover->store('courses', 'public');
        }else{
            $imgCover = $this->page_cover;
        }

        $course = Course::create([
            'title' => $this->title,
            'key_name' => $this->key_name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'is_free' => $this->is_free,
            'has_a_discount' => $this->has_a_discount,
            'overview_provider' => $this->overview_provider,
            'overview_url' => $this->overview_url,
            'thumbnail' => $this->thumbnail,
            'page_cover' => $this->page_cover,
            'page_main_color' => $this->page_main_color,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'featured' => $this->featured,
            'enabled' => 1,
            'owner_id' => $this->owner_id,
        ]);

        if($course){
            $this->dispatchBrowserEvent('create-success-alert');
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }

        $this->activity = "create-message";
        $this->createStatus = "success";
    }

    public function update(){
        $course = Course::find($this->course_id);
        $this->validate();

        if(method_exists($this->thumbnail, "store")){
            $imgThumbnail = $this->thumbnail->store('courses', 'public');
        }else{
            $imgThumbnail = $this->thumbnail;
        }

        if(method_exists($this->page_cover, "store")){
            $imgCover = $this->page_cover->store('courses', 'public');
        }else{
            $imgCover = $this->page_cover;
        }

        $result = $course->update([
            'title' => $this->title,
            'key_name' => $this->key_name,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'price' => $this->price,
            'discount_price' => $this->discount_price,
            'is_free' => $this->is_free,
            'has_a_discount' => $this->has_a_discount,
            'overview_provider' => $this->overview_provider,
            'overview_url' => $this->overview_url,
            'thumbnail' => $imgThumbnail,
            'page_cover' => $imgCover,
            'page_main_color' => $this->page_main_color,
            'meta_keywords' => $this->meta_keywords,
            'meta_description' => $this->meta_description,
            'featured' => $this->featured,
            'enabled' => $this->enabled,
            'owner_id' => $this->owner_id,
        ]);

        if($result){
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> 'Curso actualizado con éxito.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#8dbf42'
            ]);
        }else{
            $this->dispatchBrowserEvent('show-snackbar', [
                'text'=> '¡Oppps! Ha ocurrido un error en el servidor.',
                'actionTextColor'=>'#fff',
                'backgroundColor'=>'#e7515a'
            ]);
        }
    }

    public function enableCreateForm(){
        $this->activity = "create";
        $this->createStatus = "";
    }

    public function generateKeyname(){
        $string = Helper::removeAccents($this->title);
        $string = preg_replace('/[^ \w]+/', '', $string);
        $string = strtolower(str_replace(' ', '-', trim($string)));
        $this->key_name = $string;
    }

    public function changeTab($tab){
        $this->tab = $tab;
    }

    public function updatedIsFree()
    {
        if($this->is_free == 1){
            $this->price = 0;
        }
    }

    public function emitListeners(){
        $this->emit('renderCreateUpdateCourse');
        $this->emit('renderCreateUpdateUnits');
        $this->emit('renderCreateUpdateClasses');
    }
}
