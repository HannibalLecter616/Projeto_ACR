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
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="/images/logo/1.png" alt="logo" height="38">
        </div>
        <div class="topnav">
                <a class="principal" href="/">Home</a>
                <a href="{{ route('login') }}">Login</a>
        </div>

    </header>
        <hr>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="container">
                <h1 style="text-align: center;">Register</h1>
                <p>Please insert the following data </p>
                <hr>

                {{-- <form>
                    <label for="utilizador_tipo"><b>Tipo de Utilizador</b></label> <br>
                        <div class="utilizadores">
                            <label class="radio-inline">
                              <input type="radio" name="utilizador">Comum
                            </label>
                            <label class="radio-inline">
                              <input type="radio" name="utilizador">Critico Profissional
                            </label>
                        </div>
                </form>
                <hr> --}}


                <label for="first_name"><b>First Name</b></label>
                <input type="text" placeholder="Insert First Name" name="first_name" required>

                <label for="last_name"><b>Last Name</b></label>
                <input type="text" placeholder="Insert Last Name" name="last_name" required>

                <label for="email"><b>Email</b></label>
                <input type="text" placeholder="Insert Email" name="email" required>

<!--Mostrar só se for selecionado o utilizador Critico-->

                {{-- <label for="jornal"><b>Jornal/Revista/Entidade Crítica</b></label>
                <input type="text" placeholder="Inserir Empresa que representa" name="jornal" required> --}}
<!------------------------------------------------------>
                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="password" required>

                <label for="password_confirmation"><b>Repeat Password</b></label>
                <input type="password" placeholder="Repeat Password" name="password_confirmation" required>


                <hr>

                <p>By creating an account you are agreeing with our <a href="#">Terms and Privacy</a>.</p>
                <button type="submit" class="registerbtn">{{ __('Register') }}</button>
            </div>

            <div class="container signin">
                <p>Already have an account? <a href="{{ route('login') }}">Sign in</a>.</p>
            </div>
        </form>
</body>

</html>
<!--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
-->
