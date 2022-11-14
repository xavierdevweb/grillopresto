@extends('admin.template.base')
@section('banner-title', "Modification d'un administrateur")
@section('title', 'Admin edit')
@section('content')
    @switch(Auth::user()->role->role)
        @case('Admin_3')
            @include('admin.template.sub-navbar-admin-3')
        @break
    @endswitch
    <main class="m-auto">
        <div class="container mw-750px">
            <div class="text-center my-3">
                <a href="{{ route('admin.admin.index') }}" class="text-decoration-none"><i
                        class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
            </div>
            @if (Session::has('clientAccountBlocked') || Session::has('clientAccountDeleted'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('clientAccountBlocked') }}
                    {{ Session::get('clientAccountDeleted') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <h1 class="text-center fs-1 my-5 fw-normal">Choisissez l'administrateur à modifier</h1>
            <label for="selectAdmin">Sélectionnez un Administrateur</label>

            <form action="{{ route('admin.admin.edit', Auth::user()->id) }}" method="get">
                <select name="selectAdmin" id="selectAdmin" name="selectAdmin" class="form-select btn-rounded px-3">
                    @foreach ($admins as $admin)
                        @if ($selectedAdmin->id == $admin->id)
                            <option selected value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                        @else
                            <option value="{{ $admin->id }}">{{ $admin->InfoUser->prenom }}</option>
                        @endif
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-rounded px-5 btn-scale-press mt-5">Rechercher</button>
                </div>
            </form>

            <hr class="w-25 text-primary my-5 m-auto">
            <h2 class="text-center fs-3 my-5">Changer le rôle de l'administrateur</h2>
            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.admin.update', ' ') }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="form-check d-flex flex-column mt-5 align-items-center">
                    @error('role')
                        <div class="text-danger fs-5 fw-bold mb-3">{{ $message }}</div>
                    @enderror
                    <div>
                        <input @if ($selectedAdmin->role->role == 'Admin_1') checked @endif class="form-check-input" type="radio"
                            name="role" id="admin1Radio" value="Admin_1">
                        <label class="form-label" for="admin1Radio">
                            Administrateur niveau 1
                        </label>

                    </div>

                    <div>
                        <input @if ($selectedAdmin->role->role == 'Admin_2') checked @endif class="form-check-input" type="radio"
                            name="role" id="admin2Radio" value="Admin_2">
                        <label class="form-label" for="admin2Radio">
                            Administrateur niveau 2
                        </label>
                    </div>

                    <div>
                        <input @if ($selectedAdmin->role->role == 'Admin_3') checked @endif class="form-check-input" type="radio"
                            name="role" id="admin3Radio" value="Admin_3">
                        <label class="form-label" for="admin3Radio">
                            Administrateur niveau 3
                        </label>

                    </div>
                </div>

                <div class="message my-3">
                    <h2 class="text-center fs-3 my-5">Changer les informations personnelles</h2>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="prenom" class="form-label">Prénom*</label>
                        <input type="text" name="prenom" id="prenom"
                            class="form-control @error('prenom') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->prenom }}" required autocomplete="prenom" autofocus>
                        @error('prenom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="nom" class="form-label">Nom*</label>
                        <input type="text" name="nom" id="nom"
                            class="form-control @error('nom') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->nom }}" required autocomplete="nom" autofocus />
                        @error('nom')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="rue" class="form-label">Rue*</label>
                        <input type="text" name="rue" id="rue"
                            class="form-control @error('rue') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->rue }}" required autocomplete="rue" autofocus>
                        @error('rue')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="noPorte" class="form-label">No de porte*</label>
                        <input type="text" name="noPorte" id="noPorte"
                            class="form-control @error('noPorte') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->no_porte }}" required autocomplete="noPorte" autofocus>
                        @error('noPorte')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-2">
                        <label for="appartement" class="form-label">Appartement</label>
                        <input type="text" name="appartement" id="appartement"
                            class="form-control @error('appartement') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->appartement }}" autocomplete="appartement" autofocus>
                        @error('appartement')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-2">
                        <label for="zip_code" class="form-label">Code-Postal*</label>
                        <input type="text" name="zip_code" id="zip_code"
                            class="form-control @error('zip_code') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->code_postal }}" required autocomplete="zip_code"
                            autofocus>
                        @error('zip_code')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="ville" class="form-label">Ville*</label>
                        <input type="text" name="ville" id="ville"
                            class="form-control @error('ville') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->ville }}" required autocomplete="ville" autofocus>
                        @error('ville')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="col-md-6">
                        <label for="tel" class="form-label">Numéro de téléphone*</label>
                        <input type="tel" name="tel" id="tel"
                            class="form-control @error('tel') is-invalid @enderror"
                            value="{{ $selectedAdmin->infoUser->telephone }}" required autocomplete="tel" autofocus>
                        @error('tel')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="message my-3">
                        <h2 class="text-center fs-3 my-5">Changer les informations de connexion</h2>
                    </div>

                    <div class="col-md-6">
                        <label for="email" class="form-label">Adresse courriel*</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ $selectedAdmin->email }}" required autocomplete="email" autofocus>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="email_confirmation" class="form-label">Confirmer adresse courriel*</label>
                        <input type="email" name="email_confirmation" id="email_confirmation"
                            class="form-control @error('email_confirmation') is-invalid @enderror"
                            value="{{ $selectedAdmin->email }}">
                        @error('email_confirmation')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="password" class="form-label ">Mot de passe*</label>
                        <input type="password" name="password" id="password" 
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


                    <input type="hidden" name="user_id" value="{{ $selectedAdmin->id }}">
                    <div class="d-flex justify-content-center mb-5">
                        <button type="submit"
                            class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Modifier</button>
                    </div>


                    <h2 class="display-6 mt-5">Action sur le compte admin</h2>

                    <div class="col-md-6 mt-5">
                        <label for="accountDeleted" class="form-label ">Date de suppression</label>
                        <input type="text" name="accountDeleted" id="accountDeleted"
                            value="{{ $selectedAdmin->soft_deleted }}" disabled class="form-control"
                            placeholder="Date de suppression" />
                        <div class="mt-2">
                            <label for="restoreClient" class="form-check-label">Récupérer le compte admin ?</label>
                            <input type="checkbox" value="restoreClient" id="restoreClient" name="soft_deleted"
                                class="form-check-input">
                        </div>
                    </div>

                    <div class="col-md-6 mt-5">
                        <label for="accountBlocked" class="form-label">Date de du bannissement</label>
                        <input type="text" name="accountBlocked" id="accountBlocked"
                            value="{{ $selectedAdmin->blocked_at }}" disabled class="form-control"
                            placeholder="Date du bloquage" />
                        <div class="mt-2">
                            <label for="unblockClient" class="form-check-label">Débloquer le compte admin ?</label>
                            <input type="checkbox" value="unblockClient" id="unblockClient" name="blocked_at"
                                class="form-check-input">
                        </div>
                    </div>

                    <input type="hidden" name="client_id" value="{{ $selectedAdmin->id }}">

                    <div class="d-flex justify-content-sm-center justify-content-md-start">
                        <button type="submit"
                            class="btn btn-primary mt-5 mb-5 px-5 btn-scale-press btn-rounded">Enregistrer</button>
                    </div>
                </div>
            </form>
            @include('admin.gestionAdmin.template.modal-admin-destroy')
            @include('admin.gestionAdmin.template.modal-admin-block')
        </div>
        </div>
    </main>
@endsection
