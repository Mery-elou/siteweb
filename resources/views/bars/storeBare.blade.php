<ul>
    <li><a class="active" href="{{route('store.homeStore') }}"><i class="fa-solid fa-address-card"></i> Boutique Info</a></li>
    <li><a href="{{ route('store.offre') }}"><i class="fa-solid fa-box"></i> Ajouter une Offre</a></li>
    <li><a href="{{route('store.AjouterProduit')}}"><i class="fa-solid fa-plus"></i> Ajouter Produit</a>
    <li><a href="{{route('store.Vos_Produit')}}"><i class="fa-brands fa-product-hunt"></i> Vos Produits </a>
    <li><a class="item " href="{{ route('logout') }}"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" style="background-color:none;">
           <i class="fa-solid fa-right-from-bracket"></i> {{ __('déconnecter') }}
        </a>
    </li>
    {{-- @foreach ($offres as $offre)
        <li>{{ offre->code }}</li>
    @endforeach --}}

</ul>
