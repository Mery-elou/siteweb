<!--header start-->
<header>

    <a href="" class="logo"><img style="background-color:rgb(176, 140, 86)" src="{{asset('Images/logo.png')}}" alt="image"></a>
    <nav class="navbar">

      @guest
      <a href="{{route('login')}}">Se Connecter</a>
      <a href="/"><i class="fa-solid fa-house-chimney"></i> Acceil</a>
  @endguest
        @auth
        <a href="{{route('panier')}}">Panier <i class="fa fa-light fa-cart-shopping"></i> @if ((\Cart::getContent()->count())!=0)<strong style="border-radius:200%;font-size: 12px; width:20px; height:20px; float: right;background-color: red; color: white; text-align:center ">{{  \Cart::getContent()->count() }} </strong>@endif</a>
        <div class="nav-item dropdown">
            <a   href="{{route('espace_client')}}"  >  {{ Auth::user()->name }} @if (Auth::user()->image) <img src="{{ asset('Home/images/profile/'.Auth::user()->image) }}"  style="width : 35px; height : 35px; border: none; border-radius : 75px" > @else <i class="fa-solid fa-circle-user"></i> @endif</a>
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
        @endauth
    </nav>

</header>

<!--header end-->
