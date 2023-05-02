<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('Bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/modifier_mot_passe.css')}}">

    <title>Espace  Boutique</title>

    <style>
    </style>
</head>
<body>

    @include('bars.navbar')


    <div class="center">
        <ul>
            <li><a class="active" href="#home">Ajouter des Offres</a></li>
            <li><a href="{{route('AjouterProduit')}}">Ajouter produit</a>
            <li><a href="#news">vos produits</a></li>
            <li><a href="#about">Disconnect</a></li>
        </ul>

        <div style="margin-left:20%;padding:1px 16px;">
            @csrf


        </div>




</body>
</html>
