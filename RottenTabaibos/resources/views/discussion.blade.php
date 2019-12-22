@extends('layouts.layout')

@section('content')

<body>

    <main>

        <div class="popular-text">
            <h1> {{$name}} Discussion</h1>
        </div>
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
                <form action="/forum/discussion/{{$name}}" method="post">
                    <div class="container-post">
                        <h4>Title</h4>
                        <input type="text" name="title" placeholder="Insert a title for the Post"/>
        
                        <h4>Description</h4>
                        <textarea name="description" cols="60" rows="5" placeholder="Insert Post Description"></textarea>
                        <br>
                        <button class="post-create" type="submit"><i class="fa fa-plus"></i> Submit Post</button>
                    </div>

                </form>
            </div>
            

        

            <div class="line"></div>
            <br>
            <div class="forum-discussion">
                <p>Criado por:</p>
                <h3>Titulo 1</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo delectus debitis neque dignissimos natus voluptas, quae odit, temporibus eos aliquam laborum, voluptate iure repellat quibusdam consectetur consequuntur eum quaerat culpa.</p>
            </div>

            <div class="forum-discussion">
                <p>Criado por:</p>
                <h3>Titulo 2</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo delectus debitis neque dignissimos natus voluptas, quae odit, temporibus eos aliquam laborum, voluptate iure repellat quibusdam consectetur consequuntur eum quaerat culpa.</p>
            </div>

            <div class="forum-discussion">
                <p>Criado por:</p>
                <h3>Titulo 3</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Explicabo delectus debitis neque dignissimos natus voluptas, quae odit, temporibus eos aliquam laborum, voluptate iure repellat quibusdam consectetur consequuntur eum quaerat culpa.</p>
            </div>

            
        </div>
        <button class="post-btn" title="Create Post"><i class="fa fa-plus"></i></button>
    </main>

</body>

@endsection