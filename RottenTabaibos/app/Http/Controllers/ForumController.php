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
            $posts = Post::all();

            //se o topico for filmes ... 
            if($name == "movies"){
                $name = "Movies";                
                return view('discussion' ,['name' => $name, 'post' => $posts]);
            } 

            if($name == "series"){
                //se o topico for series ...
                $name = "Series"; 
                return view('discussion' ,['name' => $name, 'post' => $posts]);
            } 

            if($name == "random"){
                //se o topico for random ...
                $name = "Random";
                return view('discussion' ,['name' => $name, 'post' => $posts]);
            }     
        }else{
            return redirect('login');
        }
           
    }

    public function store(Request $request){
        
        $user = Auth::user();

        
        Post::create([
            'type' => $request->type,
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'movie_id' => $request->movie_id,
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->action('ForumController@topic',['name'=>$request->type]);
    
    }
}
