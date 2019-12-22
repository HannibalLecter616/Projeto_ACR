@extends('layouts.layout')

@section('content')

<body>

    <main>
        
            <div class="popular-text">
                
                    <h2>Forum</h2>
                
            </div>

            @php
                $movie = "movies";
                $serie = "series";
                $random = "random";    
            @endphp

            <div class="forum-topics">
                    <a href="/forum/discussion/{{$movie}}">Movies</a>
            </div>
    
            <div class="forum-topics">
                <a href="/forum/discussion/{{$serie}}">Series</a>
            </div>
                
            <div class="forum-topics">
                <a href="/forum/discussion/{{$random}}">Random</a>
            </div>

        <hr>

        <div class="popular-text">
            <h2>Popular Posts in Discussion</h2>
        </div>
                
        
    </main>   

</body>

@endsection