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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
            margin-top: -50px;
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

    @include('bars.storeHeider')

    <div class="center">

        @include('bars.storeBare')

        <div style="margin-left:20%;padding:1px 16px;">
            @csrf

            <div style="display: block;"></div>

            <div class="container mt-3">
                <h3  >Vos Produits</h3>
                <div id="alert">
                    @if (Session::get('success_delet'))
                        <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success_delet') }}</strong></div>
                     @endif
                </div>

                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>image produit</th>
                      <th>Nom Produit</th>
                      <th>ancien prix</th>
                      <th>Prix</th>
                      <th>Quantite</th>
                      <th>Categorie</th>
                      <th>Supprimer</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($produits as $produit )

                    <tr></tr>
                    <td style="width: 100px"><img src="{{asset('Images/categories/'. $produit->path)}}" alt="" id="photo"></td>
                    @if ($produit->Quantite ==0)
                        <td><strike>{{$produit ->nom_produit}}</strike></td>
                    @else
                    <td>{{$produit ->nom_produit}}</td>
                    @endif
                    @if ( $produit->old_prix ==0)
                    <td>{{$produit ->prix}} DH</td>
                    @else
                    <td><strike style="color: red"> {{$produit ->old_prix}} DH</strike></td>
                    @endif

                    @if ($produit->Quantite ==0)
                        <td><strike> {{$produit ->prix}} DH</strike></td>
                    @else
                    <td> {{$produit ->prix}} DH</td>
                    @endif


                    <td>{{$produit ->Quantite}}</td>
                    @if ($produit->Quantite ==0)
                        <td><strike> {{$produit ->categorie}}</strike></td>
                    @else
                    <td> {{$produit ->categorie}}</td>
                    @endif
                    <form id_produit="delete-form-{{$produit->id_produit}}" + action="{{route('store.delete_produit', $produit->id_produit)}}" method="post">
                      @csrf @method('DELETE')
                         <td><button href = 'delete/{{ $produit->id_produit }}' type="submit" class="btn "><i class="fa fa-solid fa-trash-can" style="color: red;font-size: 22px"></i>
                        @if ($produit->Quantite ==0)
                        <i class="fa fa-solid fa-circle-exclamation" style="color: red;font-size: 22px" data-bs-toggle="tooltip" title="Le Produit a ete fini !"></i>
                        @endif</button>

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
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
