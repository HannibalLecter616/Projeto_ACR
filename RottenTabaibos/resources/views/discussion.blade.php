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

                        @if ($post[$i]['type'] == $temp)
                            @php
                                $name = $post[$i]['first_name']." ".$post[$i]['last_name'];
                                $id =  $post[$i]['id'];
                            @endphp

                            <div class="post-full">
                                <div class="post">
                                    <span class="post-author">  Criado por: <strong>{{$name}}</strong></span>
                                    <p class="post-title"><strong>{{$post[$i]['title']}}</strong></p>

                                    <article>
                                        <p class="post-body">{{$post[$i]['description']}}</p>
                                    </article>
                                    <form action="/forum/discussion/post/like/{{$post[$i]['id']}}" method="POST">
                                        @csrf
                                        <button type="submit" class="post-like">Like</button>
                                    </form>
                                   
                                    <form action="/forum/discussion/post/dislike/{{$post[$i]['id']}}" method="POST">
                                        @csrf
                                        <button type="submit" class="post-dislike">Dislike</button>
                                    </form>
                                    <button class="post-reply">Reply</button>
                                </div>

                            <div class="new_reply">
                                <form class="reply_comments" method="post" action="{{route('replies.store')}}" >
                                    @csrf
                                    <div class="container-reply">
    
                                    <h4>Reply to {{$name}}</h4>
                                        <textarea name="reply" cols="60" rows="5" placeholder="Insert Reply"></textarea>
                                        <input type="hidden" name="type" value="{{$temp}}">
                                        <input type="hidden" name="post_id" value={{$id}}>
                                        <button class="reply-create" type="submit"><i class="fa fa-plus"></i> Send</button>
                                    </div>
                                </form>
                            </div>

                            @if (count($replies) != 0)
                                @for ($j = 0; $j < count($replies); $j++)
                            
                                    @if ($replies[$j]['post_id'] == $id)
                                            <br>
                                            <div class="reply">
                                                <div class="post-author">  Criado por: <strong>{{$name}}</strong></div>

                                                <article>
                                                    <p class="post-body">{{$replies[$j]['reply']}}</p>
                                                </article>

                                                <form action="/forum/discussion/reply/like/{{$replies[$j]['id']}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="post-like">Like</button>
                                                </form>

                                                <form action="/forum/discussion/reply/dislike/{{$replies[$j]['id']}}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="post-dislike">Dislike</button>
                                                </form>

                                                <button class="post-reply">Reply</button>
                                            </div>
                                        @endif
                                    
                                @endfor
                                 
                            @endif

                        </div>
                        
                        @endif
                    @endfor
                @endif
        </div>

            
       
        <button class="post-btn" title="Create Post"><i class="fa fa-plus"></i></button>
    </main>

</body>

@endsection