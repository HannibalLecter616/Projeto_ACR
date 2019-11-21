<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProcuraController extends Controller
{
    public function initial()
    {
        $client = new Client([
        'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search = $response->getBody();
        $search = json_decode($search, true);

        return view('procura', ['search' => $search['results']]);
    }

    public function popular()
    {
        $client = new Client([
        'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search = $response->getBody();
        $search = json_decode($search, true);

        return view('procura', ['search' => $search['results']]);
    }

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

    public function pessoa($id,$name)
    {
        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);
        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/'.$id.'/?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $pessoa_detalhes = $response->getBody();
        $pessoa_detalhes = json_decode($pessoa_detalhes, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/'.$id.'/images?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $pessoa_imagens = $response->getBody();
        $pessoa_imagens = json_decode($pessoa_imagens, true);
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/'.$id.'/movie_credits?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $pessoa_conhecido_por = $response->getBody();
        $pessoa_conhecido_por = json_decode($pessoa_conhecido_por, true);

        return view('perfil',['pessoa_detalhes' => $pessoa_detalhes, 'imagem' => $pessoa_imagens['profiles'], 'conhecido' => $pessoa_conhecido_por['crew'], 'known_for' => $pessoa_conhecido_por['cast']]);
    }
}
