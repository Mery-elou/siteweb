<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

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
        .image-profile{

        width : 35px; height : 35px;
        border: none;
        border-radius : 75px;
    }
        .v-line{
            hr {
        width: 50%;
        height: 20px;

        margin-right: auto;
        margin-left: auto;
        margin-top: 5px;
        margin-bottom: 5px;
        border-width: 2px;
    }
    }
    #alert{
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
        }
        #alert strong{
            text-align: center;
        }
    #photo{
            width: 260px;
            height: 140px;
            padding-top: 5px;
            padding-left: 20px;

        }

    #panier{
            text-align: center;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            color: rgb(50, 117, 23);
            text-decoration: underline;
            font-size: 40px;
            padding-top: 5%;
        }

    </style>
</head>
<body>

    @include('bars.navbar')

    <div  class="center">
        <div >
            @csrf

        <div style="display: block;"></div>

        <div class="container" style="width: 70%">

            <h1 id="panier">Mon panier</h1>
            <div id="alert">
                @if (Session::get('success'))
                    <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success') }}</strong></div>
                 @endif
                </div>
                <div id="alert">
                    @if (Session::get('fail'))
                        <div class="alert alert-success" id="alert"> <strong>{{ Session::get('fail') }}</strong></div>
                     @endif
                    </div>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark" >
                        <tr>
                            <th style="text-align: center">Image</th>
                            <th style="text-align: center">Nom Produit</th>
                            <th style="text-align: center">Prix</th>
                            <th style="text-align: center">Quantité</th>
                            <th style="text-align: center">Total</th>
                            <th style="text-align: center">Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('basket') -->
                        @foreach ($items as $item)

                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @php $total += $item->price * $item->quantity @endphp
                            <tr>
                                <td style="width: 300px"><img src="{{asset('Images/categories/'. $item->associatedModel)}}" alt="" id="photo"></td>
                                <td style="width: 200px;text-align: center">
                                    <strong >{{ $item->name }}</a></strong>
                                </td>
                                <td style="text-align: center;width: 150px;">{{ $item->price }} DH</td>
                                <td style="text-align: center;width: 150px;" >
                                    <!-- Le formulaire de mise à jour de la quantité -->

                                    <form  method="post" action="{{ route('update.panier',$item->id) }}" class="form-inline d-inline-block" >
                                        {{ csrf_field() }}
                                        <input type="hidden" name="id" value="{{$item->id  }}">
                                        <input type="number" name="quantity" placeholder="Quantité ?" value="{{ $item->quantity }}" class="form-control mr-2" style="width: 80px" min="1" >
                                        <button type="submit" class="btn"> <i  class="fa fa-solid fa-pen-to-square" style="color: green;font-size: 20px"></i></button>
                                    </form>
                                </td>
                                <td style="text-align: center;width: 150px;">
                                    <!-- Le total du produit = price * quantité -->
                                    {{ $item->price * $item->quantity }} DH
                                </td>
                                <td style="width: 200px">
                                    <!-- Le Lien pour retirer un produit du panier -->
                                    <form  method="post" action={{ route('remove.panier',$item->id) }}  style="text-align: center">
                                        {{ csrf_field() }}
                                         @csrf
                                        <input type="hidden" name="id" value="{{$item->id  }}">

                                        <button class="btn btn-danger " type="submit" >Supprimer <i class="fa fa-light fa-trash-can" style="font-size: 15px;padding-left: 10px"></i></button>

                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr colspan="2" >
                            <td colspan="4" style="text-align: center;width: 150px;"><strong> Total général</strong></td>
                            <td colspan="1" style="text-align: center;width: 150px;">
                                <!-- On affiche total général -->
                                <strong>{{ $total }} DH</strong>
                            </td>
                            <td colspan="1" style="text-align: center">
                                @if(Cart::getSubtotal()>0)

                                <button class="btn btn-success " type="submit"   data-toggle="modal" data-target="#myModal">Finaliser l'achat <i class="fa fa-light fa-credit-card" style="font-size: 15px;padding-left: 10px"></i></button>
                            </td>
                             @endif
                        </tr>
                    </tbody>

                </table>
            </div>

            <!-- The Modal -->
            <div class="modal fade" id="myModal">
                <div class="modal-dialog" >
                <div class="modal-content" id="myModal_content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title" style="padding-left: 120px;text-decoration: overline;color: green">Finaliser l'achat</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
            <div class="modal-body">
            <div class="container">
                <form " action="{{ route('make.payment') }}">
                    @csrf
                    <span ><strong style="text-decoration: underline"> Mes informations</strong></span>
                    <div class="form-group">
                        <input type="hidden" value="{{Auth::user()->id}}">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom:</label>
                        <input type="text" class="form-control " id="nom" value="{{ Auth::user()->name }}" name="nom" readonly style="background-color: white">
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" value="{{ Auth::user()->email }}" name="email" readonly style="background-color: white">
                        </div>
                    <div class="form-group">
                        <label for="adresse">Adresse:</label><br>
                        @foreach ($Vosadresse as $Vosadresse)
                            <input type="radio" class="form-check-input" id="adresse" value="" name="adresse">  {{ $Vosadresse->adresse }}<br>
                        @endforeach

                        </div>

                        <hr>
                   <span ><strong style="text-decoration: underline"> Mes produits</strong></span>
                   <table class="table ">
                   @foreach ($items as $item)

                        <tr>
                            <td style="width: 80px">{{  $item->name  }}</td>
                            <td style="width: 40px"></td>
                            <td style="width: 40px"></td>
                            <td style="width: 20px">{{  $item->price  }}DH</td>
                        </tr>

                   @endforeach

                   <td colspan="3"><strong> Total général</strong></td>
                            <td colspan="1">
                                <!-- On affiche total général -->
                                <strong>{{ round($total/9, 2) }} $</strong>
                            </td>
                </table>
                <hr>
               {{--  <span ><strong style="text-decoration: underline">Method payment</strong></span>
 --}}
                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked >
                    <img  style="height:4rem;" src="{{asset('Images/mastercard-2.svg')}}" alt="image" for="flexRadioDefault1">
                </div> --}}
                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" >
                    <img style="height:4rem;" src="{{asset('Images/PayPal-Logo.wine.svg')}}" alt="image" for="flexRadioDefault2">
                </div> --}}
                {{-- <div class="form-check">
                    <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault3" >
                    <img style="height:4rem;" src="{{asset('Images/visa.svg')}}" alt="image" for="flexRadioDefault3">
                </div>
                <div class="form-group">
                    <label for="banque">Numero cart bancaire:</label>
                    <input type="text" class="form-control" id="banque" value="" name="banque">
                </div> --}}
                <button type="submit" class="btn btn-outline-success" style="margin-left: 15px ;width: 200px; font-size:15px ; margin-top: 15px;">Enregistrer</button>
            </form>
                    </div>

            </div>
            </div>

                        <!-- Modal footer -->


            </div>
            </div>
            </div>

            <!-- Lien pour vider le panier -->
            {{-- <a class="btn btn-danger" href="{{ route('basket.empty') }}" title="Retirer tous les produits du panier" >Vider le panier</a>
 --}}


        </div>



        </div>
        <div style="display: block;"></div>
    </div>




                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
