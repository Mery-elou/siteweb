<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email</title>
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link href="{{asset('Bootstrap/bootstrap.css')}}" rel="stylesheet" >
</head>
<body>


    <!--header start-->
        @include('bars.navbar')
    <!--header end-->

<div class="center">

    <!--2eme navbar-->
    @include('bars.2eme_navbar')
    <!--2eme navbar end-->

<div style="margin-left:20%;margin-top: -70px;">
    <center>
    <div class="container" id="registration-form">
        <a href="" class="logo"><img src="{{asset('Images/logo.png')}}" alt=""></a>
            <form method="POST" action="{{route('cree_c_boutique')}}" id="connection_boutique">
                @csrf

                <!-- GESTION DES ERRORS BEGIN-->
                @if ($errors->has('nome') && $errors->has('prenome') && $errors->has('email') && $errors->has('passworde') && $errors->has('nom_boutique') && $errors->has('banque'))
                    <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                      Remolire tout les champs Correctement
                    </div>

                    @elseif ($errors->has('nome') && $errors->has('prenome'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie de Nom et Prenom .
                        </div>
                    @elseif ($errors->has('nome') )
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie de Nom  .
                        </div>
                    @elseif ( $errors->has('prenome'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie de  Prenom .
                        </div>
                        @elseif ($errors->has('email'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie d’e-mail .
                        </div>
                    @elseif ($errors->has('passworde'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie mot de passe .
                        </div>
                    @elseif ($errors->has('nom_boutique'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie Nom Boutique .
                        </div>
                    @elseif ($errors->has('banque'))
                        <div class="alert alert-danger text-center" style="margin-inline: 70px" role="alert">
                            Problème de saisie Numero Carte Bancaire
                        </div>
                @endif
                <!-- GESTION DES ERRORS END-->

                <div class="form-group">
                    <div class="site">
                        <label for="username">Nom :</label>
                        <input type="text" class="form-control @if ($errors->has('nome')) is-invalid   @endif" id="username" name="nome" placeholder="Nom :" value={{old('nome')}} >
                    </div>
                    <div class="site">
                        <label for="username">Prenom :</label>
                        <input type="text" class="form-control @if ($errors->has('prenome')) is-invalid   @endif" id="username" name="prenome" placeholder="Prenom :" value={{old('prenome')}}>
                    </div>
                 </div>
                <div class="site">
                    <label for="email">Email :</label>
                    <input type="email" class="form-control @if ($errors->has('email')) is-invalid   @endif" id="email" name="email" placeholder="Ex : aaa12@gmail.com" value={{old('email')}}>
                </div>
                <div class="site">
                    <label for="pwd"> Mot de Passe :</label>
                    <input type="password" class="form-control @if ($errors->has('passworde')) is-invalid   @endif" id="pwd" name="passworde" placeholder="Min = 8 caractere" min="8" >
                </div>
                <div class="form-group">
                    <label for="email">Nom de la boutique :</label>
                    <input type="text" class="form-control @if ($errors->has('nom_boutique')) is-invalid   @endif" id="nom_boutique" name="nom_boutique" placeholder="Nom de la boutique" value={{old('nom_boutique')}}>
                </div>
                <div class="form-group">
                    <label for="pwd">numero carte Bancaire :</label>
                    <input type="text" class="form-control @if ($errors->has('banque')) is-invalid   @endif" id="banque" name="banque" placeholder="Ex : 14244*******554" value={{old('banque')}}>
                </div>

                    <button type="submit" class="btn btn-success btn-lg ">Submit</button>
            </form>

        </div>
    </center>
        </div>
</div>

</body>
</html>
