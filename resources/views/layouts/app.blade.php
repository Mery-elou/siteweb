<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/footer.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" >
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link href="{{asset('Bootstrap/bootstrap.css')}}" rel="stylesheet" >
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <style>
        .container{
            padding: 10% 0px;

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

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        @include('bars.navbar')
        <div class="center">

            <!--2eme navbar-->
            @include('bars.2eme_navbar')
            <!--2eme navbar end-->

        <div style="margin-left:20%;margin-top: -130px;">
        <main class="py-4">
            @yield('content')

        </main>
    </div>
</body>
</html>
