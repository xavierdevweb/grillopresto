@extends('public.template.base')
@section('banner-title', 'Nouveau Client')
@section('title', 'Register')
@section('content')
    <main>
        <div class="container p-4">
            <div class="message mb-5 mt-4">
                <h1 class="display-3 fw-bold">Me créer un compte</h1>
                <h2 class="h2_register">Laissez-nous vous guider pour créer un compte.<br />Cela ne prendra qu'une petite
                    minute.</h2>
            </div>
            <div class="d-md-none mb-3">
                <a href="#oAuthRegister" class="text-decoration-none">Me créé un compte avec Google ou Github</a>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
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
                            class="form-control @error('appartement') is-invalid @enderror" value="{{ old('appartement') }}"
                            autocomplete="appartement" autofocus>
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
                            class="form-control @error('ville') is-invalid @enderror" value="{{ old('ville') }}" required
                            autocomplete="ville" autofocus>
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


                    <div class="col-md-6">
                        <label for="email" class="form-label">Adresse courriel*</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
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
                        <input autocomplete="new-password" type="password" name="password" id="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="Entrer le mot de passe" />
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
                        <img id="minCharPassInvalidIcon" class="w12px"
                            src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                        <img id="minCharPassValidIcon" class="w12px d-none"
                            src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                    </small>
                    <br>
                    <small class="small_text_custom text-danger" id="numCharPass">Un chiffre
                        <img id="smallNumCharInvalidIcon" class="w12px"
                            src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                        <img id="smallNumCharValidIcon" class="w12px d-none"
                            src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                    </small>
                    <br>
                    <small class="small_text_custom text-danger" id="speCharPass">Un caractère spécial (@ . , # $ ! % * ? &)
                        <img id="smallSpeCharInvalidIcon" class="w12px"
                            src="{{ asset('image/is-invalid.svg') }}" alt="is-invalid-icon">
                        <img id="smallSpeCharValidIcon" class="w12px d-none"
                            src="{{ asset('image/is-valid.svg') }}" alt="is-valid-icon">
                    </small>                  
                </div>

                <button type="submit"
                    class="btn btn-primary mt-5 mb-5 px-5 btn-rounded btn-scale-press">S'enregistrer</button>
            </form>
            <section id="oAuthRegister">
                <div class="d-flex w-50 m-auto mt-5 justify-content-center">
                    <hr class="col-2"><span class="col-sm-8 col-md-3 text-center pb-1">Où créé avec</span>
                    <hr class="col-2">
                </div>

                <div class="logo d-flex justify-content-center mt-4 gap-3">
                    <div class="logo__faceboo rounded p-3 shadow-sm">
                        <a href="{{ route('github.auth') }}"><img src="{{ asset('img\github.png') }}"
                                alt="Logo Github" /></a>
                    </div>
                    <div class="logo__google rounded p-3 shadow-sm">
                        <a href="{{ route('google.auth') }}"><img src="{{ asset('img\google-logo.png') }}"
                                alt="Logo Facebook" /></a>
                    </div>
                </div>

                <div class="text-center mt-5">
                    <p>Déjà un membre ? <a href="{{ route('login') }}" class="link-primary text-decoration-none">Me
                            connecter</a></p>
                </div>
            </section>
        </div>
    </main>
@endsection
