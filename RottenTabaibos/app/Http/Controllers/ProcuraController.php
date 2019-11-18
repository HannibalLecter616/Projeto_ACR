<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcuraController extends Controller
{

    public function index()
    {
        $query=$_REQUEST['query'];

        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);
        $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&query=' . $query);
        $search = $response->getBody();
        $search = json_decode($search, true);

        return view('procura', ['search' => $search['results']]);

    }
}
