<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;

class LinkController extends Controller
{
    public function index()
    {
        $data = [
            'category_name' => 'links',
            'page_name' => 'manage_links',
            'has_scrollspy' => 0,
            'scrollspy_offset' => '',
            'alt_menu' => 0,
            //'links' => Link::all()
        ];

        return view('links.index')->with($data);
    }

    public function redirectLink($key_name){
        $link = Link::where(['key_name' => $key_name, 'enabled' => 1])->first();

        if($link){
            header("Location: https://".$link->link);
        }else{
            return redirect()->route("404");
        }
    }
}
