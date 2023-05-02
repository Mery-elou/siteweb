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
                            <form method="POST" action="{{route('store.ajouter_offre')}}" enctype="multipart/form-data">
                                @csrf
                                <div id="alert">

                                <div class="alert alert-light" id="alert" style="text-decoration: overline;font-size: 25px"> <strong>ajouter Offre</strong></div>

                                </div>
                                <div id="alert">
                                @if (Session::get('success'))
                                    <div class="alert alert-success" id="alert"> <strong>{{ Session::get('success') }}</strong></div>
                                 @endif
                                </div>

                                <div id="alert">
                                @if (Session::get('fail_offre'))
                                    <div class="alert alert-danger" id="alert"> <strong>{{ Session::get('fail_offre') }}</strong></div>
                                 @endif
                                </div>
                                <div class="row mb-3">
                                    <label for="code" class="col-md-4 col-form-label text-md-end">{{ __('Code ') }}</label>

                                    <div class="col-md-6">
                                        <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}"  autofocus>

                                        @error('code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Code deja existe</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>






                                <div class="row mb-3">
                                    <label for="Type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>

                                    <div class="col-md-6">
                                        <select  class="form-control form-select  @error('Type') is-invalid @enderror"   name="Type"  value="{{old('Type')}}">
                                            <option value="-5%">-5% pour chaque produit</option>
                                            <option value="-10%">-10% pour chaque produit</option>
                                            <option value="-20%">-20% pour chaque produit</option>
                                            <option value="-30%">-30% pour chaque produit</option>
                                            <option value="-50%">-50% pour chaque produit</option>

                                          </select>

                                        @error('Type')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie de categorie de produit</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="image_offre" class="col-md-4 col-form-label text-md-end">{{ __('image_offre') }}</label>

                                    <div class="col-md-6">
                                        <input id="image_offre" type="file" class="form-control @error('image_offre') is-invalid @enderror" name="image_offre" value="{{old('image_offre')}}" >

                                        @error('image_offre')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>Probleme dans le saisie d'image d'offre</strong>
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
