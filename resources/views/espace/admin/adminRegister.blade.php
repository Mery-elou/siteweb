<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link href="{{asset('Bootstrap/bootstrap.css')}}" rel="stylesheet" >


    <style>

        .container{
            padding: 2% 0px;

        }
        .card-header {
            text-align: center;
        }
        .card-header img{
            width: 180px;
        }
         #cree_Compte{
            text-decoration: none;
            color: rgb(61, 60, 60);
            font-size: 15px;
        }
        .btn{
            width: 150px;
        }
        #alert{
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
        }
        #alert strong{
            text-align: center;
        }
        #title{
            padding-left:280px;
            color: green;
            text-decoration: overline;
            padding-bottom: 20px;

        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <h3 id="title">connecter comme admin</h3>
                <div class="card">
                    <div class="card-header" ><img src="{{asset('Images/logo.png')}}" alt=""></div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.check') }}">
                            @csrf
                            <div id="alert">
                            @if (Session::get('fail'))
                                <div class="alert alert-danger" id="alert"> <strong>{{ Session::get('fail') }}</strong></div>
                             @endif
                            </div>
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Probleme dans le saisie d'email</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('mot de passe ') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" >

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>Probleme dans le saisie de nom de passe</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>



                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Enregistrer ') }}
                                    </button>



                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>
