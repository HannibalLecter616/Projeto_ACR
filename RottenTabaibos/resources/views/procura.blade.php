<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RottenTabaibos</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <header>
        <div class="logo-container">
            <img src="/images/logo/1.png" alt="logo" height="38">
        </div>
        <form method="GET" action="https://" accept-charset="UTF-8" id="quick-search" name="quick-search">
            <div id="quick-search-container">
                <input id="quick-search-input" name="query" autocomplete="off" type="search" value="">
            </div>
        </form>
        <div class="topnav">
        @if (Route::has('login'))
                <div class="nav-link">

                    @auth
                        <a class="principal" href="/">Home</a>
                    @else
                        <a class="principal" href="/">Home</a>
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

    <div class="procura-principal">

            <label><b>Procurar Filmes / Series / Atores</b></label>
            <input type="text" placeholder="Inserir item de procura" name="nome_procura" >

        <div class="campos-procura">
                <label for="genero">Genero:</label>

                <select name="procura-genero" id="genero">
                    <option value="">----</option>
                    <option value="dog">Dog</option>
                    <option value="cat">Cat</option>
                    <option value="hamster">Hamster</option>
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
                    @foreach ($search as $movie)

                    <div class="movie">
                        <!-- https://image.tmdb.org/t/p/w185//udDclJoHjfjb8Ekgsd4FDteOkCU.jpg -->
                        <a href="/movie/{{$movie['id']}}" class="movie-link">
                            <img src="https://image.tmdb.org/t/p/w185{{$movie['poster_path']}}" alt="">
                        </a>
                        <div class="movie-box">
                            <a href="movie/fast-furious-presents-hobbs-shaw-2019.html" class="movie-title">{{$movie['original_title']}}</a>
                            <div class="movie-year">{{substr($movie['release_date'],0,4)}}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
</body>

</html>
