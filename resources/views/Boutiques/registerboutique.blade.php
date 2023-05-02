@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header " >  <strong style=" color: rgb(139, 136, 162);margin-left: 10px; display: inline-block" >Crée Votre Boutique</strong><img src="{{asset('Images/logo.png')}}"  style="margin-left: 350px" alt=""></div>

                <div class="card-body">
                    <form method="POST" action="{{route('boutique.create')}}">
                        @csrf

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
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom ') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de saisie de Nom</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __(' Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" >

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de saisie de Email</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  value="{{old('password')}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de saisie de Mot de passe</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmer Mot de passe ') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de confirmation de mot de passe</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="Nom_Boutique" class="col-md-4 col-form-label text-md-end">{{ __('Nom Boutique') }}</label>

                            <div class="col-md-6">
                                <input id="Nom_Boutique" type="text" class="form-control @error('Nom_Boutique') is-invalid @enderror" name="Nom_Boutique" value="{{old('Nom_Boutique')}}" >

                                @error('Nom_Boutique')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de saisie de Nom de butique</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="banque" class="col-md-4 col-form-label text-md-end">{{ __('Numéro du compte bancaire') }}</label>

                            <div class="col-md-6">
                                <input id="banque" type="text" class="form-control @error('banque') is-invalid @enderror" name="banque" value="{{old('banque')}}" >

                                @error('banque')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Problème de saisie de Numero cart bancaire</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Enregister') }}
                                </button>
                                <a href="{{route('store.store_login')}}" class="col-md-8 offset-md-2" id="cree_Compte">  se connecter </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
