<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RottenTabaibos</title>
    <link rel="icon" type="image/png" sizes="16x16" href="\RottenTabaibos\public\favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="/../css/style.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="/">
                <img src="/images/logo/1.png" alt="logo" height="38">
            </a>
        </div>
        <form method="GET" action="/search/" accept-charset="UTF-8" id="quick-search" name="quick-search">
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
        <section class="presentation">
            <div class="row">
                <div class="movie-main">
                    <a href="#" class="movie-link">
                        <img src="https://image.tmdb.org/t/p/w500/.{{$movie['poster_path']}}" alt="" width="300">
                    </a>
                </div>
                <div class="movie-text">
                    <h1>{{$movie['original_title']}}</h1>
                    <h4>{{substr($movie['release_date'],0,4)}}</h4>
                    <h4>{{$movie['genres'][0]['name']}}</h4>
                    <div class="info">
                        <div class="likes">
                            <i class="fas fa-heart " style="color:red"></i> {{$movie['vote_count']}}
                        </div>
                        <div class="imdb">
                            <i class="fab fa-imdb " style="color: red;"></i> {{$movie['vote_average']}}
                        </div>
                        <div class="runtime">
                            <i class="far fa-clock" style="color: red;"></i> {{$movie['runtime']}} minutes
                        </div>
                        <i class="fas fa-calendar-alt" style="color: red;"></i> {{$movie['release_date']}}
                        <div class="website">
                            <a target="blank" href={{$movie['homepage']}}>
                                <i class="fas fa-globe-africa" style="color: red;">  </i>{{$movie['original_title']}} Website</a>
                        </div>
                    </div>
                    <h4>Synopsis</h4>
                    <h5>{{str_limit($movie['overview'],170)}}</h5>
                     <h4>Your Review</h4>
                    <div class=" rating-star">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
                                title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4half" name="rating" value="4 and a half" /><label class="half"
                                for="star4half" title="Pretty good - 4.5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
                                title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3half" name="rating" value="3 and a half" /><label class="half"
                                for="star3half" title="Meh - 3.5 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
                                title="Meh - 3 stars"></label>
                            <input type="radio" id="star2half" name="rating" value="2 and a half" /><label class="half"
                                for="star2half" title="Kinda bad - 2.5 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
                                title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1half" name="rating" value="1 and a half" /><label class="half"
                                for="star1half" title="Meh - 1.5 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
                                title="Sucks big time - 1 star"></label>
                            <input type="radio" id="starhalf" name="rating" value="half" /><label class="half"
                                for="starhalf" title="Sucks big time - 0.5 stars"></label>
                        </fieldset>
                    </div>
                </div>
                <div class="crew">
                    <div class="actors">
                        <h4>Cast</h4>
                        @for ($i = 0; $i < 4; $i++)
                        <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="https://www.imdb.com/name/nm0000158/" target="_blank"
                            title="IMDb Profile"> <img class="photo" src="https://image.tmdb.org/t/p/w185{{$crew[$i]['profile_path']}}" alt="" height="60" width="60">
                                </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="../browse-movies/Tom%20Hanks.html"><span itemprop="actor"
                                itemscope itemtype="http://schema.org/Person"><span itemprop="name"><strong>{{$crew[$i]['name']}}</strong></span></span></a> as {{$crew[$i]['character']}}
                            </div>
                        </div>
                        <div class="line"></div>
                        @endfor
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="row">
                <div class="trailer">
                    <h3>Trailer</h3>
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$trailer[0]['key']}}">
                    </iframe>
                </div>
                @if (count($comment) != 0)
                <div class="reviews">
                    <h3>Reviews</h3>
                    @for ($i = 0; $i < 3; $i++)

                    <div class="review-properties">

                        Reviewed by <span class="review-author"><strong>{{$comment[$i]['author']}}</strong></span>
                        <span class="icon-star"></span>
                        {{-- <span class="review-rating">9 / 10</span> --}}
                    </div>
                    {{-- <h4>A sequel that didn't need to be made...but I'm glad it was!</h4> --}}
                    <article>
                        <p>{{str_limit($comment[$i]['content'],200)}}</p>
                    </article>
                    <div class="line"></div>
                    <br>
                    @endfor
                </div>
                @else
                <div class="reviews">
                    <h3>Reviews</h3>
                    <div class="line"></div>
                    <h4>No reviews yet!</h4>
                    <br>
                </div>
                @endif

            </div>
            </div>
        </section>
    </main>
</body>

</html>
