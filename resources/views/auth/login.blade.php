@extends('public.template.base')
@section('banner-title', 'Client existant')
@section('title', 'Login')
@section('content')
    <main class="m-auto">

        <div class="container p-4 my-5">
            <div class="message mb-5">
                <h1 class="display-3 fw-bold">Bienvenue,</h1>
                <h2>Heureux de vous revoir !</h2>
            </div>

            @error('accountErrorstatus')
                    <h3 class="fs-6 fw-bold text-danger">{{ $message }}</h3>
            @enderror
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="email" class="form-label">Courriel</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required
                            autocomplete="email" autofocus>
                        @error('email')
                            <span class="d-block invalid-feedback fs-6" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label">Mot de passe</label>
                        <input type="password" name="password" id="password"
                            class="form-control @error('email') is-invalid @enderror" required
                            autocomplete="current-password" />
                        @error('password')
                            <span class="d-block invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>



                @if (Route::has('password.request'))
                    <a class="btn btn-link my-3 p-0 text-decoration-none" href="{{ route('password.request') }}">
                        {{ __('J\'ai oublié mon mot de passe ?') }}
                    </a>
                @endif

                <div class="d-flex justify-content-sm-center justify-content-md-start">
                    <button type="submit" class="btn btn-primary w-50 mt-4 px-5 btn-rounded btn-scale-press" id="btn-login">
                        {{ __('Se connecter') }}
                    </button>
                </div>
            </form>

            <div class="d-flex w-50 m-auto mt-5 justify-content-center">
                <hr class="col-2"><span class="col-sm-8 col-md-3 text-center pb-1">Me connecter</span>
                <hr class="col-2">
            </div>

            <div class="logo d-flex justify-content-center mt-4 gap-3">
                <div class="logo__faceboo rounded p-3 shadow-sm">
                    <a href="{{ route('github.auth') }}"><img src="{{ asset('img\github.png') }}" alt="Logo Github" /></a>
                </div>
                <div class="logo__google rounded p-3 shadow-sm">
                    <a href="{{ route('google.auth') }}"><img src="{{ asset('img\google-logo.png') }}"
                            alt="Logo Facebook" /></a>
                </div>
            </div>

            <div class="text-center mt-5">
                <p>Pas de compte ? <a href="{{ route('register') }}" class="link-primary text-decoration-none">M'enregistrer</a></p>
            </div>
        </div>
    </main>
@endsection
