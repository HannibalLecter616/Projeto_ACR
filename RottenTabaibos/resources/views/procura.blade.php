@extends('layouts.layout')

    @section('content')

    <div class="procura-principal">

            <label><b>Procurar Filmes / Series / Atores</b></label>
            <input type="text" placeholder="Inserir item de procura" name="nome_procura" >

        <div class="campos-procura">
                <label for="genero">Genero:</label>

                <select name="procura-genero" id="genero">
                        <option value="">----</option>
                    @foreach($generos as $genero)
                        
                        <option value="{{$genero['id']}}">{{$genero['name']}}</option>
                    @endforeach
                </select>
        </div>
        <div class="campos-procura">
                <label for="ordem_por">Ordenar por:</label>

                <select name="ordem" id="ordem_por">
                    <option value="">----</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="hamster">Hamster</option>
                    <option value="parrot">Parrot</option>
                    <option value="spider">Spider</option>
                    <option value="goldfish">Goldfish</option>
                </select>
        </div>
        <div class="campos-procura">
            <button type="submit" class="searchbtn">Search</button>
        </div>
    </div>
    <hr>
        <section class="home">
            <div class="popular">
                <div class="movie-row">
                    <div class="popular-text">
                            <div class="text-row">
                                <h2> Movies </h2>
                            </div>
                    </div>
                    @foreach ($search as $movie)

                    <div class="movie">
                        <a href="/movie/{{$movie['id']}}" class="movie-link">
                            @if (empty($movie['poster_path']))
                                <img src="/images/no_image.png" alt="" width="300px">
                            @else
                                <img src="https://image.tmdb.org/t/p/w500{{$movie['poster_path']}}" alt="">
                            @endif
                            
                        </a>
                        <div class="movie-box">
                            <a href="/movie/{{$movie['id']}}" class="movie-title">{{$movie['original_title']}}</a>
                            @if( empty($movie['release_date']))
                            <div class="movie-year">Undefined</div>
                                
                            @else
                            <div class="movie-year">{{substr( $movie['release_date'],0,4)}}</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="line"></div>
                
                <div class="movie-row">
                        <div class="popular-text">
                            <div class="text-row">
                                <h2> People </h2>
                            </div>
                        </div>
                    @foreach ($search_p as $pessoa)
                        <div class="people">
                            <a class="user_photo" href="/search/people/{{$pessoa['id']}}/{{$pessoa['name']}}" class="movie-link">

                                @if (empty($pessoa['profile_path']))
                                    <img src="/images/default_icon.png" alt="" width="300px">
                                @else
                                    <img src="https://image.tmdb.org/t/p/w500{{$pessoa['profile_path']}}" alt="" width="300px">
                                @endif
                            </a>
                            <div class="movie-text">
                                <a href="/search/people/{{$pessoa['id']}}/{{$pessoa['name']}}" class="movie-title">{{$pessoa['name']}}</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
</body>
@endsection
