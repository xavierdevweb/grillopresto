@extends('admin.template.base')
@section('banner-title', "Modification d'un administrateur")
@section('title', 'Admin index')
@section('content')
    @switch(Auth::user()->role->role)
        @case('Admin_3')
            @include('admin.template.sub-navbar-admin-3')
        @break
    @endswitch
    <main class="m-auto">
        <div class="container mw-750px">
            <h1 class="text-center fs-1 my-5 fw-normal">Choisissez l'administrateur à modifier</h1>
            @if (Session::has('noAdmin'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center mb-5"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('noAdmin') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @endif
            <label for="selectAdmin">Sélectionnez un Administrateur</label>
            <form action="{{ route('admin.admin.edit', Auth::user()->id) }}" method="get">
                <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select btn-rounded px-3">
                    <option value="" selected>Choisissez un Admin</option>
                    @foreach ($admins as $admin)
                        <option value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-rounded px-5 btn-scale-press mt-5">Rechercher</button>
                </div>
            </form>




            <hr class="w-25 text-primary my-5 m-auto">



            <h1 class="text-center fs-1 my-5 fw-normal">Ajouter un nouvel administrateur </h1>


            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.admin.store') }}" method="Post">
                @csrf
                <div class="form-check d-flex flex-column mt-5 align-items-center">
                    @error('role')
                        <div class="text-danger fs-5 fw-bold mb-3">{{ $message }}</div>
                    @enderror
                    <div>
                        <input class="form-check-input" type="radio" name="role" id="admin1Radio" value="Admin_1">
                        <label class="form-label" for="admin1Radio">
                            Administrateur niveau 1
                        </label>

                    </div>

                    <div>
                        <input class="form-check-input" type="radio" name="role" id="admin2Radio" value="Admin_2">
                        <label class="form-label" for="admin2Radio">
                            Administrateur niveau 2
                        </label>
                    </div>

                    <div>
                        <input class="form-check-input" type="radio" name="role" id="admin3Radio" value="Admin_3">
                        <label class="form-label" for="admin3Radio">
                            Administrateur niveau 3
                        </label>

                    </div>
                </div>

                <div class="message my-3">
                    <h2 class="text-center fs-3 my-5">Les informations personnelles</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom*</label>
                        <input type="text" name="prenom" id="prenom"
                            class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" required
                            autocomplete="prenom" autofocus>
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom*</label>
                        <input type="text" name="nom" id="nom"
                            class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required
                            autocomplete="nom" autofocus />
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="rue" class="form-label">Rue*</label>
                        <input type="text" name="rue" id="rue"
                            class="form-control @error('rue') is-invalid @enderror" value="{{ old('rue') }}" required
                            autocomplete="rue" autofocus>
                        @error('rue')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="noPorte" class="form-label">No de porte*</label>
                        <input type="text" name="noPorte" id="noPorte"
                            class="form-control @error('noPorte') is-invalid @enderror" value="{{ old('noPorte') }}"
                            required autocomplete="noPorte" autofocus>
                        @error('noPorte')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="appartement" class="form-label">Appartement</label>
                        <input type="text" name="appartement" id="appartement"
                            class="form-control @error('appartement') is-invalid @enderror"
                            value="{{ old('appartement') }}" autocomplete="appartement" autofocus>
                        @error('appartement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label for="zip_code" class="form-label">Code-Postal*</label>
                        <input type="text" name="zip_code" id="zip_code"
                            class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}"
                            required autocomplete="zip_code" autofocus>
                        @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="ville" class="form-label">Ville*</label>
                        <input type="text" name="ville" id="ville"
                            class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}"
                            required autocomplete="ville" autofocus>
                        @error('ville')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="tel" class="form-label">Numéro de téléphone*</label>
                        <input type="tel" name="tel" id="tel"
                            class="form-control @error('tel') is-invalid @enderror" value="{{ old('tel') }}" required
                            autocomplete="tel" autofocus>
                        @error('tel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="message my-3">
                        <h2 class="text-center fs-3 my-5">Les informations de connexion</h2>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Adresse courriel*</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                            required autocomplete="new-email" autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email_confirmation" class="form-label">Confirmer adresse courriel*</label>
                        <input type="email" name="email_confirmation" id="email_confirmation"
                            class="form-control @error('email_confirmation') is-invalid @enderror"
                            value="{{ old('email_confirmation') }}">
                        @error('email_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label ">Mot de passe*</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Entrer le mot de passe" autocomplete="new-password"/>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password_confirmation" class="form-label ">Confirmer le mot de passe*</label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            placeholder="Confirmer le mot de passe" />
                        @error('password_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>


                <div class="mt-2 ms-1">
                    <small class="small_text_custom text-danger" id="minCharCountPass">Minimum 8 caractères
                        <img id="minCharCountPassInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                            alt="is-invalid-icon">
                        <img id="minCharCountPassValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                            alt="is-valid-icon">
                    </small>
                    <br>
                    <small class="small_text_custom text-danger" id="maxCharCountPass">Maximum 50 caractères
                        <img id="maxCharCountPassInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                            alt="is-invalid-icon">
                        <img id="maxCharCountPassValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                            alt="is-valid-icon">
                    </small>
                    <br>
                    <small class="small_text_custom text-danger" id="majCharPass">Une lettre majuscule
                        <img id="majCharCountPassInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                            alt="is-invalid-icon">
                        <img id="majCharCountPassValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                            alt="is-valid-icon">
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
                    <small class="small_text_custom text-danger" id="speCharPass">Un caractère spécial (@ . , # $ ! % * ?
                        &)
                        <img id="smallSpeCharInvalidIcon" class="w12px" src="{{ asset('image/is-invalid.svg') }}"
                            alt="is-invalid-icon">
                        <img id="smallSpeCharValidIcon" class="w12px d-none" src="{{ asset('image/is-valid.svg') }}"
                            alt="is-valid-icon">
                    </small>
                </div>

                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Ajouter</button>
                </div>
            </form>
        </div>
    </main>
@endsection
