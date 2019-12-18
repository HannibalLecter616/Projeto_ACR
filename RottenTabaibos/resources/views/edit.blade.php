@extends('layouts.layout')

@section('content')



    <main>
        <form action="/users/update" method="post">
            @csrf
            <div class="container">
                <h1>Edit Profile</h1>

                <label for="first_name"><b>First Name</b></label>
                <input type="text" value="{{Auth::user()->first_name}}" name="first_name">

                <label for="last_name"><b>Last Name</b></label>
                <input type="text" value="{{Auth::user()->last_name}}" name="last_name">
                
                <label for="biography"><b>Biography</b></label>
                <br>
                <textarea name="biography" cols="80" rows="4">
                {{Auth::user()->biography}}
                </textarea>
                <br>
                <label for="email"><b>Email</b></label>
                <input type="text" value="{{Auth::user()->email}}" name="email">

                <label for="born"><b>Born at</b></label>
                <br>
                <input type="date" name="born" value="{{Auth::user()->born}}" />  
                <br><br>
                <button type="submit" class="updatebtn">Update</button>

            </div>

        </form>        

    </main>

@endsection