<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseStudents;
use App\Models\UnitClasses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $user = Auth::user();


        if($user->role_id == 5){ //role_id == 5 = Student
            $enrollments = CourseStudents::where(['user_id' => $user->id, 'active' => 1])->get();
            $courses = array();

            foreach ($enrollments as $enrollment){
                $course = Course::find($enrollment->course_id);
                array_push($courses, $course);
            }

            $data = [
                'category_name' => 'courses',
                'page_name' => 'my_courses',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0,
                'enrollments' => $enrollments,
                'courses' => $courses
            ];

            return view('student.courses.index')->with($data);

        }else{
            $data = [
                'category_name' => 'courses',
                'page_name' => 'manage_courses',
                'has_scrollspy' => 0,
                'scrollspy_offset' => '',
                'alt_menu' => 0
            ];

            return view('courses.index')->with($data);
        }
    }

    public function details($id)
    {
        $course = Course::findOrFail($id);
        $data = [
            'category_name' => 'courses',
            'page_name' => 'course_details',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'course' => $course,
            'title' => $course->title
        ];

        return view('courses.details')->with($data);
    }

    public function show($key_name, $class_id = null){
        $course = Course::where('key_name', $key_name)->first();

        if($class_id == null){
            $class = null;
        }else{
            $class = UnitClasses::findOrFail($class_id);
        }
        //dd($class);
        $data = [
            'category_name' => 'courses',
            'page_name' => 'see_course',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'course' => $course,
            'title' => $course->title,
            'class' => $class
        ];

        return view('student.courses.show')->with($data);
    }

    public function create(){
        $data = [
            'category_name' => 'courses',
            'page_name' => 'add_course',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('courses.create')->with($data);
    }

    public function edit($id){
        $data = [
            'category_name' => 'courses',
            'page_name' => 'edit_course',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'course_id' => $id
        ];

        return view('courses.edit')->with($data);
    }

    public function config_class($id){
        $class = UnitClasses::findOrFail($id);

        $data = [
            'category_name' => 'courses',
            'page_name' => 'config_class',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'class_id' => $id,
            'course' => $class->unit->module->course
        ];

        return view('courses.config-class')->with($data);
    }

    public function buy($course){
        $course = Course::where('key_name', $course)->first();

        if($course->enabled == 0){
            return redirect()->route("404");
        }

        $data = [
            'category_name' => 'courses',
            'page_name' => 'edit_course',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'course' => $course
        ];

        return view('frontend.course')->with($data);
    }
}
