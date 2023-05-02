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
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >

    <style>
        .image-ronde{

            width : 150px; height : 150px;
            border: none;
            border-radius : 75px;

        }
        .image-profile{

            width : 35px; height : 35px;
            border: none;
            border-radius : 75px;

        }
        /*style pour la structure du care dans le quelle en vas poster les info*/
        .info{
            padding-left: 100px;
            padding-right: 50px;
            padding-top: 20px;
            padding-bottom: 20px;
            border: 2px solid rgb(50, 122, 50);
            display: inline-block;
            font-size: medium;
            margin-top: 15px;
            width: 70%;
            box-shadow: 5px 2px 10px  rgb(35, 87, 35);
        }
        .info_ecriture{
                font-family:'Times New Roman', Times, serif;
                padding: 10px 10px ;
                padding-bottom: 10px;

        }
        .info_ecriture:hover{
            color: rgb(82, 164, 77);
        }
        .info_title{
            padding-left: 140px;
            padding-right: 140px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-family: 'Times New Roman', Times, serif;
            border: 2px solid green;
            font-size: x-large;
            margin-top: 15px;
            display: inline-block;
        }

        footer{
            color: rgba(255, 255, 255, 255);
            background-color: rgb(87, 105, 83);
            margin-top: 180px;
            margin-bottom: 0;
            padding: 20px;
            text-align: center;

        }
        .faite{
            display: inline-block;
            border: 1px solid rgb(239, 233, 233);
            margin: 20px;
            padding-left: 40px ;
            padding-right: 40px ;
            text-align: center;

        }
         #par{
            margin-left: 100px;
            float: left;
        }
        #conta{
            margin-right: 100px;
            float: right;
        }
        .ecriture{
           font-size: large;
        }
        input{
            height: 40px;
        }
        input[type="text"]{

            font-size: 15px;
        }
        input[type="email"]{

            font-size: 15px;
        }
        #alert{
            margin-right: 90px;
            text-align: center;


        }
         #alert strong{
            text-align: center;

        }
    </style>
</head>
<body>

    @include('bars.navbar')

    <div class="center">


        @include('bars.espacebar')


        {{-- <div style="margin-left:20%;padding:1px 16px;">
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
            @csrf
        <div style="display: block;"></div>
        <main id="container">
            <section class="py-5 text-center container">
                <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal" style="margin-left:-85%">ajouter Adresse</button>
                <div class="container" >
                    <div class="row row-cols-1  row-cols-md-2 g-2">

            <!-- The Modal -->


        </div>
        @php
             $i=0;
        @endphp
        @foreach ($adresses as $adresse)
        @php
            $i++;
        @endphp
        <div class="card" style="width: 25rem; display :inline-block ">
            <div class="card-body">
              <h5 class="card-title">Adresse numero @php echo $i @endphp </h5>
              <span>{{ $adresse ->adresse }}</span>
              <form  id_adresse="delete-form-{{$adresse->id_adresse}}" +  action="{{route('suprimer_adresse', $adresse->id_adresse)}}" method="post">
                @csrf @method('DELETE')
                <button href = 'delete/{{ $adresse->id_adresse }}' type="submit" class="btn "><i class="fa fa-solid fa-trash-can" style="color: red;font-size: 22px"></i></button>

              </form>
            </div>
          </div>
           @endforeach
      </div>







            </div>
        </div>
    </section>
  </main>




        </div>
    </div>
        <div style="display: block;"></div> --}}

            <div style="margin-left:10%;padding:1px 16px;">
            <main class="py-2" >
            <div class="container" style="width: 1500px">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" ><span><strong>Adresses</strong></span>
                                <button type="submit" class="btn btn-success btn-block" data-toggle="modal" data-target="#myModal" style="margin-left:600px">ajouter Adresse</button>

                            </div>

                            <div class="card-body">
                                @php
             $i=0;
        @endphp
        @foreach ($adresses as $adresse)
        @php
            $i++;
        @endphp
        <div class="card" style="width: 23rem; display :inline-block ; ">
            <div class="card-body">
                <center>
              <h5 class="card-title">Adresse numero @php echo $i @endphp </h5>
              <span>{{ $adresse ->adresse }}</span>
              <form  id_adresse="delete-form-{{$adresse->id_adresse}}" +  action="{{route('suprimer_adresse', $adresse->id_adresse)}}" method="post">
                @csrf @method('DELETE')
                <button href = 'delete/{{ $adresse->id_adresse }}' type="submit" class="btn "><i class="fa fa-solid fa-trash-can" style="color: red;font-size: 22px"></i></button>

              </form>
            </center>
            </div>
          </div>
           @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog" >
                <div class="modal-content" id="myModal_content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title" style="padding-left: 150px;text-decoration: overline;color: green">Saisir Adresse</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                <div class="modal-body">
                <div class="container">
                    <form method="post" action="{{ route('ajoute_adresse') }}">
                        @csrf
                        <div class="form-group">
                            <label for="nom"> nouvelle adresse</label>
                            <input type="text" class="form-control " id="nom" name="adresse"  style="background-color: white">
                        </div>
                        <button type="submit" class="btn btn-outline-success" style="margin-left: 15px ;width: 200px; font-size:15px ; margin-top: 15px;">Enregistrer</button>
                    </form>
                </div>
                </div>

                    <!-- Modal footer -->


                </div>
            </div>
        </div>



                <script src="{{asset('Bootstrap/bootstrap.js')}}">
                </script>

</body>
</html>
