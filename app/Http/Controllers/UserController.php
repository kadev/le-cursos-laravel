<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'users',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('users.index')->with($data);
    }

    public function profile(Request $request)
    {
        $user = Auth::user();

        $data = [
            'category_name' => 'users',
            'page_name' => 'profile',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'profile' => $user
        ];

        if($user->role_id == 5){
            return view('student.profile')->with($data);
        }else{
            return view('users.profile')->with($data);
        }

    }

    public function editProfile(){
        $user = Auth::user();

        $data = [
            'category_name' => 'users',
            'page_name' => 'edit_profile',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        if($user->role_id == 5){
            return view('student.update-profile')->with($data);
        }else{
            return view('users.update-profile')->with($data);
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'category_name' => 'users',
            'page_name' => 'add_user',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0
        ];

        return view('users.create')->with($data);
    }


    public function edit($id){
        $data = [
            'category_name' => 'users',
            'page_name' => 'edit_user',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'user_id' => $id
        ];

        return view('users.edit')->with($data);
    }

    public function changePassword($id){
        $user = User::findOrFail($id);

        $data = [
            'category_name' => 'users',
            'page_name' => 'change_password',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'user' => $user
        ];

        return view('users.change-password')->with($data);
    }
}
