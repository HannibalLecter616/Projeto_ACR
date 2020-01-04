
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RottenTabaibos</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/images/logo/favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="/../css/style2.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>

<body>
    <header>
        <div class="logo-container">
            <a href="/">
                <img src="/images/logo/1.png" alt="logo" height="38">
            </a>
        </div>
        <form method="GET" action="/search" accept-charset="UTF-8" id="quick-search" name="quick-search">
            <div id="quick-search-container">
                <input id="quick-search-input" name="query" placeholder="Search" autocomplete="off" type="search" >
            </div>
        </form>
            <div class="topnav">
                @if (Route::has('login'))
                    <div class="nav-link">
                        @auth
                            <a class="principal" href="/">Home</a>
                            <a href="/browse">Browse</a>

                        @else
                            <a class="principal" href="/">Home</a>
                            <a href="/browse">Browse</a>

                            <a href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
            @auth
                <div class="usernav">
                        @php
                            $fname = Auth::user()->first_name;
                            $lname = Auth::user()->last_name;
                            $id = Auth::id();
                        @endphp

                            <a class="user-thumb" href="/user/{{$id}}">
                                <img src="/images/default_icon.png" alt="logo" height="38">
                            </a>

                            <div class="dropdown">
                                    <a class="user-thumb-name" href="/user/{{$id}}">
                                        {{$fname}} {{$lname}}
                                    </a>
                                
                                    <div class="dropdown-content">
                                        <a href="/user/{{$id}}/reviews">View Reviews</a> {{-- ir para pagina que mostra as reviews feitas pelo utilizador --}}
                                        <a href="/user/{{$id}}/posts">Posts</a> {{-- ir para pagina que mostra os post efetuados pelo utilizador--}}
                                        <a href="/logout">Logout</a>
                                    </div>  
                                </div>

                </div>
            @endauth
    </header>
    <hr>


            @yield('content')
            <script type="text/javascript" src="/../js/function.js"></script>

</html>
