@extends('admin.template.base')
@section('title', 'Menu modification')
@section('banner-title', 'Administrateur- Modification des menu')
@section('content')

    @if (Auth::user()->role->role === 'Admin_2')
        @include('admin.template.sub-navbar-admin-2')
    @endif
    @if (Auth::user()->role->role === 'Admin_3')
        @include('admin.template.sub-navbar-admin-3')
    @endif
    <main class="menu_edit_admin m-auto px-4 mt-5">

        <h1 class="text-center fs-1 my-5 fw-normal">Modification du menu</h1>
        <div class="text-center mb-5">
            <a href="{{ route('admin.menu.search') }}" class="text-decoration-none"><i
                    class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
        </div>

        @if (Session::has('success'))
            <p class="alert alert-success">{{ Session::get('success') }}</p>
        @elseif(Session::has('error'))
            <p class="alert alert-danger">{{ Session::get('error') }}</p>
        @endif
        <div class="text-center">
            <p>Date : {{ $menu->start_date . ' / ' . $menu->end_date }}</p>
            <p>Type : {{ $menu->menu_type->type }}</p>
        </div>
        <form action="{{ route('admin.menu.update', ['id' => $menu->id]) }}" method="POST"
            class="d-flex flex-column align-items-center">
            @method('put')
            @csrf

            <div class="w-100">
                <label for="meals">Repas</label>
                <select name="meals" id="meals" class="form-select btn-rounded p-3">
                    <option value="null">Repas</option>
                    @if (isset($meals))
                        @foreach ($meals as $meal)
                            <option class="meal" value="{{ $meal->id }}">{{ $meal->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>

            <p class="alert alert-danger text-center">ATTENTION <br>Ce menu est en cours ou est déjà passé.
            </p>


            <div class="checkBox_container mb-5">
                @foreach ($meals as $meal)
                    @php
                        $mealInMenu = false;
                    @endphp
                    @foreach ($menu->history_meals as $hMeal)
                        @if ($hMeal->name == $meal->name)
                            @php
                                $mealInMenu = true;
                            @endphp
                        @endif
                    @endforeach
                    <input name="meal-{{ $meal->id }}" type="checkbox" class="meal-{{ $meal->id }}"
                        {{ $mealInMenu ? 'checked="checked"' : '' }}>
                @endforeach
            </div>
            <div class="alert alert-danger maxMealBox displayNone">Vous avez atteint le nombre maximum de plat par menu.
            </div>
            <div class="alert alert-danger alreadyTaken displayNone">Vous avez déjà sélectionné ce repas dans ce menu.</div>
            <div class="meal_div_container mt-5 w-100">
                <div class="text-white d-flex justify-content-between ps-3 pe-3 pt-2 pb-2 bg-primary header_container">
                    <p class="m-0">Nom du repas</p>
                    <p class="m-0 mealsCounter">{{ count($menu->history_meals) }}/10</p>
                    <p class="m-0">Supprimer</p>
                </div>
                <div class="meals_menu_container bg-light">
                    @foreach ($mealId as $name => $id)
                        <div id="meal-{{ $id }}" class="adminMealDiv meal-{{ $id }}">
                            <p class="m-0">{{ $name }}</p>

                            <button type="button"><i class="fa-sharp fa-solid fa-circle-xmark"></i></button>

                        </div>
                    @endforeach
                </div>
            </div>

            <input class="btn btn-warning m-auto mt-3 btn-scale-press btn-rounded px-4 minw-235px mt-5" type="submit"
                value="Modifier le menu">
        </form>
        <form method="POST" action="{{ route('admin.menu.destroy', ['id' => $menu->id]) }}"
            class="d-flex justify-content-center">
            @method('delete')
            @csrf
            <input class="btn btn-primary btn-scale-press btn-rounded px-4 minw-235px mt-5" type="submit"
                value="Supprimer le menu">
        </form>
    </main>
@endsection
