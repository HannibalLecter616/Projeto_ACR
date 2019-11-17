<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FilmeController extends Controller
{

    public function index($id)
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/' . $id . '?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $movie = $response->getBody();
        $movie = json_decode($movie, true);

        return view('movie', ['movie' => $movie]);
    }
}

