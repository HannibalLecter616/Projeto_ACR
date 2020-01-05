@extends('layouts.layout')

    @section('content')

    <div class="procura-principal">

        <form method="GET" action="/browse/all" accept-charset="UTF-8" id="quick-search" name="quick-search">
            <label><b>Search Movies / Actors</b></label>
            <input type="text" placeholder="Insert name" name="nome_procura" >
            <br>
            <label><b>OR</b></label>
            <br><br>
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
                <label for="ordem_por">Order by:</label>

                <select name="ordem" id="ordem_por">
                    <option value="">----</option>
                    <option value="top">Top Rated</option>
                    <option value="popular">Popular</option>
                    <option value="recent">Recent</option>
                </select>
        </div> 
        <div class="campos-procura">
            <button type="submit" class="searchbtn">Search</button>
        </div>
    </form>
    <div class="line">
    </div>
    <br>
    </div>
    
        <section class="home">

            <div class="center">
                <div class="pagination_popular" style="display:none;">
                    <a href="#">&laquo;</a>
                    <a href="/search/popular/1">1</a>
                    <a href="/search/popular/2">2</a>
                    <a href="/search/popular/3">3</a>
                    <a href="/search/popular/4">4</a>
                    <a href="/search/popular/5">5</a>
                    <a href="/search/popular/6">6</a>
                    <a href="/search/popular/7">7</a>
                    <a href="/search/popular/8">8</a>
                    <a href="/search/popular/9">9</a>
                    <a href="/search/popular/10">10</a>
                    <a href="#">&raquo;</a>
                </div>

            <div class="pagination_top" style="display:none;">
                <a href="#" class="turn-back">&laquo;</a>
                <a href="/search/top/1">1</a>
                <a href="/search/top/2">2</a>
                <a href="/search/top/3">3</a>
                <a href="/search/top/4">4</a>
                <a href="/search/top/5">5</a>
                <a href="/search/top/6">6</a>
                <a href="/search/top/7">7</a>
                <a href="/search/top/8">8</a>
                <a href="/search/top/9">9</a>
                <a href="/search/top/10">10</a>
                <a href="#" class="turn-front">&raquo;</a>
            </div>

            <div class="pagination_recent" style="display:none;">
                <a href="#" class="turn-back">&laquo;</a>
                <a href="/search/recent/1">1</a>
                <a href="/search/recent/2">2</a>
                <a href="/search/recent/3">3</a>
                <a href="/search/recent/4">4</a>
                <a href="/search/recent/5">5</a>
                <a href="/search/recent/6">6</a>
                <a href="/search/recent/7">7</a>
                <a href="/search/recent/8">8</a>
                <a href="/search/recent/9">9</a>
                <a href="/search/recent/10">10</a>
                <a href="#" class="turn-front">&raquo;</a>
            </div>
        </div>
                <div class="popular">
                    <div class="popular-text">
                        <div class="text-row">
                            <h2> Movies </h2>
                        </div>
                </div>
            

                <div class="row">
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
                
                <div class="center">
                    <div class="pagination_popular" style="display:none;">
                        <a href="#">&laquo;</a>
                        <a href="/search/popular/1">1</a>
                        <a href="/search/popular/2">2</a>
                        <a href="/search/popular/3">3</a>
                        <a href="/search/popular/4">4</a>
                        <a href="/search/popular/5">5</a>
                        <a href="/search/popular/6">6</a>
                        <a href="/search/popular/7">7</a>
                        <a href="/search/popular/8">8</a>
                        <a href="/search/popular/9">9</a>
                        <a href="/search/popular/10">10</a>
                        <a href="#">&raquo;</a>
                    </div>
    
                    <div class="pagination_top" style="display:none;">
                        <a href="#" class="turn-back">&laquo;</a>
                        <a href="/search/top/1">1</a>
                        <a href="/search/top/2">2</a>
                        <a href="/search/top/3">3</a>
                        <a href="/search/top/4">4</a>
                        <a href="/search/top/5">5</a>
                        <a href="/search/top/6">6</a>
                        <a href="/search/top/7">7</a>
                        <a href="/search/top/8">8</a>
                        <a href="/search/top/9">9</a>
                        <a href="/search/top/10">10</a>
                        <a href="#" class="turn-front">&raquo;</a>
                    </div>

                    <div class="pagination_recent" style="display:none;">
                        <a href="#" class="turn-back">&laquo;</a>
                        <a href="/search/recent/1">1</a>
                        <a href="/search/recent/2">2</a>
                        <a href="/search/recent/3">3</a>
                        <a href="/search/recent/4">4</a>
                        <a href="/search/recent/5">5</a>
                        <a href="/search/recent/6">6</a>
                        <a href="/search/recent/7">7</a>
                        <a href="/search/recent/8">8</a>
                        <a href="/search/recent/9">9</a>
                        <a href="/search/recent/10">10</a>
                        <a href="#" class="turn-front">&raquo;</a>
                    </div>

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
