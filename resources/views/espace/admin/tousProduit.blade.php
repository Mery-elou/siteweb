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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <style>
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
            padding-right: 50px;
            text-align: center;

        }
         h3{
            text-align: center;
            text-decoration: underline;
            color: red;
        }
        /* #alert strong{
            text-align: center;
        } */
        #photo{
            width: 160px;
            height: 80px;
            padding-top: 5px;
            padding-left: 20px;

        }
    </style>
</head>
<body>

    <header>

        <a href="/" class="logo"><img src="{{asset('Images/logo.png')}}" alt="image"></a>
        <nav class="navbar">


            <div class="nav-item dropdown">
                <a  class="drop "  > Bonjour admin {{ Auth::user()->name }} <i class="fa-solid fa-user-shield"></i></a>
                <div class="dropdown-menu ">
                    <a class="item " href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="background-color:none;">
                        {{ __('Logout') }}
                    </a>


                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </nav>

    </header>
    <div class="center">
        <ul>
            <li><a href="{{ route('admin.clients') }}"><i class="fa-solid fa-users"></i> les Clients</a></li>
            <li><a href="{{ route('admin.boutiques') }}"><i class="fa-solid fa-store"></i> les boutiques</a></li>
            <li><a href="{{ route('admin.produits') }}"><i class="fa-brands fa-product-hunt"></i> les produits</a>
            <li><a class="item " href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();" style="background-color:none;">
                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Disconnect') }}
                </a>
            </li>
        </ul>
        </ul>

        <div style="margin-left:20%;padding:1px 16px;">
            @csrf
            <h3  >Les  Produits</h3>
            <div style="display: block;"></div>

            <table class="table table-hover">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Nom Produit</th>
                    <th>Prix</th>
                    <th>Quantite</th>
                    <th>Categorie</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($produits as $produit )
                  <tr></tr>
                  <td style="width: 100px"><img src="{{asset('Images/categories/'. $produit->path)}}" alt="" id="photo"></td>
                  <td>{{$produit ->nom_produit}}</td>
                  <td>{{$produit ->prix}} DH</td>
                  <td>{{$produit ->Quantite}}</td>
                  <td>{{$produit ->categorie}}</td>
                  {{-- <form id_produit="delete-form-{{$produit->id_produit}}" + action="{{route('delete_produit', $produit->id_produit)}}" method="post">
                    @csrf @method('DELETE')
                       <td><button href = 'delete/{{ $produit->id_produit }}' type="submit" class="btn "><i class="fa fa-solid fa-trash-can" style="color: red;font-size: 22px"></i></button>

                  </form>--}}



                      </td>

                  </tr>
                  @endforeach
                </tbody>
              </table>


        </div>
            <div style="display: block;"></div>
    </div>




                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
