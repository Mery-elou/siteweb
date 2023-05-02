<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor Dashboard | Home</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
</head>
<body>
    <header >

        <a href="{{route('welcome')}}" class="logo" id="home"><img src="{{asset('Images/logo.png')}}" alt="image"></a>
        <nav class="navbar">
            <div class="nav-item dropdown">
                <a href="#" class="drop dropdown-toggle" data-bs-toggle="dropdown"> Notre Categories</a>
                <div class="dropdown-menu " id="dropdown-menu" >
                    <div><a href="{{ route('Huiles_Amlou') }}" class=" item ">Huiles & Amlou</a></div>
                    <div><a href="{{ route('Miels') }}" class="item">Miels</a></div>
                    <div><a href="{{ route('Dates') }}" class="item">Dates</a></div>
                    <div><a href="{{ route('Fruits_sec') }}" class="item">Fruits sec</a></div>
                    <div><a href="{{ route('safran') }}" class="item">Safran</a></div>
                </div>
            </div>
            <a href="#contact"> Contact</a>
            @guest
                <a href="{{route('login')}}">Se Connecter </a>
            @endguest

            @auth


                    <a   href="{{route('espace_client')}}"  >  {{ Auth::user()->name }} @if (Auth::user()->image) <img src="{{ asset('Images/profile/'.Auth::user()->image) }}"  style="width : 35px; height : 35px; border: none; border-radius : 75px" > @else <i class="fa-solid fa-circle-user"></i> @endif</a>


                <a href="{{route('panier')}}"><i class="fa fa-light fa-cart-shopping"></i> @if ((\Cart::getContent()->count())!=0)<strong style="border-radius:200%;font-size: 12px; width:20px; height:20px; float: right;background-color: red; color: white; text-align:center ">{{  \Cart::getContent()->count() }} </strong>@endif</a>

            @endauth
        </nav>

    </header>
 <!--header end-->

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3" style="margin-top: 45px">
                 <h4>Doctor Dashboard</h4><hr>
                 <table class="table table-striped table-inverse table-responsive">
                     <thead class="thead-inverse">
                         <tr>
                             <th>Name</th>
                             <th>Email</th>
                             <th>Nom Boutique</th>
                             <th>Numero carte Bancaire</th>
                             <th>Action</th>
                         </tr>
                         </thead>
                         <tbody>
                             <tr>

                             </tr>
                         </tbody>
                 </table>
            </div>
        </div>
    </div>

</body>
</html>
