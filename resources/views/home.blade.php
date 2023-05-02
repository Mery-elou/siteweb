
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
      <style>
           .modal-title{
            padding-left: 150px;
            color: rgb(89, 148, 107);
            text-decoration: overline;
        }
      </style>
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
                    <a  id="a" href="{{route('espace_client')}}"  >  {{ Auth::user()->name }} @if (Auth::user()->image) <img src="{{ asset('Images/profile/'.Auth::user()->image) }}"  style="width : 35px; height : 35px; border: none; border-radius : 75px" > @else <i class="fa-solid fa-circle-user"></i> @endif</a>


                    <a id="a" href="{{route('panier')}}">Panier<i class="fa fa-light fa-cart-shopping"></i> @if ((\Cart::getContent()->count())!=0)<strong style="border-radius:200%;font-size: 12px; width:20px; height:20px; float: right;background-color: red; color: white; text-align:center ">{{  \Cart::getContent()->count() }} </strong>@endif</a>
        
 
                           {{-- @if ((\Cart::getContent()->count())!=0)<strong style="border-radius:200%;font-size: 12px; width:20px; height:20px; float: right;background-color: red; color: black; text-align:center ">{{  \Cart::getContent()->count() }} </strong>@endif</a> --}}
                    @endauth
                        </li>
                     
                        {{-- <li><a href="connexion"><img src="Home/Home/images/user-icon.png"></a></li> --}}
                        {{-- <li><a href="#"><img src="Home/Home/images/bag-icon.png"></a></li> --}}
                        {{-- <button id="search-button" class="btn btn-primary">Rechercher</button> --}}
                       <li><form id="search-form"  method="GET">
                             
                                 <div class="col-md-6">
                                     <select  class="form-control form-select  @error('categorie') is-invalid @enderror"   name="categorie"   onchange="window.location.href=this.value">
                                         <option value="tapi">Tapis</option>
                                         <option value="bijou">bijoux</option>
                                         <option value="metal"> <a href="tapi">Métales Argentées</a></option>
                                         <option value="coussin">Coussins</option>
                                         <option value="nappe">Nappes</option>
                                          <option value="poterie">Art de poterie</option>
                                          <option value="pouf">Poufs</option>
                                          <option value="sac">Sacs</option>
                                   </select>
                                 </div>
                              </form>
                              </li>
                         {{-- <li><input type="text" name="query" class="form-control" placeholder="Rechercher .." ></li>
                        </ul>
                        </li>
                       <li> <a href="searchresult"><img src="Home/images/search-icon.png"></a>
                     </li> --}}
                    
                  </ul>
                  </div>
               </form>
            </nav>
         </div>
      </div>
      <!-- header section end -->
      <!-- banner section start -->
      <div class="banner_section layout_padding">
         <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-6">
                           <br><br>
                           <h1 class="banner_taital">Handy<br>Marocaine</h1>
                           <p class="banner_text">Bienvenue au monde de luxe et d'originalité ! <br> Le meilleur de l'artisanat Marocain exclusivement chez : <br><i style="color: rgb(51, 3, 3)">HANDY Marocaine</i></p>
                           <div class="read_bt"><a href="products">Discover</a></div>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="Home/images/banner-img.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-6">
                           <br><br>
                           <h1 class="banner_taital">Handy <br>Marocaine</h1>
                           <p class="banner_text">Le Lifestyle Marocain traditionnel revisité. <br>Tendance, Chic et uniquement fait main.</p>
                           <div class="read_bt"><a href="#">Discover</a></div>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="Home/images/image2.jpeg"></div>
                           <div class="banner_img"><img src="Home/images/banner-bg.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-6">
                           <br><br>
                           <h1 class="banner_taital">Handy <br>Marocaine</h1>
                           <p class="banner_text">Le Maroc is in the palm of your hand ! <br>Découvrer les produits traditionels exclusivement marrocaines.</p>
                           <div class="read_bt"><a href="#">Discover</a></div>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="Home/images/banner2-img.jpg"></div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="row">
                        <div class="col-sm-6">
                           <br><br>
                           <h1 class="banner_taital">Handy <br>Marocaine</h1>
                           <p class="banner_text">Découvrer un univers de produits traditionels artisanat <br>avec juste une seule click ! </p>
                           <div class="read_bt"><a href="#">Discover</a></div>
                        </div>
                        <div class="col-sm-6">
                           <div class="banner_img"><img src="Home/images/img.jpeg"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end -->
     <?php
     $ProduitsOffres = DB::select('select * from produits where Quantite >? and old_prix <>? ',[0,0]);
     $toutProduits = DB::select('select * from produits where Quantite >? and old_prix = ?',[0,0]);
     $offres = DB::select('select * from Offres ');
     $toutProduit =DB::select('select *from produits');
     ?>
     @php
     $i=1
 @endphp
 @foreach ($offres as $offre)
 @php
    $i++
 @endphp
 <div class="carousel-item">
   <img src="{{asset('Images/offres/'.$offre->image)}}" id=""  class="d-block">
 </div>
 @endforeach
