<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/footer.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <style>
        /*style pour la structure du care dans le quelle en vas poster les info*/
        .info{
            padding-left: 100px;
            padding-right: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 2px solid rgb(35, 87, 35);
            display: inline-block;
            font-size: medium;
            margin-top: 15px;
            width: 70%;
        }
        .info_ecriture{
                font-family:'Times New Roman', Times, serif;
                padding: 10px 10px ;

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
            padding-right: 50px;
            text-align: center;

        }
        .container h3{
            text-align: center;
            text-decoration: underline;
            color: red;
            margin-top: -3%;
        }
        .image-profile{

            width : 35px; height : 35px;
            border: none;
            border-radius : 75px;
         }
         #photo{
            width: 160px;
            height: 80px;
            padding-top: 5px;
            padding-left: 20px;

        }
    </style>
</head>
<body>

    @include('bars.navbar')

    <div class="center">

        @include('bars.espacebar')


        <div style="margin-left:20%;padding:1px 16px;">
            @csrf

            <div style="display: block;"></div>

            <div class="container mt-3">
                <h3  >Mes Commandes</h3>
                <div id="alert">
                    @if (Session::get('success_delet'))
                        <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success_delet') }}</strong></div>
                     @endif
                </div>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th style="text-align: center;width: 70px;">Image Produit</th>
                      <th style="text-align: center;width: 200px;">Nom Produit</th>
                      <th style="text-align: center;width: 200px;">Prix</th>
                      <th style="text-align: center;width: 200px;">Quantite</th>
                      <th style="text-align: center;width: 200px;">Bien Recu</th>

                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($commendes as $produit )

                    <tr></tr>
                    <td style="width: 100px"><img src="{{asset('Images/categories/'. $produit->path)}}" alt="" id="photo"></td>
                    <td style="text-align: center;width: 200px;">{{$produit ->nom_produit}}</td>

                    <td style="text-align: center;width: 200px;">{{$produit ->prix}} DH</td>
                    <td style="text-align: center;width: 200px;">{{$produit ->Quantite}}</td>
                     <form  id_commende="delete-form-{{$produit->id_commende}}" + action="{{route('delete_commende', $produit->id_commende)}}" method="post" >
                       @csrf @method('DELETE')
                         <td style="text-align: center;width: 200px;"><button  href = 'delete/{{ $produit->id_commende }}'  type="submit" class="btn  "><i class="fa fa-solid fa-circle-check" style="color: green ;font-size: 22px"></i></button>

                    </form>



                        </td>

                    </tr>
                    @endforeach

                  </tbody>
                </table>
              </div>
        </div>
            <div style="display: block;"></div>


                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
