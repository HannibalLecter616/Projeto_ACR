@extends('layouts.layout')

@section('content')

<main>
    <div class="popular-text">   
        <h2>My Posts</h2>
    </div>

@if (count($posts) != 0)

    @for ($i = 0; $i < count($posts); $i++)
    <div class="my-post">
        <div class="post">

            <p class="post-title"><strong>{{$posts[$i]['title']}}</strong></p>

            <article>
                <p class="post-body">{{$posts[$i]['description']}}</p>
            </article>
            
        </div>  
    </div>
    @endfor

@endif

</main>

@endsection