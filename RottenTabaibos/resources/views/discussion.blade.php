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
                <input type="text" placeholder="Create Post" class="post" readonly/>
            
            </div>

            <div class="row">
                <form class="newpost"  action="/forum/discussion/{{$name}}" method="post">
                        <label for="title">Title</label>
                        <input type="text" name="title" placeholder="Insert a title for the Post"/>
        
                        <label for="description">Description</label>
                        <textarea name="description" cols="60" rows="5" placeholder="Insert Post Description"></textarea>

                </form>
            </div>
            

        

            <div class="line"></div>

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