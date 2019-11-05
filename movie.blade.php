<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RottenTabaibos</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="index.html">
                <img src="/images/logo/1.png" alt="logo" height="38">
            </a>
        </div>
        <form method="GET" action="https://" accept-charset="UTF-8" id="quick-search" name="quick-search">
            <div id="quick-search-container">
                <input id="quick-search-input" name="query" autocomplete="off" type="search" value="Quick search">
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
    <main>
        <section class="presentation">
            <div class="row">
                <div class="movie-main">
                    <a href="#" class="movie-link">
                        <img src="https://image.tmdb.org/t/p/w500//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg" alt="" width="300">
                    </a>
                </div>
                <div class="movie-text">
                    <h1>Joker</h1>
                    <h4>2019</h4>
                    <h4>Mystery</h4>
                    <div class="info">
                        <div class="likes">
                            <i class="fas fa-heart"></i> 456
                        </div>
                        <div class="imdb">
                            <i class="fab fa-imdb"></i> 8,0
                        </div>
                        <div class="runtime">
                            <i class="far fa-clock"></i> 1hr 40 min
                        </div>
                        <i class="fas fa-calendar-alt"></i> 31 March 1995
                        <div class="website">
                            <i class="fas fa-globe-africa"></i> <a target="blank" href="http://www.foxmovies.com/movies/fight-club">Website</a>
                        </div>
                    </div>
                    <h4>Synopsis</h4>
                    <h5>During the 1980s, a failed stand-up co
                        median is driven insane and turns to a life of crime
                        and chaos
                        in Gotham City while becoming an infamous psychopathic crime figure.</h5>
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
                        <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="https://www.imdb.com/name/nm0000158/" target="_blank"
                                    title="IMDb Profile"> <img src="https://www.thefamouspeople.com/profiles/quiz_images/qid_19_leonardo-dicaprio.jpg" alt="Tom Hanks Picture">
                                </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="../browse-movies/Tom%20Hanks.html"><span itemprop="actor"
                                        itemscope itemtype="http://schema.org/Person"><span itemprop="name">Tom
                                            Hanks</span></span></a> as Woody
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="https://www.imdb.com/name/nm0000206/" target="_blank"
                                    title="IMDb Profile"> <img src="actors/thumb/nm0000206.jpg"
                                        alt="Keanu Reeves Picture"> </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="../browse-movies/Keanu%20Reeves.html"><span itemprop="actor"
                                        itemscope itemtype="http://schema.org/Person"><span itemprop="name">Keanu
                                            Reeves</span></span></a> as Duke
                                Caboom
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="https://www.imdb.com/name/nm0376716/" target="_blank"
                                    title="IMDb Profile"> <img src="actors/thumb/nm0376716.jpg"
                                        alt="Christina Hendricks Picture"> </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="../browse-movies/Christina%20Hendricks.html"><span
                                        itemprop="actor" itemscope itemtype="http://schema.org/Person"><span
                                            itemprop="name">Christina Hendricks</span></span></a>
                                as Gabby Gabby
                            </div>
                        </div>
                        <div class="line"></div>
                        <div class="list-cast">
                            <div class="tableCell">
                                <a class="avatar-thumb" href="https://www.imdb.com/name/nm0001835/" target="_blank"
                                    title="IMDb Profile"> <img src="actors/thumb/nm0001835.jpg"
                                        alt="Carl Weathers Picture"> </a>
                            </div>
                            <div class="list-cast-info tableCell">
                                <a class="name-cast" href="../browse-movies/Carl%20Weathers.html"><span itemprop="actor"
                                        itemscope itemtype="http://schema.org/Person"><span itemprop="name">Carl
                                            Weathers</span></span></a> as
                                Combat Carls
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="line"></div>
            <div class="row">
                <div class="trailer">
                    <h3>Trailer</h3>
                    <iframe width="420" height="315" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                    </iframe>
                </div>
                <div class="reviews">
                    <h3>Reviews</h3>
                    <div class="review-properties">
                        Reviewed by <span class="review-author">DJKwa</span>
                        <span class="icon-star"></span>
                        <span class="review-rating">9 / 10</span>
                    </div>
                    <h4>A sequel that didn't need to be made...but I'm glad it was!</h4>
                    <article>
                        <p>As far as conclusions to beloved franchises go, Toy Story 3 is hard to beat. The film tugs at
                            the heartstrings,
                            as we learn that Andy&#39;s toys are no longer his, and cuts deep with the realisation that
                            growing up means
                            letting go.<br /><br />Naturally, I had a lot of trepidation heading into Toy Story 4. It
                            wasn&#39;t so much
                    </article>
                    <div class="line"></div>
                    <br>
                    <div class="review-properties">
                        Reviewed by <span class="review-author">DJKwa</span>
                        <span class="icon-star"></span>
                        <span class="review-rating">9 / 10</span>
                    </div>
                    <h4>A sequel that didn't need to be made...but I'm glad it was!</h4>
                    <article>
                        <p>As far as conclusions to beloved franchises go, Toy Story 3 is hard to beat. The film tugs at
                            the heartstrings,
                            as we learn that Andy&#39;s toys are no longer his, and cuts deep with the realisation that
                            growing up means
                            letting go.<br /><br />Naturally, I had a lot of trepidation heading into Toy Story 4. It
                            wasn&#39;t so much
                    </article>
                    <div class="line"></div>
                    <br>
                    <div class="review-properties">
                        Reviewed by <span class="review-author">DJKwa</span>
                        <span class="icon-star"></span>
                        <span class="review-rating">9 / 10</span>
                    </div>
                    <h4>A sequel that didn't need to be made...but I'm glad it was!</h4>
                    <article>
                        <p>As far as conclusions to beloved franchises go, Toy Story 3 is hard to beat. The film tugs at
                            the heartstrings,
                            as we learn that Andy&#39;s toys are no longer his, and cuts deep with the realisation that
                            growing up means
                            letting go.<br /><br />Naturally, I had a lot of trepidation heading into Toy Story 4. It
                            wasn&#39;t so much
                    </article>
                </div>

            </div>
            </div>
        </section>
    </main>
</body>

</html>