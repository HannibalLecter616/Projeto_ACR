<!DOCTYPE html>
<html lang="en">

@extends('layouts.layout')

@section('content')

<body>
    <header>
        <div class="logo-container">
            <a href="/">
                <img src="/images/logo/1.png" alt="logo" height="38">
            </a>
        </div>
        <form method="GET" action="https://" accept-charset="UTF-8" id="quick-search" name="quick-search">
            <div id="quick-search-container">
                <input id="quick-search-input" name="query" placeholder="Pesquisar" autocomplete="off" type="search" >
            </div>
        </form>
            <div class="topnav">
                
                @if (Route::has('login'))
                <div class="nav-link">
                    
                    @auth
                        <a class="principal" href="/">Home</a>
                        <a href="/procura">Browse</a>
                    @else
                        <a class="principal" href="/">Home</a>
                        <a href="/procura">Browse</a>

                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>
    <hr>
    <main>
        <section class="home">
            <div class="popular">
                <div class="popular-text">
                    <div class="text-row">
                        <h2>
                            <i style="color:red;"></i> Popular Movies
                        </h2>
                        <h4>Browse All</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="/movie" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
            </div>
                </div>
            </div>
            <div class="recent">
                <div class="recent-text">
                    <div class="text-row">
                        <h2>
                            <i class="fas fa-plus" style="color: red;"></i></i> Recent Movies
                        </h2>
                        <h4>Browse All</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="#" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">Joker</a>
                            <div class="movie-year">2019</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
@endsection
</html>

