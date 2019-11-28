<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use DB;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request)
    {

        $first_name = DB::table('users')->where('id', Auth::id())->value('first_name');
        $last_name = DB::table('users')->where('id', Auth::id())->value('last_name');

        Comment::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'star' => '3'
        ]);
        // return redirect()->route('posts.show', $movie->id);
    }
}
