<!--header start-->
<header>

    <a href="/" class="logo"><img src="{{asset('Images/logo.png')}}" alt="image"></a>
    <nav class="navbar">

        @auth
        <div class="nav-item dropdown">
            <a   href="{{route('store.homeStore')}}"  > Boutique,  {{ Auth::user()->nom_store }} @if (Auth::user()->image) <img src="{{ asset('Images/profile/'.Auth::user()->image) }}"  style="width : 35px; height : 35px; border: none; border-radius : 75px" > @else <i class="fa-solid fa-shop"></i> @endif</a>
            <div class="dropdown-menu ">

                <div class="container mt-3">
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
