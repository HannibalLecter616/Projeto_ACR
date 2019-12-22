<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;

class ForumController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    //
    public function index(){
        if(Auth::check())
        {
            return view('forum');
        }else{
            return redirect('login');
        }
    }

    public function topic($name){

        if(Auth::check())
        {
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
        }else{
            return redirect('login');
        }
           
    }

    public function store(Request $request){
        
        $user = Auth::user();

        /*
        Post::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
        ]);
        */

    }
}
