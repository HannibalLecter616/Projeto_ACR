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
        $final_search = [];
        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search = $response->getBody();
        $search = json_decode($search, true);
        $final_search = $search['results'];
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search_person = $response->getBody();
        $search_person = json_decode($search_person, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
        $generos = $response->getBody();
        $generos = json_decode($generos, true);

        return view('procura', ['search' => $final_search,
                    'generos'=>$generos['genres'],
                    'search_p' => $search_person['results']]);
    }

    public function all()
    {
        $query=$_REQUEST['nome_procura'];  
        $order=$_REQUEST['ordem'];
        $genre=$_REQUEST['procura-genero'];

        $client = new Client([
            'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        if(empty($query))
        {
            if($order == "top")
            {
                $final_search = [];

                if(empty($genre))
                {
                    $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
                    $search = $response->getBody();
                    $search = json_decode($search, true);
                    $final_search = $search['results'];
                }
                else
                {
                    for ($i=1; $i <= 20; $i++) 
                    { 
                        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US&page='.$i);
                        $search = $response->getBody();
                        $search = json_decode($search, true);
                        
                       foreach($search['results'] as $result)
                        {
                            if(!empty($result['genre_ids'])){
                                foreach($result['genre_ids'] as $genero){
                                    if($genero == $genre)
                                    {
                                        array_push($final_search, $result);
                                    }
                                }
                            }
                        }
                    }
                }
                
               // dd($final_search);

            }
            else if($order == "popular"){

                $final_search = [];

                    if(empty($genre))
                    {
                        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                        $search = $response->getBody();
                        $search = json_decode($search, true);
                        $final_search = $search['results'];
                    }
                    else{
                        for ($i=1; $i <= 10; $i++) 
                        { 
                            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page='.$i);
                            $search = $response->getBody();
                            $search = json_decode($search, true);
                           foreach($search['results'] as $result)
                            {
                                if(!empty($result['genre_ids'])){
                                    foreach($result['genre_ids'] as $genero){
                                        if($genero == $genre)
                                        {
                                            array_push($final_search, $result);
                                        }
                                    }
                                }
                            }
                        }
                    }
                
               // dd($final_search);
            }
            else if($order == "recent") {

                $final_search = [];

                if(empty($genre))
                {
                    $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                    $search = $response->getBody();
                    $search = json_decode($search, true);
                    $final_search = $search['results'];
                }
                else{
                    for ($i=1; $i <= 10; $i++) 
                    { 
                        $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page='.$i);
                        $search = $response->getBody();
                        $search = json_decode($search, true);
                       foreach($search['results'] as $result)
                        {
                            if(!empty($result['genre_ids'])){
                                foreach($result['genre_ids'] as $genero){
                                    if($genero == $genre)
                                    {
                                        array_push($final_search, $result);
                                    }
                                }
                            }
                        }
                    }
                }
               // dd($final_search);
            }
            else{
                $final_search = [];
                $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
                $search = $response->getBody();
                $search = json_decode($search, true);
                $final_search = $search['results'];
            }
            
            $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
            $search_person = $response->getBody();
            $search_person = json_decode($search_person, true);
        }
        else
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/search/person?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&query=' . $query);
            $search_person = $response->getBody();
            $search_person = json_decode($search_person, true);
    
            $final_search = [];
            $response = $client->request('GET', 'https://api.themoviedb.org/3/search/movie?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&query=' . $query);
            $search = $response->getBody();
            $search = json_decode($search, true);
            $final_search = $search['results'];
        }

        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
        $generos = $response->getBody();
        $generos = json_decode($generos, true);

        return view('procura',[ 'search' => $final_search,
                                'generos'=>$generos['genres'],
                                'search_p' => $search_person['results'],
                                'genre' => $genre]);
    }

    public function popular($number)
    {
        $client = new Client([
        'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);
        if($number <= 10)
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page='.$number);
            $search = $response->getBody();
            $search = json_decode($search, true);
        }
        else
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page=1');
            $search = $response->getBody();
            $search = json_decode($search, true);
        }
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search_person = $response->getBody();
        $search_person = json_decode($search_person, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
        $generos = $response->getBody();
        $generos = json_decode($generos, true);

        return view('procura', ['search' => $search['results'],
                                'generos'=>$generos['genres'],
                                'search_p' => $search_person['results']]);
    }

    public function recent($number)
    {
        $client = new Client([
        'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);
        if($number <= 10)
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page='.$number);
            $search = $response->getBody();
            $search = json_decode($search, true);    
        }
        else
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/now_playing?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&page=1');
            $search = $response->getBody();
            $search = json_decode($search, true);
        }
        
        $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
        $search_person = $response->getBody();
        $search_person = json_decode($search_person, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
        $generos = $response->getBody();
        $generos = json_decode($generos, true);

        return view('procura', ['search' => $search['results'],
                                'generos'=>$generos['genres'],
                                'search_p' => $search_person['results']]);
    }

    public function top($number)
    {
        $client = new Client([
        'headers' => ['content-type' => 'application/json', 'Accept' => 'application/json'],
        ]);

        if($number <= 10){
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US&page='.$number);
            $search = $response->getBody();
            $search = json_decode($search, true);        
        }
        else
        {
            $response = $client->request('GET', 'https://api.themoviedb.org/3/movie/top_rated?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US&page=1');
            $search = $response->getBody();
            $search = json_decode($search, true);   
        }
            $response = $client->request('GET', 'https://api.themoviedb.org/3/person/popular?api_key=684b8c6e53471a5a6fc82a6c144fa9a0');
            $search_person = $response->getBody();
            $search_person = json_decode($search_person, true);
    
            $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
            $generos = $response->getBody();
            $generos = json_decode($generos, true);
        return view('procura', ['search' => $search['results'],
                                'generos'=>$generos['genres'],
                                'search_p' => $search_person['results']]);
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

        $response = $client->request('GET', 'https://api.themoviedb.org/3/search/person?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&query=' . $query);
        $search_person = $response->getBody();
        $search_person = json_decode($search_person, true);

        $response = $client->request('GET', 'https://api.themoviedb.org/3/genre/movie/list?api_key=684b8c6e53471a5a6fc82a6c144fa9a0&language=en-US');
        $generos = $response->getBody();
        $generos = json_decode($generos, true);

        return view('procura', ['search' => $search['results'],
                                'generos'=>$generos['genres'],
                                'search_p' => $search_person['results']]);

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
        
        return view('perfil',[  'pessoa_detalhes' => $pessoa_detalhes, 
                                'imagem' => $pessoa_imagens['profiles'], 
                                'conhecido' => $pessoa_conhecido_por['crew'], 
                                'known_for' => $pessoa_conhecido_por['cast']]);
    }
}
