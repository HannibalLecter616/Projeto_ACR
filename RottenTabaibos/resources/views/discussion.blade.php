@extends('layouts.layout')

@section('content')

<body>

    <main>

        <div class="popular-text">
            <h1> {{$name}} Discussion</h1>
        </div>

        @php
            $temp = "";

            if($name == "Movies"){
                $temp = "movies";
            } 

            if($name == "Series"){
                $temp = "series"; 

            } 

            if($name == "Random"){
                $temp = "random";
            }   
        @endphp

        <div class="row">
            {{-- Os posts de cada um dos foruns aparecem aqui --}}

            <div class="createPost">
                
                <div class="post">
                    <input class="input-post-read" type="text" placeholder="Create Post" readonly/>
                    <button class="post-create-btn" type="submit"><i class="fa fa-plus"></i> Submit</button>
                    <button class="post-cancel-btn" type="cancel"><i class="fa fa-minus"></i>Cancel</button>
                </div>
            </div>

            <div class="newpost">
                <form method="post" action="{{route('posts.store')}}" >
                    @csrf
                    <div class="container-post">

                        <h4>Title</h4>
                        <input type="text" name="title" placeholder="Insert a title for the Post"/>
        
                        <h4>Description</h4>
                        <textarea name="description" cols="60" rows="5" placeholder="Insert Post Description"></textarea>
                        <br>

                        <input type="hidden" name="type" value="{{$temp}}">
                        <button class="post-create" type="submit"><i class="fa fa-plus"></i> Submit Post</button>
                    </div>

                </form>
            </div>
            
            <div class="line"></div>
            <br>
        </div>
        <div class="row">
            @if (count($post) != 0)

                    @for ($i = 0; $i < count($post); $i++) 
                    <div class="post-full">
                        <div class="post">
                            <span class="post-author">  Criado por: <strong>{{$post[$i]['user_id']}}</strong></span>
                            <p class="post-title"><strong>{{$post[$i]['title']}}</strong></p>
    
                            <article>
                                <p class="post-body">{{$post[$i]['description']}}</p>
                            </article>
                        </div>
                        </div>

                    @endfor
            @endif
        </div>

            
       
        <button class="post-btn" title="Create Post"><i class="fa fa-plus"></i></button>
    </main>

</body>

@endsection