<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
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
}
