@extends('admin.template.base')
@section('banner-title', 'FAQ - Gestion de la FAQ')
@section('content')
@if (Auth::user()->role->role === "Admin_1")
@include('admin.template.sub-navbar-admin-1')
@endif
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif

    <main class="m-auto">
        <div class="container mw-750px">
            <h2 class="text-center fs-1 my-5 fw-normal">Choisissez la question à modifier</h2>


            @if (Session::has('FaqCreated'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center mb-5"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('FaqCreated') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif


            <label for="id">Sélectionnez une question</label>
            <form action="{{ route('admin.faq.edit', ' ') }}" method="get" class="mt-2">
                <select name="id" id="id" name="id" class="form-select btn-rounded px-3">
                    @foreach ($faqs as $faq)
                        <option value="{{ $faq->id }}">{{ $faq->question }} - {{ $faq->faqTheme->theme }} </option>
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-rounded px-5 btn-scale-press mt-5">Modifier la sélection</button>
                </div>
            </form>

            <div class="d-flex w-25 m-auto my-5 align-items-center">
                <hr class="col-4"><span class="col-4 text-center pb-1">Ou</span>
                <hr class="col-4">
            </div>

            <h1 class="text-center fs-1 my-5 fw-normal">Créer une nouvelle question</h1>

            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.faq.store') }}" method="Post">
                @csrf
                <div>
                    <label class="form-label" for='faqQuestion'>Entrez la question ici :</label>
                    <input type="text" name="question" id="faqQuestion" class="form-control @error('question') is-invalid @enderror">
                    @error('question')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-4">
                    <label class="form-label" for='faqAnswer'>Entrez la réponse ici :</label>
                    <textarea type="text" name="answer" id="faqAnswer" class="form-control  @error('answer') is-invalid @enderror"></textarea>
                    @error('answer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <p>Choisissez le thème de la question:</p>
                    <select name="faq_theme_id" id="faq_theme_id" class="form-select btn-rounded px-2 @error('faq_theme_id') is-invalid @enderror">
                        @foreach ($faqThemes as $theme)
                            @if ($theme->theme === 'Général')
                                <option selected value="{{ $theme->id }}">{{ $theme->theme }}</option>
                            @else
                                <option value="{{ $theme->id }}">{{ $theme->theme }}</option>
                            @endif
                        @endforeach
                    </select>
                    @error('faq_theme_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input @error('is_active') is-invalid @enderror" name="is_active" type="checkbox" role="switch" value="1"
                            id="flexSwitchCheckDefault">
                        <label class="form-check-label user-select-none" for="flexSwitchCheckDefault">Afficher sur la page
                            FAQ ?</label>
                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <input type="hidden" name="user_id" class=" @error('user_id') is-invalid @enderror" value="changePasCaSinonJteKickDansGorge">
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5 w-200px">Ajouter</button>
                </div>
            </form>
        </div>
    </main>
@endsection
