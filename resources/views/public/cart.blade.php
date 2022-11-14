@extends('public.template.base')
@section('title', 'Panier')
@section('banner-title', 'Commande - Mon panier')
@section('content')
    <main class="cart m-auto">
        @if (Session::has('success'))
            <div class="alert alert-success  d-flex justify-content-between align-items-center mb-5"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('success') }}
                <button type="button" class="close btn btn-link text-decoration-none"
                    id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
            </div>
        @endif
        @if (Session::has('paymentSuccess'))
        <div class="alert alert-success  d-flex justify-content-between align-items-center"
            id="divAlertSucccessInfoChanged">
            {{ Session::get('paymentSuccess') }}
            <button type="button" class="close btn btn-link text-decoration-none"
                id="btnAlertSucccessInfoChanged"><span class="text-secondary">X</span></button>
        </div>
        @endif

        @if (Session::has('paymentFailed'))
            <div class="alert alert-danger  d-flex justify-content-between align-items-center"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('paymentFailed') }}
                <button type="button" class="close btn btn-link text-decoration-none"
                    id="btnAlertSucccessInfoChanged"><span class="text-secondary">X</span></button>
            </div>
        @endif
        <section class="cart_container">
            @if (session()->exists('cart') && count(session('cart')) > 0)
                <h2 class="mb-5">Menu : {{ session('menu') }}</h2>
                <div class="card_container">

                    @foreach ($meals as $meal)
                        <div class="cart_card">
                            <a href="{{ route('meal', ['repas' => $meal->id]) }}">
                                <img src="{{ asset('storage/'.$meal->image_path) }}" alt="image">
                            </a>
                            <div class="text_container">
                                <p>Nom : {{ $meal->name }}</p>
                                <p>Prix : {{ $priceInfo[0]->price }}$ <small>(prix pour 1 personne)</small></p>
                                <a href="{{ route('cart', ['delete' => $meal->id]) }}">Supprimer de la commande</a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <section class="w-100 login_container d-flex flex-column">
                    @guest
                    <h1 class="text-center fs-1 my-5 fw-normal">J'ai déjà un compte</h1>
                        <a class="btn btn-primary mt-5 btn-scale-press btn-rounded w-200px" href="{{ route('login') }}">Se connecter</a>
                        <div class="d-flex w-25 m-auto my-5 align-items-center">
                            <hr class="col-4"><span class="col-4 text-center pb-1">Ou</span>
                            <hr class="col-4">
                        </div>
                    @endguest
                    
                    @if (Auth::check())
                        <h1 class="text-start fs-1 my-5 fw-normal">Information de livraison</h1>
                    @else
                        <h1 class="text-center fs-1 mb-4 fw-normal">Guest checkout</h2>
                    @endif
                    
                    <form role="form" action="{{ route('stripe.post') }}" method="post" class="require-validation"
                        data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <label for="prenom">Prenom</label>
                                <input class="form-control @error('prenom') is-invalid @enderror"
                                    value="{{ (Auth::check() ? Auth::user()->infoUser->prenom : old('prenom')) }}" name="prenom" id="prenom" type="text">
                                @error('prenom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="nom">Nom</label>
                                <input class="form-control @error('nom') is-invalid @enderror"
                                    value="{{ (Auth::check() ? Auth::user()->infoUser->nom : old('nom')) }}" name="nom" id="nom" type="text">
                                @error('nom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="rue">Rue</label>
                                <input class="form-control @error('rue') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->rue : old('rue')) }}"
                                    name="rue" id="rue" type="text">
                                @error('rue')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-3">
                                <label for="appartement">Appartement</label>
                                <input class="form-control @error('appartement') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->appartement : old('appartement')) }}"
                                    name="appartement" id="appartement" type="text">
                                @error('appartement')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-3">
                                <label for="noPorte">No de porte</label>
                                <input class="form-control @error('noPorte') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->no_porte : old('noPorte')) }}"
                                    name="noPorte" id="noPorte" type="text">
                                @error('noPorte')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
    
                            <div class="col-md-6">
                                <label for="ville">Ville</label>
                                <input class="form-control @error('ville') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->ville : old('ville')) }}"
                                    name="ville" id="ville" type="text">
                                @error('ville')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                            <div class="col-md-6">
                                <label for="zip_code">Code postal</label>
                                <input class="form-control @error('zip_code') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->code_postal : old('zip_code')) }}"
                                    name="zip_code" id="zip_code" type="text">
                                @error('zip_code')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
    
                                <div>
                                    @guest
                                        <label for="tel">Téléphone*</label>
                                    @endguest
                                    <input class="form-control @error('tel') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->infoUser->telephone : old('tel')) }}"
                                        name="tel" id="tel" type="{{(Auth::check() ? "hidden" : "tel")}}">
                                    @error('tel')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                
    
                                <div>
                                    @guest
                                        <label for="email">Adresse courriel*</label>
                                    @endguest
                                    <input class="form-control @error('email') is-invalid @enderror" value="{{ (Auth::check() ? Auth::user()->email : old('email')) }}"
                                        name="email" id="email" type="{{(Auth::check() ? "hidden" : "email")}}">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>  
                                <h2 class="text-center fs-2 my-5 fw-normal">Choisir les portions des plats</h2>
                                <div class="mt-3 mb-5 portion_div">
                                    <label class="form-label" for="portion">Nombre de portions</label>
                                    <select class="form-select btn-rounded ps-3 p-2" name="portion" id="portion">
                                        @foreach ($portions as $portion)
                                        <option value="{{$portion->id}}">{{$portion->portion}} personnes</option>
                                        @endforeach
                                    </select>
                                </div>
    
                </div>
                @include('public.template.stripe')
                </form>
                <div class="priceInfo displayNone">
                    <p>{{session()->exists('cart') ? count(session('cart')) : ""}}</p>
                    @foreach ($priceInfo as $info)
                        <div class="price ">
                            <p>{{$info->portion_id}}</p>
                            <p>{{$info->price}}</p>
                        </div>
                    @endforeach
                </div>
            </section>
    
            @else
            <div class="d-flex justify-content-center flex-column align-items-center">
                <p class="mt-5 text-center fs-3">Aucun repas n'a été selectionné</p>
                <small class="small_text_custom mb-4 ">Votre panier doit contenir des items afin de pouvoir passer à la caisse</small>
                <hr class="w-25 text-primary mb-5">
                <a class="btn btn-primary btn-rounded px-4" href="{{ route('menu') }}">Voir les repas de la semaine</a>
            </div>
            @endif
        </section>
    </main>
@endsection
