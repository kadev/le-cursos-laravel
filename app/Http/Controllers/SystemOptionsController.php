<?php

namespace App\Http\Controllers;

use App\Models\SystemOptions;
use Illuminate\Http\Request;

class SystemOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'category_name' => 'system-options',
            'page_name' => 'system_options',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            'options' => SystemOptions::all()
        ];

        return view('system.index')->with($data);
    }
}
