@extends('layouts.layout')

@section('content')

<main>
    <section class="presentation">
        <div class="row">
            <div class="movie-main">
                <a href="" class="movie-link">
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
                            <i class="fas fa-globe-africa" style="color: red;"> </i>{{$movie['original_title']}}
                            Website</a>
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

                    @if(count($crew) < 5)

                    @foreach($crew as $cast)
                    <div class="tableCell">
                                <a class="avatar-thumb" href="/search/people/{{$cast['id']}}/{{$cast['name']}}" target="_blank"
                                    title="IMDb Profile"> <img class="photo"
                                        src="https://image.tmdb.org/t/p/w185{{$cast['profile_path']}}" alt=""
                                        height="60" width="60">
                                </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="/search/people/{{$cast['id']}}/{{$cast['name']}}"><span itemprop="actor"
                                        itemscope itemtype="http://schema.org/Person"><span
                                            itemprop="name"><strong>{{$cast['name']}}</strong></span></span></a> as
                                {{$cast['character']}}
                            </div>

                        <div class="line"></div>
                    @endforeach
                    @else
                        @for ($i = 0; $i < 5; $i++) <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="/search/people/{{$crew[$i]['id']}}/{{$crew[$i]['name']}}" target="_blank"
                                    title="IMDb Profile"> <img class="photo"
                                        src="https://image.tmdb.org/t/p/w185{{$crew[$i]['profile_path']}}" alt=""
                                        height="60" width="60">
                                </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="/search/people/{{$crew[$i]['id']}}/{{$crew[$i]['name']}}"><span itemprop="actor"
                                        itemscope itemtype="http://schema.org/Person"><span
                                            itemprop="name"><strong>{{$crew[$i]['name']}}</strong></span></span></a> as
                                {{$crew[$i]['character']}}
                            </div>
                        </div>
                        <div class="line"></div>
                        @endfor
                    @endif

                <h4>Director</h4>
                <div class="list-cast">
                    @for ($i = 0; $i < count($director); $i++)
                    @if ($director[$i]['department']=='Directing' && $director[$i]['job'] == "Director"  )
                    <div
                        class="tableCell">
                        <a class="avatar-thumb" href="https://www.imdb.com/name/nm0000158/" target="_blank"
                            title="IMDb Profile"> <img class="photo"
                                src="https://image.tmdb.org/t/p/w185{{$director[$i]['profile_path']}}" alt="" height="60"
                                width="60">
                        </a>
                </div>
                <div class="list-cast-info tableCell">
                    <a class="name-cast" href="/search/people/{{$director[$i]['id']}}/{{$director[$i]['name']}}"><span itemprop="actor" itemscope
                            itemtype="http://schema.org/Person"><span
                                itemprop="name"><strong>{{$director[$i]['name']}}</strong></span></span></a>
                </div>

                    @endif
                @endfor
            </div>

        </div>
        </div>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="trailer">
                <h3>Trailer</h3>
                @if(count($trailer) != 0)
                <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$trailer[0]['key']}}">
                </iframe>
                @else
                <span>No trailer avaiable</span>
                <br>
                <iframe width="420" height="315" src="https://www.youtube.com/embed/Hu0KpdW4U0c">
                </iframe>
                @endif
            </div>
            @if (count($comment) != 0)
            <div class="reviews">
                <h3>Reviews</h3>
                @for ($i = 0; $i < count($comment); $i++)
                    <div class="review-properties">

                    Reviewed by <span class="review-author"><strong>{{$comment[$i]['author']}}</strong></span>
                    <span class="icon-star"></span>
                </div>
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
            <div class="recent">
                <div class="recent-text">
                    <div class="text-row">
                        <h2>
                            <i class="fas fa-plus" style="color: red;"></i> Similar Movies
                        </h2>
                        <a href="/browse">Browse All</a>
                    </div>
                </div>
                <div class="row">
                    @for ($i = 0; $i < 8; $i++)
                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="/movie/{{$recommendations[$i]['id']}}" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w500/.{{$recommendations[$i]['poster_path']}}" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="/movie/{{$recommendations[$i]['id']}}" class="movie-title">{{$recommendations[$i]['original_title']}}</a>
                            <div class="movie-year">{{substr($recommendations[$i]['release_date'],0,4)}}</div>
                        </div>
                    </div>
                    @endfor
                </div>
    </section>
</main>
</body>
@endsection
