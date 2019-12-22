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

        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'star' => $request->rating
        ]);
        
        return redirect()->action('FilmeController@index',['id'=>$request->movie_id]);
    }

    public function api()
    {
        $data = Comment::all();

        return $data;
    }
}
