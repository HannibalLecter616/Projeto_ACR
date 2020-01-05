<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\User;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request)
    {
        $user = Auth::user();

        $first_name = User::find($user->id)->first_name;
        $last_name = User::find($user->id)->last_name;


        $token = csrf_token();


        $comm = Comment::create([
            'body' => $request->body,
            'user_id' => $user->id,
            'movie_id' => $request->movie_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'star' => $request->rating
        ]);

        return [$request->body, $user->id, $request->movie_id, $first_name, $last_name, $request->rating, $user->id, $comm->id, $token];
        
        // return redirect()->action('FilmeController@index',['id'=>$request->movie_id]);
    }

    public function destroy($id){
        $ident = Comment::find($id);
        Comment::find($id)->delete();
        //dd($comment);
        return redirect()->action('FilmeController@index',['id'=>$ident->movie_id]);
    }

    public function api()
    {
        $data = Comment::all();

        return $data;
    }
}
