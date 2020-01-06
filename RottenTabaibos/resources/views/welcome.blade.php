@extends('layouts.layout')

    @section('content')


    <main>
        <section class="home">
            <div class="popular">
                <div class="popular-text">
                    <div class="text-row">
                        <h2>
                            <i class="fas fa-fire"  style="color:red;"></i> Popular Movies
                        </h2>
                        <a href="/search/popular/1" class="browse_all">Browse All</a>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="movie">
                        <a href="/movie/{{$popular[$i]['id']}}" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w500/.{{$popular[$i]['poster_path']}}" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="/movie/{{$popular[$i]['id']}}" class="movie-title">{{$popular[$i]['original_title']}}</a>
                            <div class="movie-year">{{substr($popular[$i]['release_date'],0,4)}}</div>
                        </div>
                    </div>
                    @endfor

                </div>
            </div>
            <div class="recent-text">
                <div class="row">
                    
                        <a href="/forum" class="forum_btn"> Join Discussion</a>
                    </div>
                </div>

            <div class="recent">
                    <div class="recent-text">
                    <div class="text-row">
                        <h2>
                            <i class="fas fa-plus" style="color: red;"></i> Recent Movies
                        </h2>
                        <a href="/search/recent/1" class="browse_all">Browse All</a>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="/movie/{{$upcoming[$i]['id']}}" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w500/.{{$upcoming[$i]['poster_path']}}" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="/movie/{{$upcoming[$i]['id']}}" class="movie-title">{{$upcoming[$i]['original_title']}}</a>
                            <div class="movie-year">{{substr($upcoming[$i]['release_date'],0,4)}}</div>
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </section>
    </main>
</body>
@endsection
