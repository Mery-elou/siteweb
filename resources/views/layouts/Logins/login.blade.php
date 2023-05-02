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
            border: 3px solid rgb(91, 160, 91);
            padding: 50px 0px;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <!-- grand navbar begin-->

        @include('bars.navbar')

    <!-- grand navbar end-->
    <div class="center">

        <!--2eme navbar-->

            @include('bars.2eme_navbar')

        <!--2eme navbar end-->

    <div style="margin-left:20%;margin-top: -70px;">


    <center>
        <div class="container" id="registration-form">
            <a href="" class="logo"><img src="{{asset('Images/logo.png')}}" alt=""></a>
                <form method="post" action="{{route('login')}}">
                    @csrf
                    @error('email')
                    <div class="alert alert-danger text-center   " style="margin-inline: 70px" role="alert">
                        Aucun utilisateur ne dispose de ces informations .
                      </div>
                    @enderror

                    @error('password')
                    <div class="alert alert-danger text-center   " style="margin-inline: 70px" role="alert">
                        Aucun utilisateur ne dispose de ces informations .
                      </div>
                    @enderror

                    <div class="form-group">
                        <div class="site">
                            <label for="mail">Email :</label>
                            <input type="email" class="form-control @error('email') is-valid @enderror" name="email" id="mail" placeholder="Ex : aaa12@exemple.com :" value="{{old('email')}}">
                        </div>
                        <div class="site">
                            <label for="pawd">password :</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="pawd" placeholder="mot de passe" >
                        </div>
                     </div>
                     <button type="submit" class="btn btn-success btn-lg ">Se Connecter</button>
                    <div class="form-group">
                        <div>
                            <h4 id="pfois">S'inscrire</h4>
                        </div>
                        <div class="site">
                           <a href="{{route('cree_c_client')}}"> <button type="button" class="btn btn-success btn-sm " id="username" > Cree compte client</button></a>
                           </div>
                        <div class="site">
                            <a href="{{route('cree_c_boutique')}}"><button type="button" class="btn btn-success btn-sm " id="username" >Cree votre boutique</button></a>
                        </div>
                     </div>
                </form>
            </div>
        </center>
        </div>
        </div>
</body>
</html>
