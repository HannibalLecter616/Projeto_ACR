<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $popular = $response->getBody();
        $popular = json_decode($popular, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/upcoming?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $upcoming = $response->getBody();
        $upcoming = json_decode($upcoming, true);

        return view('home', ['popular' => $popular['results'], 'upcoming' => $upcoming['results']]);
    }
    
}