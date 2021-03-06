<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\User;
use App\Critic;

class CriticsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(CommentRequest $request)
    {
        $user = Auth::user();

        $first_name = User::find($user->id)->first_name;
        $last_name = User::find($user->id)->last_name;

        Critic::create([
            'body' => $request->body,
            'user_id' => Auth::id(),
            'movie_id' => $request->movie_id,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'star' => $request->rating
        ]);
        return redirect()->action('FilmeController@index',['id'=>$request->movie_id]);
    }

    public function destroy($id){
        $ident = Critic::find($id);
        Critic::find($id)->delete();
        return redirect()->action('FilmeController@index',['id'=>$ident->movie_id]);
    }
}
