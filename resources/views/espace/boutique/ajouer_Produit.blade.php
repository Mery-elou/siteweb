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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <style>
        /*style pour la structure du care dans le quelle en vas poster les info*/
        .container{
            padding: 10% 0px;

        }
        .image-profile{

            width : 35px; height : 35px;
            border: none;
            border-radius : 75px;
        }
        .card-header {
            text-align: center;
        }
        .card-header img{
            width: 150px;
        }
         #cree_Compte{
            text-decoration: none;
            color: rgb(61, 60, 60);
            font-size: 15px;
        }
        .btn{
            width: 150px;
        }
        #alert{
            padding-left: 100px;
            padding-right: 100px;
            text-align: center;
        }
        #alert strong{
            text-align: center;
        }
    </style>
</head>
<body>

    @include('bars.storeHeider')

    <div class="center">
        @include('bars.storeBare')

        <div style="margin-left:20%;margin-top: -130px;">
        <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header" ><img src="{{asset('Images/logo.png')}}" alt=""></div>

                        <div class="card-body">
                            <form method="POST" action="{{route('store.Ajout_Produit')}}" enctype="multipart/form-data">
                                @csrf
                                <div id="alert">

                                <div class="alert alert-light" id="alert" style="text-decoration: overline;font-size: 25px"> <strong>ajouter produit</strong></div>

                                </div>
                                <div id="alert">
                                @if (Session::get('success'))
                                    <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success') }}</strong></div>
                                 @endif
                                </div>

                                <div id="alert">
                                @if (Session::get('fail'))
                                    <div class="alert alert-danger" id="alert"> <strong>{{ Session::get('fail') }}</strong></div>
                                 @endif
                                </div>
                                <div class="row mb-3">
                                    <label for="Nom_Produit" class="col-md-4 col-form-label text-md-end">{{ __('Nom Produit') }}</label>

                                    <div class="col-md-6">
                                        <input id="Nom_Produit" type="text" class="form-control @error('Nom_Produit') is-invalid @enderror" name="Nom_Produit" value="{{ old('Nom_Produit') }}"  autofocus>

                                        @error('Nom_Produit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie de nom de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="Description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                                    <div class="col-md-6">
                                        <input id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" value="{{ old('Description') }}"  autofocus>

                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <label for="prix" class="col-md-4 col-form-label text-md-end">{{ __('Prix') }}</label>

                                    <div class="col-md-6">
                                        <input id="prix" type="number" class="form-control @error('prix') is-invalid @enderror" name="prix" value="{{ old('prix') }}" >

                                        @error('prix')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie de prix de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="Quantite" class="col-md-4 col-form-label text-md-end">{{ __('Quantite') }}</label>

                                    <div class="col-md-6">
                                        <input id="Quantite" type="text" class="form-control @error('Quantite') is-invalid @enderror" name="Quantite" value="{{old('Quantite')}}" >

                                        @error('Quantite')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie de quantite de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="categorie" class="col-md-4 col-form-label text-md-end">{{ __('categorie') }}</label>

                                    <div class="col-md-6">
                                        <select  class="form-control form-select  @error('categorie') is-invalid @enderror"   name="categorie"  value="{{old('categorie')}}">
                                            <option value="tapi">Tapis</option>
                                            <option value="bijou">Bijoux</option>
                                            <option value="metal">Métales Argentées</option>
                                            <option value="coussin">Coussins</option>
                                            <option value="nappe">Nappes</option>
                                            <option value="poterie">Art de poterie</option>
                                            <option value="poof">Poufs</option>
                                            <option value="sac">Sacs</option>
                                          </select>

                                        @error('categorie')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie de categorie de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image_produit" class="col-md-4 col-form-label text-md-end">{{ __('image_produit') }}</label>

                                    <div class="col-md-6">
                                        <input id="image_produit" type="file" class="form-control @error('image_produit') is-invalid @enderror" name="image_produit" value="{{old('image_produit')}}" >

                                        @error('image_produit')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie d'image de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0">
                                    <div class="col-md-4 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Enregistrer') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>






                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
