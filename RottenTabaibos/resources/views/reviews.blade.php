@extends('layouts.layout')

@section('content')

<main>
    <div class="popular-text">   
        <h2>My Reviews</h2>
    </div>

@if (count($reviews) != 0)

    @for ($i = 0; $i < count($reviews); $i++)
    <div class="my-post">
        <div class="review">

            <a href="/movie/{{$reviews[$i]['movie_id']}}" class="review_movie">
                <img src="https://image.tmdb.org/t/p/w500/.{{$movies[$reviews[$i]['movie_id']]['poster_path']}}" alt="" width="150">
            </a>
            <div class="content">
                <p class="post-title"><strong>In : <a href="/movie/{{$reviews[$i]['movie_id']}}">{{$movies[$reviews[$i]['movie_id']]['original_title']}}</a></strong></p>
                <article>
                <p class="post-body">{{$reviews[$i]['body']}}</p>
                </article>
            </div>
            
        </div>  
    </div>
    @endfor

@endif

</main>

@endsection