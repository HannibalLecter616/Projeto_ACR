<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RottenTabaibos</title>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.11.1/css/all.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <div class="logo-container">
        </div>

        <div class="topnav">
            <a class="principal" href="/home">Home</a>
            <a href="{{ route('register') }}">Register</a>
            <a href="{{ route('login')}}">Login</a>
        </div>

    </header>
        <hr>
        
    <form method="POST" action="{{ route('password.email') }}">
        @csrf 
        <div class="avatar-container"> 
            
            <img src= "/images/logo/1.png" alt="Avatar" class="avatar"> 
        </div> 
  
        <div class="reset-container">

        <label for="email"><b>{{ __('Endereço de Email da conta') }}</b></label> 
            <br>
            <input type="text" placeholder="Inserir Nome do Utilizador / email" name="email" required> 

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <button type="submit" class="reset_password">
                {{ __('Enviar Link Reset Palavra Passe') }}
            </button>
        </div> 
    </form> 
</body>

</html>

<!-- ------------------------------------------------------- 

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