</div>
<div class="carousel-indicators">
   <?php
   for ($j=1; $j<=$i ; $j++) {
   echo "<button type=\"button\" data-target=\"#demo\" data-slide-to=\"$j \" class=\"active\"></button>";
   }

  ?>
  </div>


  <div id="alert">
   @if (Session::get('success'))
       <div id="alert"> <strong>{{ Session::get('success') }}</strong></div>
   @endif
</div>



 <main id="container">
   <h3 id="offres"> Produits avec Offres </h3>
   <section class="py-5 text-center container">
       <div class="album py-5 bg-light">
           <div class="container" >

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


       @foreach ($ProduitsOffres as $produit )

       <div class="col">
           <div class="card shadow-lg img">
               <img src="{{asset('Images/categories/'.$produit->path)}}" id="photo">
               <div class="card-body">
                   <p class="card-text" style="text-decoration: overline;color: rgb(75, 131, 62);font-size: 18px">{{$produit->nom_produit}}    </p>
                   <p class="card-text" style="font-size: 14px"><strong>Prix : {{$produit->prix }} DH</strong>@if ($produit->old_prix!=0)
                   <strong style="color: red;font-size :16px">   <strike >    {{ $produit->old_prix }} DH   </strike></strong>
               @endif</p>

               </div>

               <form method="post" action="{{ route('add.panier',$produit->id_produit) }}" class="row g-3" style="padding-left: 60px;padding-bottom: 10px">
                   @csrf
                   <div class="col-auto">
                     <input type="number" style="width: 80px" name="quantity" placeholder="Quantité ?"  value="1" max="{{ $produit->Quantite }}" min="1">
                     <input type="hidden"  name="id"  value="{{ $produit->id_produit }}" >
                     <input type="hidden"  name="name"  value="{{ $produit->nom_produit }}" >
                     <input type="hidden"  name="price"  value="{{ $produit->prix }}" >
                     <input type="hidden"  name="image"  value="{{ $produit->path }}" >


                   </div>
                   <div class="col-auto">
                     <button type="submit" class="btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Ajouter au Panier</button>
                   </div>
                   <div class="col-auto">
                       <button type="button" class="btn  btn-outline-danger" data-toggle="modal" data-target="#myModall">Information</button>
                   </div>
                 </form>
            </div>
       </div>
       <!-- modal start-->
       <div class="modal fade" id="myModall">
           <div class="modal-dialog">
             <div class="modal-content">

               <!-- Modal Header -->
               <div class="modal-header">
                 <h4 class="modal-title">Information sur le produit</h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
               </div>

               <!-- Modal body -->
               <div class="modal-body">
                   <div >
                     <img src="{{asset('Images/categories/'.$produit->path)}}" id="photo">
                  </div>
                 <div style="display: inline-block">
                   <div class="info_ecriture">
                       <span class="info_ecriture">Nom Produit :</span><span>{{$produit->nom_produit}}</span>
                   </div>
                   <div class="info_ecriture">
                       <span class="info_ecriture">prix :</span><span style="color: green"> {{$produit->prix}} DH</span>
                   @if ($produit->old_prix !=0)
                       <span class="info_ecriture"></span><span><strike style="color: red"> {{$produit->old_prix}} DH</strike></span>
                   @endif
                   </div>
                   <div class="info_ecriture">
                       <span class="info_ecriture">Quantite :</span><span> {{$produit->Quantite}} </span>
                   </div>
                   <div class="info_ecriture">
                       <span class="info_ecriture">categorie:</span><span> {{$produit->categorie}}</span>
                   </div>
                 </div>

               </div>
             </div>
           </div>
         </div>
         <!-- modal end-->
       @endforeach

         </div>
       </div>
     </div>
   </section>
 </main>


 <main id="container" class="main">
   <h3 id="offres" style="text-align: center"> Tous les produits </h3>
   <section class="py-5 text-center container">
       <div class="album py-5 bg-light">
           <div class="container" >

             <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">


       @foreach ($toutProduit as $produit )

       <div class="col">
           <div class="card shadow-lg img">
               <img src="{{asset('Images/categories/'.$produit->path)}}" id="photo">
               <div class="card-body">
                   <p class="card-text" style="text-decoration: overline;color: #f5ddb6;font-size: 18px">{{$produit->nom_produit}}    </p>
                   <p class="card-text" style="font-size: 14px"><strong>Prix : {{$produit->prix }} DH</strong>@if ($produit->old_prix!=0)
                   <strong style="color: red;font-size :16px">   <strike >    {{ $produit->old_prix }} DH   </strike></strong>
               @endif</p>

               </div>

               <form method="post" action="{{ route('add.panier',$produit->id_produit) }}" class="row g-3" style="padding-left: 65px;padding-bottom: 10px">
                   @csrf
                   <div class="col-auto">
                     <input type="number" style="width: 80px" name="quantity" placeholder="Quantité ?"  value="1" max="{{ $produit->Quantite }}" min="1">
                     <input type="hidden"  name="id"  value="{{ $produit->id_produit }}" >
                     <input type="hidden"  name="name"  value="{{ $produit->nom_produit }}" >
                     <input type="hidden"  name="price"  value="{{ $produit->prix }}" >
                     <input type="hidden"  name="image"  value="{{ $produit->path }}" >


                   </div>
                   <div class="col-auto">
                     <button type="submit" class="btn btn-outline-success"><i class="fa fa-shopping-cart"></i> Ajouter au Panier</button>
                   </div>
                   <div class="col-auto">
                       <button type="button" class="btn  btn-outline-danger" data-toggle="modal"  data-target="#MyModall">Information</button>
                   </div>
                 </form>
            </div>
       </div>
       <!-- modal start-->

       <div class="modal fade" id="MyModall">
         <div class="modal-dialog">
           <div class="modal-content">

             <!-- Modal Header -->
             <div class="modal-header">
               <h4 class="modal-title">Information sur le produit</h4>
                <button type="button" class="btn-close" data-dismiss="modal"></button>
             </div>

             <!-- Modal body -->
             <div class="modal-body">
                 <div >
                     <img src="{{asset('Images/categories/'.$produit->path)}}" id="photo_for_information">
                 </div>
               <div style="display: inline-block">
                 <div class="info_ecriture">
                     <span class="info_ecriture">Nom Produit :</span><span>{{$produit->nom_produit}}</span>
                 </div>
                 <div class="info_ecriture">
                     <span class="info_ecriture">prix :</span><span style="color: #795c2d"> {{$produit->prix}} DH</span>
                 @if ($produit->old_prix !=0)
                     <span class="info_ecriture"></span><span><strike style="color: red"> {{$produit->old_prix}} DH</strike></span>
                 @endif
                 </div>
                 <div class="info_ecriture">
                     <span class="info_ecriture">Quantite :</span><span> {{$produit->Quantite}} </span>
                 </div>
                 <div class="info_ecriture">
                     <span class="info_ecriture">categorie:</span><span> {{$produit->categorie}}</span>
                 </div>
               </div>

             </div>
           </div>
         </div>
       </div>
         <!-- modal end-->
       @endforeach

         </div>
       </div>
     </div>
   </section>
 </main>

      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <div class="about_section_main">
               <div class="row">
                  <div class="col-md-6">
                     <div class="about_taital_main">
                        <h1 class="about_taital">A propos notre boutique :</h1>
                        <p class="about_text">Dans ces dernières années, l'artisanat marocain a plus que jamais le vent en poupe un peu partout dans le monde et notamment en matière de décoration intérieure. <br>En fervent acteur de cet artisanat très riche et varié, Handy Marocaine fait valoir le « Made in Morocco » à travers diverses créations qui ne cessent d'innover pour donner naissance à des articles hors du commun.</p>
                        <div class="readmore_bt"><a href="about">Lire Plus</a></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div><img src="Home/images/about-img.png" class="image_3"></div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- customer section start -->
      <div class="customer_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-sm-12">
                  <h1 class="customer_taital">Quelques Reviews</h1>
               </div>
            </div>
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="Home/images/client-img.png"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Jaydaa</h3>
                              <p class="dolor_text">Magnifique! <br>Je trouve ce magasin très beau que ce soit de l'extérieur comme de l'intérieur. Grand choix de produit, de trés bon qualité ...</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="Home/images/home.jpg"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Damien</h3>
                              <p class="dolor_text">Trés satisfaisant ! <br>Les articles sont de meilleurs qualité, arrive au temps et en bonne état! <br>Ma mère est trés heureuse à cause de ce cool cadaux hhh!</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="client_section_2">
                        <div class="client_main">
                           <div class="client_left">
                              <div class="client_img"><img src="Home/images/home3.jpg"></div>
                           </div>
                           <div class="client_right">
                              <h3 class="name_text">Mathew</h3>
                              <p class="dolor_text">Le meilleur site en ligne ! <br>C'est ma première fois et definitivement pas la dernière ! tout s'est vraiment bien passé, de la réception du produit jusqu'au payment.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
      </div>
      <!-- customer section end -->
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="contact_taital">Prenez contact avec nous !</h1>
                  <p class="contact_text"> Nous sommes impatients de recevoir vos commentaires, de répondre à vos demandes et de vous offrir toute l'aide dont vous aurez besoin !</p>
               </div>
               <div class="col-md-6">
                  <div class="contact_main">
                     <br><br><br>
                     <div class="contact_bt"><a href="contact">Contactez Nous</a></div>
                     <div class="newletter_bt"><a href="#">Glissez en haut</a></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="map_main">
            <div class="map-responsive">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3441.060416139499!2d-9.546590885547204!3d30.40602770835681!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3c82aa3d6fe31%3A0x8ef661d2ccb5a617!2sFacult%C3%A9%20des%20sciences%20d&#39;Agadir!5e0!3m2!1sfr!2sma!4v1680602823048!5m2!1sfr!2sma" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>            </div>
         </div>
      </div>
      <!-- contact section end -->
      <!-- footer section start -->
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