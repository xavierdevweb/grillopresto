@extends('public.template.base')
@section('banner-title', 'Informations supplémentaires')
@section('title', 'Register')

@section('content')
<main class="m-auto">
    <div class="container p-4">
        <div class="message mb-5">
            <h1 class="display-3 fw-bold">Me créer un compte</h1>
            <h2 class="h2_oauth_register">Laissez-nous vous guider pour finaliser votre inscription.<br />Cela ne prendra qu'une petite minute.</h2>
        </div>

        <form action="{{ route('oAuth.register') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="prenom" class="form-label">Prénom*</label>
                    <input type="text" name="prenom" id="prenom"
                        class="form-control @error('prenom') is-invalid @enderror" value="{{ old('prenom') }}" required
                        autocomplete="prenom" autofocus>
                    @error('prenom')
                        <div class="text-danger invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="nom" class="form-label">Nom*</label>
                    <input type="text" name="nom" id="nom"
                        class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}" required
                        autocomplete="nom" autofocus />
                    @error('nom')
                        <div class="text-danger invalid-feedback">{{ $message }}</div>
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
                        class="form-control @error('noPorte') is-invalid @enderror" value="{{ old('noPorte') }}" required
                        autocomplete="noPorte" autofocus>
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
                        class="form-control @error('zip_code') is-invalid @enderror" value="{{ old('zip_code') }}" required
                        autocomplete="zip_code" autofocus>
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
                    <label for="email" class="form-label d-none">Adresse courriel*</label>
                    <input type="email" name="email" id="email"
                        class="form-control d-none  @error('email') is-invalid @enderror"
                        value="{{ $userInfos[0]['email'] }}" required autocomplete="email" autofocus>
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="email_confirmation" class="form-label d-none">Confirmer adresse courriel*</label>
                    <input type="email" name="email_confirmation" id="email_confirmation"
                        class="form-control d-none @error('email_confirmation') is-invalid @enderror"
                        value="{{ $userInfos[0]['email'] }}">
                    @error('email_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="password" class="form-label d-none">Mot de passe*</label>
                    <input type="password" name="password" id="password" value="{{ $userInfos[0]['password'] }}"
                        class="form-control d-none @error('password') is-invalid @enderror"
                        placeholder="Entrer le mot de passe" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label d-none">Confirmer le mot de passe*</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        value="{{ $userInfos[0]['password'] }}"
                        class="form-control d-none @error('password_confirmation') is-invalid @enderror"
                        placeholder="Confirmer le mot de passe" />
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <button type="submit" class="btn btn-primary mt-5 mb-5"
                        id="submit_oAuth_register px-5 btn-rounded btn-scale-press">S'enregistrer</button>
                </div>
            </div>
        </form>
    </div>
</main>
@endsection
