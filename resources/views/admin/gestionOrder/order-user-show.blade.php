@extends('public.template.base')
@section('banner-title', 'Mon profil - informations personnelles')
@section('content')
@switch(Auth::user()->role->role)
        @case('Admin_1')
            @include('admin.template.sub-navbar-admin-1')
        @break

        @case('Admin_2')
            @include('admin.template.sub-navbar-admin-2')
        @break

        @case('Admin_3')
            @include('admin.template.sub-navbar-admin-3')
        @break
    @endswitch
    <div class="text-center my-3">
        <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-decoration-none"><i
                class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
    </div>
    <main class=" m-auto">
        <div class="container p-4">
            <div class="message mb-4">
                <h2>Informations client</h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom*</label>
                    <input type="text" name="prenom" id="prenom"
                        class="form-control @error('prenom') is-invalid @enderror" disabled value="{{ $user->infoUser->prenom }}"
                        required autocomplete="prenom" autofocus>
                    @error('prenom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom*</label>
                    <input type="text" name="nom" id="nom"
                        class="form-control @error('nom') is-invalid @enderror" disabled value="{{ $user->infoUser->nom }}"
                        required autocomplete="nom" autofocus />
                    @error('nom')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="rue" class="form-label">Rue*</label>
                    <input type="text" name="rue" id="rue"
                        class="form-control @error('rue') is-invalid @enderror" disabled value="{{ $user->infoUser->rue }}"
                        required autocomplete="rue" autofocus>
                    @error('rue')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="noPorte" class="form-label">No de porte*</label>
                    <input type="text" name="noPorte" id="noPorte"
                        class="form-control @error('noPorte') is-invalid @enderror" disabled
                        value="{{ $user->infoUser->no_porte }}" required autocomplete="noPorte" autofocus>
                    @error('noPorte')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-2">
                    <label for="appartement" class="form-label">Appartement</label>
                    <input type="text" name="appartement" id="appartement"
                        class="form-control @error('appartement') is-invalid @enderror" disabled
                        value="{{ $user->infoUser->appartement }}" autocomplete="appartement" autofocus>
                    @error('appartement')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-2">
                    <label for="zip_code" class="form-label">Code-Postal*</label>
                    <input type="text" name="zip_code" id="zip_code"
                        class="form-control @error('zip_code') is-invalid @enderror" disabled
                        value="{{ $user->infoUser->code_postal }}" required autocomplete="zip-code" autofocus>
                    @error('zip_code')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="ville" class="form-label">Ville*</label>
                    <input type="text" name="ville" id="ville"
                        class="form-control @error('ville') is-invalid @enderror" disabled value="{{ $user->infoUser->ville }}"
                        required autocomplete="ville" autofocus>
                    @error('ville')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>


                <div class="col-md-6">
                    <label for="tel" class="form-label">Numéro de téléphone*</label>
                    <input type="tel" name="tel" id="tel"
                        class="form-control @error('tel') is-invalid @enderror" disabled value="{{ $user->infoUser->telephone }}"
                        required autocomplete="tel" autofocus>
                    @error('tel')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>



                <div class="message my-4">
                    <h2 class="fs-1">Informations du compte</h2>
                </div>

                <div class="col-md-6">
                    <label for="email" class="form-label">Adresse courriel*</label>
                    <input type="email" name="email" id="email"
                        class="form-control @error('email') is-invalid @enderror" disabled value="{{ $user->email }}" required
                        autocomplete="email" autofocus>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
    </main>
@endsection
