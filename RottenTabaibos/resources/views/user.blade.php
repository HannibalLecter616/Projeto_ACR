@extends('layouts.layout')

@section('content')
<main>
    <section class="presentation">
        <div class="row">
            <div class="movie-main">
                <a href="#" class="movie-link">
                    @if (Auth::user()->avatar == "")
                    <img src="/images/default_icon.png" alt="" width="300px">
                    @else
                    <img src="/images/avatars/{{Auth::user()->avatar}}" width="300px">
                    @endif
                    <div class="edit_img">Change Profile Picture</div>
                    {{--  @else
                                {{-- vai buscar a base de dados a imagem --}}
                    {{-- <img src="https://image.tmdb.org/t/p/w500{{$pessoa_detalhes['profile_path']}}" alt=""
                    width="300px"> --}}
                    {{--  @endif --}}
                </a>
            </div>
            <div class="movie-text">
                <h1>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</h1>
                <h4>Biografia</h4>
                <h5 class="bio-text">{{Auth::user()->biography}}</h5>
                <h4>Email</h4>
                <h5>{{Auth::user()->email}}</h5>
                <h4>Born at:</h4>
                <h5>{{Auth::user()->born}}</h5>
                {{-- adicionar campo para idade da pessoa --}}
                <h4>Account created at:</h4>
                <h5>{{Auth::user()->created_at}}</h5>
                <a href="/uptd_profile" class="updt_button">Edit Profile</a>
            </div>
            {{-- <div class="line"></div> --}}
        </div>
        <div class="row">
            <div class="recent-text">
                <div class="text-row">
                    <h2>
                        Movies Reviewed
                    </h2>
                    @if(empty($images))
                    No movies reviewed yet
                    @else
                    @foreach ($images as $image)
                    <img src="https://image.tmdb.org/t/p/w500/.{{$image['poster_path']}}" alt="" width="300">
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
