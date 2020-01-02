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
                    @if(!$average==0)
                   <div class="rate">
                        <i class="fas fa-star-half-alt" style="color: red;"></i></i> {{$average}}
                    </div>
                    @endif
                </div>
                <h4>Synopsis</h4>


                <h5 class="bio-text">{{$movie['overview']}}</h5>

                @auth
                @if(Auth::user()->type == 1)

                <h4>Your Review</h4>
                <form method="POST" action={{route('comments.store')}}>
                <div class=" rating-star">
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
                            title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
                            title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
                            title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
                            title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
                            title="Sucks big time - 1 star"></label>
                    </fieldset>
                </div>
                    <input type="text" name="body" placeholder="What did you think of this movie?">
                    <input type="hidden" name="movie_id" value={{$movie['id']}}>
                    {{ csrf_field() }}  
                    <input type="submit" class="submit-bttn" value="Submit">
                </form>

                @elseif(Auth::user()->type == 2)


                <form method="POST" action={{route('critics.store')}}>
                    <div class=" rating-star">
                        <fieldset class="rating">
                            <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"
                                title="Awesome - 5 stars"></label>
                            <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"
                                title="Pretty good - 4 stars"></label>
                            <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"
                                title="Meh - 3 stars"></label>
                            <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"
                                title="Kinda bad - 2 stars"></label>
                            <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"
                                title="Sucks big time - 1 star"></label>
                        </fieldset>
                    </div>
                        <textarea name="body" placeholder="Give your opinion about this movie" cols="50" rows="3"></textarea>
                        <input type="hidden" name="movie_id" value={{$movie['id']}}>
                        {{ csrf_field() }}  
                        <input type="submit" class="submit-bttn" value="Submit">
                    </form>

                @endif
                @endauth
            </div>
            <div class="crew">
                <div class="actors">
                    <h4>Cast <i class="fas fa-user-friends" style="color:red"></i></h4>

                    @if(count($crew) < 5) @foreach($crew as $cast) <div class="list-cast">
                        <div class="tableCell">
                            <a class="avatar-thumb" href="/search/people/{{$cast['id']}}/{{$cast['name']}}"
                                target="_blank" title="IMDb Profile">
                                @if (empty($cast['profile_path']))
                                <img class="photo" src="/images/default_icon.png" alt="" height="60" width="60">
                                @else
                                <img class="photo" src="https://image.tmdb.org/t/p/w185{{$cast['profile_path']}}" alt=""
                                    height="60" width="60">
                                @endif
                            </a>
                        </div>
                        <div class="list-cast-info tableCell">
                            <a class="name-cast" href="/search/people/{{$cast['id']}}/{{$cast['name']}}">
                                <span itemprop="actor" itemscope itemtype="http://schema.org/Person">
                                    <span itemprop="name"><strong>{{$cast['name']}}</strong></span></span></a> as
                            {{$cast['character']}}
                        </div>
                </div>
                <div class="line"></div>
                @endforeach
                @else
                @for ($i = 0; $i < 5; $i++) <div class="list-cast">
                    <div class="tableCell">
                        <a class="avatar-thumb" href="/search/people/{{$crew[$i]['id']}}/{{$crew[$i]['name']}}"
                            target="_blank" title="IMDb Profile">

                            @if (empty($crew[$i]['profile_path']))
                            <img class="photo" src="/images/default_icon.png" alt="" height="60" width="60">
                            @else
                            <img class="photo" src="https://image.tmdb.org/t/p/w185{{$crew[$i]['profile_path']}}" alt=""
                                height="60" width="60">
                            @endif
                        </a>
                    </div>
                    <div class="list-cast-info tableCell">
                        <a class="name-cast" href="/search/people/{{$crew[$i]['id']}}/{{$crew[$i]['name']}}"><span
                                itemprop="actor" itemscope itemtype="http://schema.org/Person"><span
                                    itemprop="name"><strong>{{$crew[$i]['name']}}</strong></span></span></a> as
                        {{$crew[$i]['character']}}
                    </div>
            </div>
            <div class="line"></div>
            @endfor
            @endif

            <h4>Director</h4>
            <div class="list-cast">
                @for ($i = 0; $i < count($director); $i++) @if ($director[$i]['department']=='Directing' &&
                    $director[$i]['job']=="Director" ) <div class="tableCell">
                    <a class="avatar-thumb" href="https://www.imdb.com/name/nm0000158/" target="_blank"
                        title="IMDb Profile">

                        @if (empty($director[$i]['profile_path']))
                        <img class="photo" src="/images/default_icon.png" alt="" height="60" width="60">
                        @else
                        <img class="photo" src="https://image.tmdb.org/t/p/w185{{$director[$i]['profile_path']}}" alt=""
                            height="60" width="60">
                        @endif

                    </a>
            </div>
            <div class="list-cast-info tableCell">
                <a class="name-cast" href="/search/people/{{$director[$i]['id']}}/{{$director[$i]['name']}}"><span
                        itemprop="actor" itemscope itemtype="http://schema.org/Person"><span
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

            @php
                $num = 0;
                @endphp
                @if (count($comment) != 0)

                    <div class="reviews">
                    <h3>Critics Reviews</h3>

                    @for ($i = 0; $i < count($comment); $i++) 
                    <div class="review-properties">

                        Reviewed by
                        <span class="review-author"><strong>{{$comment[$i]['author']}}</strong></span>
                        <span class="icon-star"></span>

                        <article>
                            <p class="critic-review">{{$comment[$i]['content']}}</p>
                        </article>
                        <div class="line"></div>
                        <br>
                    </div>
                        @php
                        $num++;
                        @endphp
                    @endfor

                    @if(count($critics) != 0)
                        @foreach ($critics as $critic)                
                            @if ($movie['id'] == $critic->movie_id)
                                <div class="review-properties">

                                    Reviewed by <span class="review-author"><strong>{{$critic->first_name}}
                                            {{$critic->last_name}}</strong></span> 
                                    @for ($i = 0; $i < $critic->star; $i++)
                                        <span class="icon-star"></span>
                                        @endfor
                                        @auth
                                            @if(Auth::user()->id == $critic->user_id)

                                            <form action="/remove/critics/{{$critic->id}}" method="POST">
                                                @csrf  
                                                <input type="hidden" name="movie_comment" value="{{$critic->movie_id}}">
                                                <input type="hidden" name="comment_id" value="{{$critic->id}}">
                                                <input type="submit"class="fas fa-trash"/>
                                            </form>

                                            @endif
                                        @endauth
                                        
                                        <article>
                                            <p class="critic-review">{{$critic->body}}</p>

                                        </article>
                                        <div class="line"></div>
                                        <br>
                                </div>
                                    @php
                                    $num++;
                                    @endphp
                            @endif
                        @endforeach
                    @endif

                    @elseif(count($critics) != 0)
                        <div class="reviews">
                        <h3>Critics Reviews</h3>
                        @foreach ($critics as $critic)                
                            @if ($movie['id'] == $critic->movie_id)
                                <div class="review-properties">

                                    Reviewed by <span class="review-author"><strong>{{$critic->first_name}}
                                            {{$critic->last_name}}</strong></span>
                                    @for ($i = 0; $i < $critic->star; $i++)
                                        <span class="icon-star"></span>
                                        @endfor
                                        @auth
                                            @if(Auth::user()->id == $critic->user_id)
                                            
                                            <form action="/remove/critics/{{$critic->id}}" method="POST">
                                                @csrf  
                                                <input type="hidden" name="movie_comment" value="{{$critic->movie_id}}">
                                                <input type="hidden" name="comment_id" value="{{$critic->id}}">
                                                <input type="submit"class="fas fa-trash"/>
                                            </form>
                                            @endif
                                        @endauth
                                    
                                        <article>
                                            <p class="critic-review">{{$critic->body}}</p>

                                        </article>
                                        <div class="line"></div>
                                        <br>
                                </div>
                                    @php
                                    $num++;
                                    @endphp
                            @endif
                        @endforeach
                    @if($num == 0)

                            <h4>No reviews yet!</h4>
                    @endif
                @endif
            @if ($num > 3)
                <div class="all">Show All</div>
                <div class="few">Show Few</div>
            @endif
        </div>


        @if (count($comments) != 0)
        <div class="reviews">
            <h3>Users Reviews</h3>
            @php
            $num2 = 0;
            @endphp

            @foreach ($comments as $item)
            @if ($movie['id'] == $item->movie_id)
            <div class="user-review-properties">

                Reviewed by <span class="review-author"><strong>{{$item -> first_name}}
                        {{$item -> last_name}}</strong></span>
                @for ($i = 0; $i < $item->star; $i++)
                    <span class="icon-star"></span>
                    @endfor
                    
                    @auth
                        @if(Auth::user()->id == $item->user_id)
                        @php
                            $id = $item->user_id;
                        @endphp
                            <form action="/remove/comments/{{$item->id}}" method="POST">
                                @csrf  
                                <input type="hidden" name="movie_comment" value="{{$item->movie_id}}">
                                <input type="hidden" name="comment_id" value="{{$item->id}}">
                                <input type="submit"class="fas fa-trash"/>
                            </form>
                        @endif
                    @endauth
                    
                    <article>
                        <p>{{str_limit($item->body,200)}}</p>

                    </article>
                    <div class="line"></div>
                    <br>
            </div>
                @php
                $num2++;
                @endphp
            @endif
            @endforeach
            
            @if ($num2 == 0)
                <div class="line"></div>
                <h4>No reviews yet!</h4>
                <br>
            @endif
            @if ($num2 >= 3)
                <div class="all_u_rev">Show All</div>
                <div class="few_u_rev">Show Few</div>
            @endif

            
        </div>
            @else
            <div class="reviews">
                <h3>User Reviews</h3>
                <div class="line"></div>
                <h4>No reviews yet!</h4>
                <br>
            </div>
            @endif

        </div> {{--fecha a row--}}

        <div class="line"></div>
        <div class="row">
            <a href="/forum" class="forum_btn">Forum</a>
        </div>
        <div class="line"></div>
        <div class="row">
            <div class="trailer">
                <h3>Trailer <i class="fas fa-video" style="color:red"></i> </h3>
                @if(count($trailer) != 0)
                <iframe width="420" height="315" src="https://www.youtube.com/embed/{{$trailer[0]['key']}}">
                </iframe>
                @else
                <span>No trailer avaiable</span>
                <br>
                <iframe width="420" height="315" src="https://www.youtube.com/embed/Hu0KpdW4U0c">
                </iframe>
                @endif
                <br><br>
            </div>
            <div class="images">
                <h3>Images <i class="fas fa-images" style="color:red"></i></h3>

                @if (empty($images))
                <img src="/images/no_image.png" alt="" width="300px">
                @else
                @foreach ($images as $image)
                <div class="slideshow-container">
                    <div class="mySlides fade">
                        <img src="https://image.tmdb.org/t/p/w500{{$image['file_path']}}">
                    </div>
                </div>
                @endforeach
                @endif

            </div>
        </div>
        <div class="row">
            <div class="recent-text">
                <div class="text-row">
                    <h2>
                        Similar Movies
                    </h2>
                </div>
            </div>

            @for ($i = 0; $i < count($recommendations); $i++) 
            <div class="movie_more">
                <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                <a href="/movie/{{$recommendations[$i]['id']}}" class="movie-link">
                    <img src="https://image.tmdb.org/t/p/w500/.{{$recommendations[$i]['poster_path']}}" alt="">

                </a>
                <div class="movie-box">
                    <a href="/movie/{{$recommendations[$i]['id']}}"
                        class="movie-title">{{$recommendations[$i]['original_title']}}</a>
                    <div class="movie-year">{{substr($recommendations[$i]['release_date'],0,4)}}</div>
                </div>
        </div>
        @endfor
        <div class="row">

            <div class="more">Show more</div>
        <div class="less">Show less</div>
        </div>
        
    </section>
</main>
</body>
@endsection
