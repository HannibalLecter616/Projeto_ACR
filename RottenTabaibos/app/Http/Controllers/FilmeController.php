<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Comment;
use App\Critic;


class FilmeController extends Controller
{

    public function index($id)
    {
        $comments = Comment::all();  
        $critics = Critic::all();

        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $movie = $response->getBody();
        $movie = json_decode($movie, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '/credits?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $crew = $response->getBody();
        $crew = json_decode($crew, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '/videos?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $trailer = $response->getBody();
        $trailer = json_decode($trailer, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '/reviews?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $comment = $response->getBody();
        $comment = json_decode($comment, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '/similar?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $recommendations = $response->getBody();
        $recommendations = json_decode($recommendations, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '/images?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $images = $response->getBody();
        $images = json_decode($images, true);

        return view('movie', ['movie' => $movie,'crew'=>$crew['cast'],'director'=>$crew['crew'],'trailer'=>$trailer['results'], 'comment' => $comment['results'], 'recommendations'=> $recommendations['results'], 'images'=>$images['backdrops'] ,'comments'=>$comments, 'critics' => $critics]);
    }
}
