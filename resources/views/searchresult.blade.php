
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Handy Marocaine</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="Home/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="Home/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="Home/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="Home/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="Home/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- fonts -->
      <link href="https://fonts.googleapis.com/css?family=Great+Vibes|Open+Sans:400,700&display=swap&subset=latin-ext" rel="stylesheet">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="Home/css/owl.carousel.min.css">
      <link rel="stylesheet" href="Home/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-light bg-light justify-content-between">
               <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <a href="/" style="color: goldenrod"><b><i>ACCUEIL</i></b></a><br>
                  <a href="products" style="color: goldenrod"><b><i>NOS PRODUITS</i></b></a><br>
                  <a href="about" style="color: goldenrod"><b><i>A PROPOS</i></b></a><br>
                  <a href="contact" style="color: goldenrod"><b><i>CONTACTEZ NOUS</i></b></a>
               </div>
               <span class="toggle_icon" onclick="openNav()"><img src="Home/images/toggle-icon.png"></span>
               <a class="logo" href="/"><img src="Home/images/logo.png"></a></a>
               <form class="form-inline ">
                  <div class="login_text">
                     <ul>
                        <li>
                        @guest
                        <a href="cree_c_client"><img src="Home/images/user-icon.png"></a>
                    @endguest
                    @Auth
                    <li><img src="Home/images/user-icon.png"><br> <a   href="{{route('espace_client')}}"  style="color:black">  {{ Auth::user()->name }} @if (Auth::user()->image) <img src="{{ asset('Home/Images/profile/'.Auth::user()->image) }}"  style="width : 35px; height : 35px; border: none; border-radius : 75px" > @else <i class="fa-solid fa-circle-user"></i> @endif</a>
                    <li><img  src="Home/images/bag-icon.png"><br> <a href="{{route('panier')}}" style="color:black;">Panier  <i class="fa fa-light fa-cart-shopping"></i> 
                           {{-- @if ((\Cart::getContent()->count())!=0)<strong style="border-radius:200%;font-size: 12px; width:20px; height:20px; float: right;background-color: red; color: black; text-align:center ">{{  \Cart::getContent()->count() }} </strong>@endif</a> --}}
                    @endauth
                        </li>
                        {{-- <li><a href="connexion"><img src="Home/Home/images/user-icon.png"></a></li> --}}
                        {{-- <li><a href="#"><img src="Home/Home/images/bag-icon.png"></a></li> --}}
                        <li><a href="search"><img src="Home/images/search-icon.png"></a></li>
                     </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <div    id="search">
    @if($produits->count())

        @csrf
        @foreach ($produits as $produit )
        <h1 style="text-align: center" >Nom de Produit :<h1    style="text-align:center;color:brown "> {{$produit ->nom_produit}}</h1>
        <img id ="searchimg"src="{{asset('Images/categories/'. $produit->path)}}" alt="" id="photo">
        <h3 style="text-align: center">{{$produit ->Description}}</h3>
        <h4  style="text-align: center">Prix    :{{$produit ->prix}} DH</h4>
       <div    style="text-align: center"> 
        <h2  style="color: blue"><u>Détails</u></h2>
        <p>Fabrication: Fabriqué au MAROC, gravé  à la main </p>
        <p>Vendu par pièce</p>
        <p>Matière: des poufs en tissu</p>
</div>       <button style="margin-left:47% "class="btn btn-primary">Buy Now</button>
        @endforeach
             
              {{-- <form id_produit="delete-form-{{$produit->id_produit}}" + action="{{route('delete_produit', $produit->id_produit)}}" method="post">
                @csrf @method('DELETE')
                   <td><button href = 'delete/{{ $produit->id_produit }}' type="submit" class="btn "><i class="fa fa-solid fa-trash-can" style="color: red;font-size: 22px"></i></button>

              </form>--}}
   


@else
    <p >Aucun produit trouvé pour votre recherche "{{ request('query') }}".</p>
@endif
            </div>
        <script src="{{asset('Bootstrap/bootstrap.js')}}">
            </script> 

<div class="footer_section layout_padding">
   <div class="container">
      <div class="footer_logo"><a href="/"><img src="Home/images/footer-logo.png"></a></div>
      <div class="contact_section_2">
         <div class="row">
            <div class="col-sm-4">
               <h3 class="address_text">CONTACTEZ NOUS</h3>
               <div class="address_bt">
                  <ul>
                     <li>
                        <a href="#">
                        <i class="fa fa-map-marker" aria-hidden="true"></i><span class="padding_left10">Address : Agadir - Maroc</span>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Télephone : +212 655-509628</span><br>
                        <i class="fa fa-phone" aria-hidden="true"></i><span class="padding_left10">Télephone' : +212 602-634476</span><br>
                        </a>
                     </li>
                     <li>
                        <a href="#">
                        <i class="fa fa-envelope" aria-hidden="true"></i><span class="padding_left10">Email : HandiesMarocaine@gmail.com</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </div>
            <div class="col-sm-4">
               <div class="footer_logo_1"><a href="/"><img src="Home/images/footer-logo.png"></a></div>
               <p class="dummy_text"><br>HANDY MAROCAINE est une boutique de vente en ligne qui vous offre les meilleurs produits de l’artisanat Marocain.</p>
            </div>
            <div class="col-sm-4">
               <div class="main">
                  <h3 class="address_text">LIENS RAPIDES</h3>
                  <a href="/" class="ipsum_text">Accueil</a>
                  <a href="products" class="ipsum_text">Nos produits</a>
                  <a href="about" class="ipsum_text">A propos</a>
                  <a href="contact" class="ipsum_text">Contactez nous</a>
               </div>
            </div>
         </div>
      </div>
      <div class="social_icon">
         <ul>
            <li>
               <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            </li>
            <li>
               <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            </li>
            <li>
               <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            </li>
            <li>
               <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            </li>
         </ul>
      </div>
   </div>
</div>
<!-- footer section end -->
<!-- copyright section start -->
<div class="copyright_section">
   <div class="container">
      <p class="copyright_text">Conception et réalisation d'un site web e-commerce des produits artisanats</p>
      <p class="copyright_text">Projet de fin d'etude 2023 Pour l'obtention de la Licence en Sciences Mathématiques et Informatique.</p>
   </div>
</div>
<!-- footer section end -->
<!-- Javascript files-->
<script src="Home/js/jquery.min.js"></script>
<script src="Home/js/popper.min.js"></script>
<script src="Home/js/bootstrap.bundle.min.js"></script>
<script src="Home/js/jquery-3.0.0.min.js"></script>
<script src="Home/js/plugin.js"></script>
<!-- sidebar -->
<script src="Home/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="Home/js/custom.js"></script>
<!-- javascript --> 
<script src="Home/js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>  
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<script>
   function openNav() {
     document.getElementById("mySidenav").style.width = "18%";
   }
   
   function closeNav() {
     document.getElementById("mySidenav").style.width = "0";
   }
</script> 

</body>
</html>