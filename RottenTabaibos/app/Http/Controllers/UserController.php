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
        if(Auth::check())
        {
            $client = new Client([
                'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
            ]);
            
            $user = Auth::user();
            $movies = $user->comments;
          
            if(empty($movies)){
                $images = "";
            }
            else{
                $images = array();
                foreach ($movies as $movie) {
                    $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movie->movie_id . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                    $image = $response->getBody();
                    $image = json_decode($image, true);
                    if (!in_array($image, $images)) {
                        # code...
                        array_push($images, $image);
                    }
                    
                }
            }
    
            return view('user',['images'=>$images]);
        }else{
            return redirect('home');
        }
    }

    public function edit(){
        if(Auth::check()){
            return view('edit');
        }
        else{
            return redirect('home');
        }
        
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

    public function posts($id)
    {
        $user = User::find($id);
        $posts = $user->posts;

        return view('posts',['posts'=>$posts]);
    }

    public function reviews($id)
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $user = User::find($id);
        $reviews = "";
        $movies = array();
        if($user->type == 1){
            $reviews = $user->comments;
            
            foreach($reviews as $review)
            {
                $movie_id = $review->movie_id;
                $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                $film = $response->getBody();
                $film = json_decode($film, true);

                $movies[$movie_id] = $film;
            }
        }
        elseif($user->type == 2){
            $reviews = $user->critics;
            foreach($reviews as $review)
            {
                $movie_id = $review->movie_id;
                $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $movie_id . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                $film = $response->getBody();
                $film = json_decode($film, true);

                $movies[$movie_id] = $film;
            }
        }

        return view('reviews',['reviews'=>$reviews, 'movies'=>$movies]);
    }

    public function api()
    {
        $data = User::all();

        return $data;
    }
}
