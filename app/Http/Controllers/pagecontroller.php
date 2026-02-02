<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pagecontroller extends Controller
{
    //
    public function home(){
        return view("welcome");
    }
    public function about(){
        return view("about");
    }
}
