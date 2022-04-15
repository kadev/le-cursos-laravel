<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $data = [
            'category_name' => 'payments',
            'page_name' => 'manage_payments',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'courses' => Course::where('enabled', 1)->get(),
        ];

        if($user->role_id == 5) { //role_id == 5 = Student
            return view('student.payments.index')->with($data);
        } else{
            return view('payments.index')->with($data);
        }
    }
}
