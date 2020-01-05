<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Reply;

class ReplyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
    public function store(Request $request){
        
        $user = Auth::user();
        $type = $request->type;
        
        Reply::create([
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'post_id' => $request->post_id,
            'reply' => $request->reply
        ]);

        return redirect()->action('ForumController@topic',['name'=>$type]);
    }

    public function addLike($id){
        $reply = Reply::find($id);

        $post = Post::find($reply->post_id);
        dd($reply);
        /*if($reply)
        {
            $likes = $reply->likes;
            $likes += 1;
            //dd($likes);
            $reply->likes = $likes;
            $reply->save();
        }*/

        //return redirect()->action('ForumController@topic',['name'=>$post->type]);
    }

    public function addDislike($id){
        $reply = Reply::find($id);

        $post = Post::find($reply->post_id);
        dd($reply);
       /* if($reply)
        {
            $dislikes = $reply->dislikes;
            $dislikes += 1;
            //reply($dislikes);
            $reply->dislikes = $dislikes;
            $reply->save();
        }*/

        //return redirect()->action('ForumController@topic',['name'=>$post->type]);
    }
}
