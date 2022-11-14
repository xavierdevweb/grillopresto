@extends('admin.template.base')
@section('banner-title', 'FAQ - Modification de la FAQ')
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
            <h1 class="text-center fs-1 my-5 fw-normal">Choisissez la FAQ à modifier</h1>

            <div class="text-center my-3">
                <a href="{{ route('admin.faq.index') }}" class="text-decoration-none"><i
                        class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
            </div>

            @if (Session::has('FaqCreated') || Session::has('faqDeleted'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center mb-5"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('FaqCreated') }}
                    {{ Session::get('faqDeleted') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif


            <label for="id">Sélectionnez une question</label>
            <form action="{{ route('admin.faq.edit', ' ') }}" method="get" class="mt-2">
                <select name="id" id="id" name="id" class="form-select btn-rounded px-3">
                    @foreach ($faqs as $single)
                        @if ($faq->id === $single->id)
                            <option selected value="{{ $single->id }}">{{ $single->question }} -
                                {{ $single->faqTheme->theme }}
                            </option>
                        @else
                            <option value="{{ $single->id }}">{{ $single->question }} - {{ $single->faqTheme->theme }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-info btn-rounded px-5 btn-scale-press mt-5">Modifier la
                        sélection</button>
                </div>
            </form>

            <hr class="w-25 text-primary my-5 m-auto">

            <h2 class="text-center fs-3 my-5">Modifier la question</h2>

            @if (Session::has('successInfosChanged'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successInfosChanged') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('admin.faq.update', Auth::user()->id) }}" method="Post">
                @method('PATCH')
                @csrf
                <div>
                    <label class="form-label" for='faqQuestion'>Entrez votre question modifiée :</label>
                    <input type="text" name="question" id="faqQuestion"
                        class="form-control @error('question') is-invalid @enderror" value="{{ $faq->question }}">
                    @error('question')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-4">
                    <label class="form-label" for='faqAnswer'>Entrez votre réponse modifiée :</label>
                    <textarea type="text" name="answer" id="faqAnswer" class="form-control @error('answer') is-invalid @enderror">{{ $faq->answer }}</textarea>
                    @error('answer')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <p>Modifier le thème de la question:</p>
                    <select name="faq_theme_id" id="faq_theme_id"
                        class="form-select btn-rounded px-2 @error('faq_theme_id') is-invalid @enderror">
                        @foreach ($faqThemes as $theme)
                            @if ($faq->faqTheme->theme == $theme->theme)
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

                        <input class="form-check-input  @error('is_active') is-invalid @enderror" name="is_active"
                            type="checkbox" role="switch" value="1" @if ($faq->is_active === 1) checked @endif
                            id="flexSwitchCheckDefault">
                        <label class="form-check-label user-select-none" for="flexSwitchCheckDefault">Afficher sur la page
                            FAQ ?</label>
                        @error('is_active')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-4">
                    <input type="hidden" name="user_id" value="changePasCaSinonJteKickDansGorge"
                        class=" @error('user_id') is-invalid @enderror">
                    @error('user_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <input type="hidden" name="faq_id" class=" @error('faq_id') is-invalid @enderror"
                        value="{{ $faq->id }}">
                    @error('faq_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex justify-content-center mb-5">
                    <button type="submit" class="btn btn-success btn-rounded px-5 btn-scale-press mt-5">Modifier</button>
                </div>
            </form>
            <div class="d-flex justify-content-center mb-5">
                <form action="{{ route('admin.faq.destroy', $faq->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="text-primary btn btn-link text-decoration-none">Supprimer cette question</button>
                </form>
            </div>
        </div>
    </main>
@endsection
