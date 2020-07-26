<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function make($name,$last = '' ){
            /*return view('admin.welcome',[
                'name' =>$name,
                'last'=>$last,
            ]);*/

            return view('admin.welcome',compact('name','last')); 

    } 
    public function text(){
        $route = route('hello',['mohammed']);
        echo '<a href="'.$route  .'">Welcome</a>'; 

    }
}
