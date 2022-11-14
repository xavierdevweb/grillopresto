@extends('public.template.base')
@section('banner-title', 'Mon profil - informations personnelles')
@section('title', 'Client infos')
@section('content')

    @include('user.template.sub-navbar')
    <main>
        <div class="container p-4">
            <div class="message mb-4">
                <h1 class="display-3 fw-bold">Mes informations</h1>
                <h2>Informations client</h2>
            </div>


            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('user.update.info', $user[0]->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom*</label>
                        <input type="text" name="prenom" id="prenom"
                            class="form-control @error('prenom') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->prenom }}" required autocomplete="prenom" autofocus>
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom*</label>
                        <input type="text" name="nom" id="nom"
                            class="form-control @error('nom') is-invalid @enderror" value="{{ $user[0]->infoUser->nom }}"
                            required autocomplete="nom" autofocus />
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="rue" class="form-label">Rue*</label>
                        <input type="text" name="rue" id="rue"
                            class="form-control @error('rue') is-invalid @enderror" value="{{ $user[0]->infoUser->rue }}"
                            required autocomplete="rue" autofocus>
                        @error('rue')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="noPorte" class="form-label">No de porte*</label>
                        <input type="text" name="noPorte" id="noPorte"
                            class="form-control @error('noPorte') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->no_porte }}" required autocomplete="noPorte" autofocus>
                        @error('noPorte')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="appartement" class="form-label">Appartement</label>
                        <input type="text" name="appartement" id="appartement"
                            class="form-control @error('appartement') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->appartement }}" autocomplete="appartement" autofocus>
                        @error('appartement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label for="zip_code" class="form-label">Code-Postal*</label>
                        <input type="text" name="zip_code" id="zip_code"
                            class="form-control @error('zip_code') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->code_postal }}" required autocomplete="zip-code" autofocus>
                        @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="ville" class="form-label">Ville*</label>
                        <input type="text" name="ville" id="ville"
                            class="form-control @error('ville') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->ville }}" required autocomplete="ville" autofocus>
                        @error('ville')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="tel" class="form-label">Numéro de téléphone*</label>
                        <input type="tel" name="tel" id="tel"
                            class="form-control @error('tel') is-invalid @enderror"
                            value="{{ $user[0]->infoUser->telephone }}" required autocomplete="tel" autofocus>
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
                            class="form-control @error('email') is-invalid @enderror" value="{{ $user[0]->email }}"
                            required autocomplete="email" autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email_confirmation" class="form-label">Confirmer adresse courriel*</label>
                        <input type="email" name="email_confirmation" id="email_confirmation"
                            class="form-control @error('email_confirmation') is-invalid @enderror"
                            value="{{ $user[0]->email }}">
                        @error('email_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mt-5">
                        <label for="activePassword" class="form-label ">Mot de passe actuel</label>
                        <input type="password" name="activePassword" id="activePassword"
                            class="form-control @error('activePassword') is-invalid @enderror"
                            placeholder="Entrer le mot de passe" />
                        @error('activePassword')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">

                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label ">Nouveau mot de passe*</label>
                        <input type="password" name="password" id="password" value=""
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Entrer le mot de passe" autocomplete="new-password" />
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label ">Confirmer le nouveau mot de passe*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirmer le mot de passe" />
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="mt-2 ms-1">
                        <small class="small_text_custom text-danger" id="minCharCountPass">Minimum 8 caractères
                            <img id="minCharCountPassInvalidIcon" class="w12px"
                                src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                            <img id="minCharCountPassValidIcon" class="w12px d-none"
                                src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                        </small>
                        <br>
                        <small class="small_text_custom text-danger" id="maxCharCountPass">Maximum 50 caractères
                            <img id="maxCharCountPassInvalidIcon" class="w12px"
                                src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                            <img id="maxCharCountPassValidIcon" class="w12px d-none"
                                src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                        </small>
                        <br>
                        <small class="small_text_custom text-danger" id="majCharPass">Une lettre majuscule
                            <img id="majCharCountPassInvalidIcon" class="w12px"
                                src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                            <img id="majCharCountPassValidIcon" class="w12px d-none"
                                src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                        </small>
                        <br>
                        <small class="small_text_custom text-danger" id="minCharPass">Une lettre minuscule
                            <img id="minCharPassInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                                alt="is-invalid-icon">
                            <img id="minCharPassValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                                alt="is-valid-icon">
                        </small>
                        <br>
                        <small class="small_text_custom text-danger" id="numCharPass">Un chiffre
                            <img id="smallNumCharInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                                alt="is-invalid-icon">
                            <img id="smallNumCharValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                                alt="is-valid-icon">
                        </small>
                        <br>
                        <small class="small_text_custom text-danger" id="speCharPass">Un caractère spécial (@ . , # $ ! %
                            * ? &)
                            <img id="smallSpeCharInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                                alt="is-invalid-icon">
                            <img id="smallSpeCharValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                                alt="is-valid-icon">
                        </small>
                    </div>
                </div>

                <button type="submit"
                    class="btn btn-primary mt-5 mb-5 px-5 btn-scale-press btn-rounded">Enregistrer</button>
            </form>
            @include('user.template.modal-user-destroy')
        </div>
    </main>
@endsection
