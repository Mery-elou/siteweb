<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/footer.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link href="{{asset('Bootstrap/bootstrap.css')}}" rel="stylesheet" >
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <title>Espace Client</title>
    <script href="{{asset('Bootstrap/bootstrap.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <style>
        .image-ronde{

            width : 150px; height : 150px;
            border: none;
            border: 2 solid blue;
        }
        .image-profile{

            width : 35px; height : 35px;
            border: none;
            border-radius : 75px;

        }
        /*style pour la structure du care dans le quelle en vas poster les info*/
        .info{
            padding-left: 100px;
            padding-right: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 2px solid rgb(50, 122, 50);
            display: inline-block;
            font-size: medium;
            margin-top: 15px;
            width: 70%;
            box-shadow: 5px 2px 10px  rgb(35, 87, 35);
        }
        .info_ecriture{
                font-family:'Times New Roman', Times, serif;
                padding: 10px 10px ;
                padding-bottom: 10px;

        }
        .info_ecriture:hover{
            color: rgb(82, 164, 77);
        }
        .info_title{
            padding-left: 140px;
            padding-right: 140px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid green;
            font-size: x-large;
            margin-top: 15px;
            display: inline-block;
        }

        footer{
            color: rgba(255, 255, 255, 255);
            background-color: rgb(87, 105, 83);
            margin-top: 180px;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;

        }
        .faite{
            display: inline-block;
            border: 1px solid rgb(239, 233, 233);
            margin: 20px;
            padding-left: 40px ;
            padding-right: 40px ;
            text-align: center;

        }
         #par{
            margin-left: 100px;
            float: left;
        }
        #conta{
            margin-right: 100px;
            float: right;
        }
        .ecriture{
           font-size: large;
        }
        input{
            height: 40px;
        }
        input[type="text"]{

            font-size: 15px;
        }
        input[type="email"]{

            font-size: 15px;
        }
        #alert{
            margin-right: 90px;
            text-align: center;


        }
         #alert strong{
            text-align: center;

        }
    </style>
</head>
<body>

    @include('bars.storeHeider')

    <div class="center">

        @include('bars.storeBare')

        <div style="margin-left:20%;padding:1px 16px;">
            @csrf

            <div style="display: block;"></div>


                <div class="info">
                    <div style="float: right;">
                        @if (Auth::user()->image) <img src="{{ asset('Images/profile/'.Auth::user()->image) }}"  class="image-ronde" > @else <div style="font-size: 150px ;margin-top: -10px"> <i class="fa fa-solid fa-circle-user"></i></div> @endif

                    </div>
                    <div id="alert">
                        @if (Session::get('success_update'))
                            <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success_update') }}</strong></div>
                         @endif
                    </div>

                    <div id="alert">
                        @if (Session::get('fail_update'))
                            <div class="alert alert-danger" id="alert"> <strong>{{ Session::get('fail_update') }}</strong></div>
                         @endif
                    </div>
                    <div style="display: block;">
                    <div class="info_ecriture">
                        <span class="info_ecriture">Votre Nom :</span><strong> {{ Auth::user()->f_nam }}  </strong>
                    </div>
                    <div class="info_ecriture">
                        <span class="info_ecriture">Nom de la boutique :</span><strong>  {{ Auth::user()->nom_store }}   </strong>
                    </div>

                    <div class="info_ecriture">
                        <span  class="info_ecriture">Email :</span><strong>   {{ Auth::user()->email }} </strong>
                    </div>

                    <div class="info_ecriture">
                        <span  class="info_ecriture">Adresse :</span><strong style="text-transform: capitalize;"> {{ Auth::user()->adresse }} </strong>
                    </div>

                    <div class="info_ecriture">
                        <span class="info_ecriture">téléphone :</span><strong>  {{ Auth::user()->phone }}   </strong>
                    </div>


                    <!-- The Modal -->
                    <div class="modal fade" id="myModal">
                    <div class="modal-dialog">
                    <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title" style="padding-left: 120px;text-decoration: overline;color: green">modifier Compte</h4>

                            </div>

                            <!-- Modal body -->
                <div class="modal-body">
                <div class="container">
                    <form method="POST" action="{{route('store.update_boutique')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="nom">Nom:</label>
                            <input type="text" class="form-control " id="nom" value="{{ Auth::user()->f_nam }}" name="nom" readonly style="background-color: white">
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom de la boutique:</label>
                            <input type="text" class="form-control " id="nom_boutique" value="{{ Auth::user()->nom_store }}" name="nom_boutique"  style="background-color: white">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" readonly style="background-color: white">
                        </div>
                        <div class="form-group">
                            <label for="adresse">Adresse:</label>
                            <input type="text" class="form-control" id="adresse" value="" name="adresse">
                        </div>
                        {{-- <div class="form-group">
                            <label for="nom">sexe :</label>
                            <div class="form-check" style="padding-left: 60px">
                                <input type="radio" class="form-check-input" id="radio1" name="optradio" value="Homme" checked >
                                <label class="form-check-label" for="radio1">Homme</label>
                            </div>
                            <div class="form-check" style="padding-left: 60px">
                                <input type="radio" class="form-check-input" id="radio2" name="optradio" value="Femme" >
                                <label class="form-check-label" for="radio2">Femme</label>
                            </div>
                        </div> --}}
                        <div class="form-group">
                            <label for="adresse">téléphone :</label>
                            <input type="tel" class="form-control" id="age"  name="phone" placeholder="Entrer votre téléphone" value="{{ Auth::user()->phone }}">
                        </div>
                        <div class="form-group">
                            <small>Format: 06********</small><br><br>
                        </div>

                        <div class="form-group">
                            <label for="adresse">Image :</label>
                            {{-- <img src="{{ asset('Images/profile/'.Auth::user()->image) }}" class="image-ronde"> --}}
                            <input type="file" class="form-control" id="image"  name="image" value=" src="{{ asset('Images/profile/'.Auth::user()->image) }}"">

                        </div>
                        <div class="form-group">
                            <label for="banque">Banque:</label>
                            <input type="text" class="form-control" id="banque" value="{{ Auth::user()->banque }}" name="banque">
                            </div>
                            <button type="submit" class="btn btn-outline-success" style="margin-left: 15px ;width: 200px; font-size:15px ; margin-top: 15px;">Enregistrer</button>
                    </form>
                </div>
                </div>

                            <!-- Modal footer -->


                </div>
                </div>
                </div>

                    <div >
                        <span  class="info_ecriture">Numero carte Bancaire : </span><strong>{{ Auth::user()->banque }}</strong>
                        <span class="info_ecriture">
                            <span  data-toggle="modal" data-target="#myModal">{{-- <button type="button" class="btn btn-outline-success"  data-toggle="modal" data-target="#myModal"> --}}
                                <i class="fa-solid fa-user-pen" style="padding-left: 50px;color: red">modifier</i>
                              {{-- </button> --}}</span>
                        </span>

                    </div>
                </div>


                </div>
                <div style="display: block;"></div>





                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
