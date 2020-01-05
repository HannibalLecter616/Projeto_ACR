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


            // Buscar likes
            $numLikes = 0;
            $numDislikes = 0;

            $Likes = [];
            $Dislikes = [];

            foreach($posts as $p) {
                $totalLikes = $p->postLikes;

                foreach($totalLikes as $l) {
                    if ($l->like_type == 0) {
                        $numDislikes++;
                    } else if ($l->like_type == 1) {
                        $numLikes++;
                    }
                }

                $Likes[$p->id] = $numLikes;
                $Dislikes[$p->id] = $numDislikes;

                $numLikes = 0;
                $numDislikes = 0;
   
            }


        
            //se o topico for filmes ... 
            if($name == "movies"){
                $name = "Movies";                
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies, 'Likes' => $Likes, 'Dislikes' => $Dislikes]);
            } 

            if($name == "series"){
                //se o topico for series ...
                $name = "Series"; 
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies, 'Likes' => $Likes, 'Dislikes' => $Dislikes]);
            } 

            if($name == "random"){
                //se o topico for random ...
                $name = "Random";
                return view('discussion' ,['name' => $name, 'post' => $posts, 'replies'=>$replies, 'Likes' => $Likes, 'Dislikes' => $Dislikes]);
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
        $like_type = $request->like_type;
        $currentUser = Auth::user();
        $addLike = 0;

        if ($currentUser) {

            $currentUserPostsLikes = $currentUser->likes;

            // Remove like/dislike if already exists
            foreach ($currentUserPostsLikes as $postLike) {
                if ($post_id == $postLike->post_id) {
                    $postLike->forceDelete(); // Remove the like to create a new one
                }
                if ($post_id == $postLike->post_id && $like_type == $postLike->like_type) {
                    $addLike = 1; // Remove the like and don't create a new one
                }
            }

            // Add new like/dislike
            if ($addLike == 0) {
                $newLike = new Like;
                $newLike->post_id = $post_id;
                $newLike->user_id = $currentUser->id;
                $newLike->like_type = $like_type; // 1 - Like, 0 - Dislike
                $newLike->save(); 
            }
        }

        $numLikes = 0;
        $numDislikes = 0;
        $post = Post::find($post_id);
        $totalLikes = $post->postLikes;

        foreach($totalLikes as $l) {
            if ($l->like_type == 0) {
                $numDislikes++;
            } else if ($l->like_type == 1) {
                $numLikes++;
            }
        }

        return [$numDislikes, $numLikes];

    }

}
