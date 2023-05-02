<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Email</title>
    <link rel="stylesheet" href="{{asset('CSS/email.css')}}">
    <link rel="stylesheet" href="{{asset('CSS/bars/2eme_bar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="{{asset('CSS/bars/navebar.css')}}">
    <link href="{{asset('Bootstrap/bootstrap.css')}}" rel="stylesheet" >

    <style>
        .container{
            border: 3px solid rgb(246, 202, 205);
            padding: 50px 0px;
        }
    </style>
</head>
<body>

    <!--header start-->
        @include('bars.navbar')
    <!--header end-->


<div class="center">
    <!--2eme navbar-->
    @include('bars.2eme_navbar')
    <!--2eme navbar end-->
    <div style="margin-left:20%;margin-top: -70px;">

    <center>
        <div class="container" id="registration-form">
            <a href="" class="logo"><img src="{{asset('Home/images/logo.png')}}" alt=""></a>
            <form method="POST" action="{{ route('register') }}">
                @csrf
@method('POST')
                <div class="form-group">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" class="form-control @if ($errors->has('prenome')) is-invalid   @endif" id="name" name="prenome" placeholder="NOM :" value={{old('prenome')}}>
                </div>
                <div class="form-group">
                    <label for="email">{{ __('Email Address') }}</label>
                    <input id="e-mail" type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email :" value="{{ old('email') }}" required autocomplete="email">
                </div>
                <div class="form-group">
                    <div class="site">
                        <label for="password">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                    <div class="site">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>


                        <button type="submit" class="btn btn-success btn-lg ">{{ __('Register') }} </button>
            </form>
            </div>
        </center>
    </div>
</div>

    <script src="{{asset('JS/cree_clinet.js')}}"></script>

</body>
</html>
