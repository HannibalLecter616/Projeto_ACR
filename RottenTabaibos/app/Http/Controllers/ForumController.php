<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumController extends Controller
{
    //
    public function index(){
        return view('forum');
    }

    public function topic($name){

        //se o topico for filmes ... 
        if($name == "movies"){
            $name = "Movies";
            return view('discussion' ,['name' => $name]);
        } 

        if($name == "series"){
            //se o topico for series ...
            $name = "Series"; 
            return view('discussion' ,['name' => $name]);
        } 

        if($name == "random"){
            //se o topico for random ...
            $name = "Random";
            return view('discussion' ,['name' => $name]);
        }         
    }
}
