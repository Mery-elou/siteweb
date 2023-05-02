<ul>
    <li><a class="active" href="{{route('espace_client') }}"><i class="fa-solid fa-address-card"></i> Informations Personnelles</a></li>
    <li><a href="{{ route('Vos_Commendes') }}"><i class="fa-solid fa-box"></i> Mes Commandes</a></li>
    <li><a href="{{route('ajouter_adresse')}}"><i class="fa-brands fa-product-hunt"></i> Ajouter Adresse</a>
    {{-- <li><a href="{{route('Vos_Produit')}}"><i class="fa-brands fa-product-hunt"></i> Vos Produits </a> --}}
    <li><a class="item " href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color:none;">
           <i class="fa-solid fa-right-from-bracket"></i> {{ __('déconnecter') }}
        </a>
    </li>

</ul>