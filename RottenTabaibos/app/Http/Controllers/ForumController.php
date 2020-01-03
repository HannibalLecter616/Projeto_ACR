<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Reply;
use App\Like;

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
            $replies = Reply::all();
            $posts = Post::all();
        
            //se o topico for filmes ... 
            if($name == "movies"){
                $name = "Movies";                
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies]);
            } 

            if($name == "series"){
                //se o topico for series ...
                $name = "Series"; 
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies]);
            } 

            if($name == "random"){
                //se o topico for random ...
                $name = "Random";
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies]);
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




    public function addLike(request $request) {
        
        $post_id = $request->post_id; 
        $currentUser = Auth::user();
        $addLike = 0;

        if ($currentUser) {

            $currentUserPostsLikes = $currentUser->likes;

            foreach ($currentUserPostsLikes as $postLike) {
                if ($post_id == $postLike->post_id) {
                    $postLike->forceDelete();
                    $addLike = 1;
                }
            }
            if ($addLike == 0) {
                $newLike = new Like;
                $newLike->post_id = $post_id;
                $newLike->user_id = $currentUser->id;
                $newLike->like_type = 1;
                $newLike->save(); 
            }
        }


        $numLikes = count(collect(Post::find($post_id)->likes)); 

        return $numLikes;


    }

    public function addDislike($id){
        $post = Post::find($id);
       //dd($post);
        if($post)
        {
            $dislikes = $post->dislikes;
            $dislikes += 1;
            //dd($dislikes);
            $post->dislikes = $dislikes;
            $post->save();
        }

        return redirect()->action('ForumController@topic',['name'=>$post->type]);
    }
}
