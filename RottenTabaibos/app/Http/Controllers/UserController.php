<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Comment;


class UserController extends Controller
{
    public function index(){
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);
        
        $user = Auth::user();


        $movies = Comment::find($user->id)->movie_id;

        if(empty($movies)){
            $images = "";
        }
        else{
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movies . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
            $images = $response->getBody();
            $images = json_decode($images, true);
        }

        return view('user',['images'=>$images]);
    }

    public function edit(){
        return view('edit');
    }

    public function update(Request $request){

        $user = Auth::user();

        $request->validate([
            'profile_image'     =>  'image|mimes:png|max:2048'
        ]);

        $id = $user->id;
        $file = $request->file('avatar_profile');
        $filename = time().'-'.$file->getClientOriginalName();

        $file = $file->move('images/avatars', $filename);

        $user->avatar = $filename;
        
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->biography = $request->biography;
        $user->born = $request->born;

        //dd($user);

        $user->save();

        return redirect()->action('UserController@index',[$id]);
    }

    public function api()
    {
        $data = User::all();

        return $data;
    }
}
