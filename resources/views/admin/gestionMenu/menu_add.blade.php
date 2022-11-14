@extends('admin.template.base')
@section('banner-title', 'Administrateur- Ajout menu')
@section('title', 'Menu ajout')
@section('content')

    @if (Auth::user()->role->role === 'Admin_2')
        @include('admin.template.sub-navbar-admin-2')
    @endif
    @if (Auth::user()->role->role === 'Admin_3')
        @include('admin.template.sub-navbar-admin-3')
    @endif
    <main class="mw-750px menu_add_admin d-flex flex-column align-items-center m-auto">
        <h1 class="text-center fs-1 my-5 fw-normal">Ajouter un menu</h1>
        <div class="text-center my-3">
            <a href="{{ route('admin.menu.search') }}" class="text-decoration-none"><i
                    class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
        </div>
        @if (Session::has('success'))
            <div class="alert alert-success">{{ Session::get('success') }}</div>
        @elseif(Session::has('menuAlreadyExists'))
            <div class="alert alert-danger">{{ Session::get('menuAlreadyExists') }}</div>
        @endif
        <form action="{{ route('admin.menu.store') }}" method="POST" class="d-flex flex-column">
            @csrf
            <div>
                <label for="start_date" class="form-label">Choisir la date</label>
                <select name="start_date" id="start_date" class="form-select btn-rounded p-3">
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ date('Y-m-d', strtotime('next Monday + ' . 7 * $i . ' days')) }}">
                            {{ date('Y-m-d', strtotime('next Monday + ' . 7 * $i . ' days')) }}</option>
                    @endfor
                </select>
            </div>
            <div>
                <label for="menu_type" class="form-label">Type de menu</label>
                <select name="menu_type" id="menu_type" class="form-select btn-rounded p-3">
                    @foreach ($menuType as $type)
                        <option value="{{ $type->type }}">{{ $type->type }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="meals" class="form-label">Repas</label>
                <select name="meals" id="meals" class="form-select btn-rounded p-3">
                    <option value="null">Repas</option>
                    @foreach ($meals as $meal)
                        <option
                            class="meal {{ $meal->vegetarian ? 'vegetarian' : '' }} {{ $meal->gluten_free ? 'gluten_free' : '' }}"
                            value="{{ $meal->id }}">{{ $meal->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="checkBox_container">
                @foreach ($meals as $meal)
                    <input name="meal-{{ $meal->id }}" type="checkbox" class="meal-{{ $meal->id }}">
                @endforeach
            </div>

            <div class="alert alert-danger maxMealBox displayNone">Vous avez atteint le nombre maximum de plat par menu.
            </div>
            <div class="alert alert-danger alreadyTaken displayNone">Vous avez déjà sélectionné ce repas dans ce menu.</div>

            <div class="meal_div_container">
                <div class="d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                    <p class="m-0">Nom du repas</p>
                    <p class="m-0 mealsCounter">0/10</p>
                    <p class="m-0">Supprimer</p>
                </div>
                <div class="meals_menu_container">

                </div>
            </div>
            <div class="d-flex m-auto">
                <input class="btn btn-success btn-rounded px-5 btn-scale-press" type="submit" value="Ajouter le menu">
            </div>
        </form>

    </main>


@endsection
