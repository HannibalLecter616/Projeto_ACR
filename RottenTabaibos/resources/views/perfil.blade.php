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
                <br><br>
                <h4>Born at:</h4>
                @php
                    $date = new DateTime($pessoa_detalhes['birthday']);
                    $now = new DateTime();
                    $interval = $now->diff($date);
                    $age = $interval->y;
                @endphp

                @if(empty($pessoa_detalhes['deathday']))
                    <i class="fas fa-birthday-cake"></i> {{$pessoa_detalhes['birthday']}} ({{$age}} years old)
                @else
                    <i class="fas fa-birthday-cake"></i> {{$pessoa_detalhes['birthday']}} - {{$pessoa_detalhes['deathday']}} ({{$age}} years old)
                @endif
                <br>
                <i class="fas fa-location-arrow"></i> {{$pessoa_detalhes['place_of_birth']}}

            </div>
            <div class="line"></div>
        </div>
        <div id="known_for">
        <h2>Known for:</h3>
        </div>
            <div class="row">
                    @php
                    $numero = 0;    
                    @endphp

                    @if ($pessoa_detalhes['known_for_department'] == "Directing" || $pessoa_detalhes['known_for_department'] == "Writing")
                        @for ($i = 0; $i < count($conhecido); $i++)
                            @if ($numero < 8 )
                                    <div class="movie">
                                        <a href="/movie/{{$conhecido[$i]['id']}}" class="movie-link">
                                            <img src="https://image.tmdb.org/t/p/w500/{{$conhecido[$i]['poster_path']}}" alt="" width="200px" height="auto">
                                        </a>
                                    <div class="movie-box">
                                            <a href="/movie/{{$conhecido[$i]['id']}}" class="movie-title">{{$conhecido[$i]['title']}}</a>
                                        @if( empty($conhecido[$i]['release_date']))
                                            <div class="movie-year">Undefined</div>
                                        @else
                                            <div class="movie-year">{{substr($conhecido[$i]['release_date'],0,4)}}</div>
                                        @endif
                                    </div>
                                    </div>
                                    @php
                                        $numero++;    
                                    @endphp 
                            @endif
                        @endfor   
                    @else
                        @for ($i = 0; $i < count($known_for); $i++)
                                @if ($numero < 8 )
                                    @if($known_for[$i]['popularity'] >= 10.000)
                                        <div class="movie">
                                            <a href="/movie/{{$known_for[$i]['id']}}" class="movie-link">
                                                <img src="https://image.tmdb.org/t/p/w500/{{$known_for[$i]['poster_path']}}" alt="" width="200px" height="auto">
                                            </a>
                                            <div class="movie-box">
                                                <a href="/movie/{{$known_for[$i]['id']}}" class="movie-title">{{$known_for[$i]['title']}}</a>
                                                @if( empty($known_for[$i]['release_date']))
                                                <div class="movie-year">Undefined</div>
                                                @else
                                                <div class="movie-year">{{substr($known_for[$i]['release_date'],0,4)}}</div>
                                                @endif
                                            </div>
                                        </div>
                                        @php
                                            $numero++;    
                                        @endphp 
                                    @endif
                                @endif
                        @endfor 
                    @endif
            </div>
    </section>
</main>
@endsection
