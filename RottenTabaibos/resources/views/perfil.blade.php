@extends('layouts.layout')

@section('content')

<main>
    <section class="presentation">
        <div class="row">
            <div class="movie-main">
                <a href="#" class="movie-link">
                    <img src="https://image.tmdb.org/t/p/w500{{$pessoa_detalhes['profile_path']}}" alt="" width="300px">
                </a>
            </div>
            <div class="movie-text">
                <h1>{{$pessoa_detalhes['name']}}</h1>
                <h4>Biografia</h4>
                <h5>{{$pessoa_detalhes['biography']}}</h5>
                <h4>Born at:</h4>
                <h5>{{$pessoa_detalhes['birthday']}} - {{$pessoa_detalhes['deathday']}}</h5>
                <h5>{{$pessoa_detalhes['place_of_birth']}}</h5>
                
            </div>
            <div class="line"></div>
        </div>
        <div id="known_for">
        <h2>Known for:</h3>
        </div>
            <div class="row">
            
                    @for ($i = 0; $i < count($known_for); $i++)
                        @if($known_for[$i]['popularity'] >= 15.000)

                    <div class="movie">
                        <a href="/movie/{{$known_for[$i]['id']}}" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w500/{{$known_for[$i]['poster_path']}}" alt="" width="200px" height="auto">
                        </a>
                        
                    </div>
                        @endif
                    @endfor 

            </div>
    </section>
</main>
@endsection