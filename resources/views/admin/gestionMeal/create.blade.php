@extends('admin.template.base')
@section('banner-title', "Administrateur- Création d'un repas")
@section('title', 'Repas ajouter')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="mealAddAdmin mw-750px m-auto">
        <h1 class="text-center fs-1 my-5 fw-normal">Ajouter un repas</h1>
        <form action="{{route('admin.repas.store')}}" method="POST" class="pb-5" enctype="multipart/form-data">
            @csrf
            <div class="pb-3">
                <label class="form-label fw-bold" for="name">Nom : </label>
                <input class="form-control" type="text" name="name" id="name">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="ingrediants pb-3">
                <div class="ingredient_container">
                    <div class="ingredient_item mb-2">
                        <label class="form-label fw-bold" for="ingredient-0">Ingrédient :</label>
                        <input class="form-control" type="text" name="ingredient[]" id="ingredient-0">
                        @error('ingredient')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    
                </div>
                <button class="btn btn-success btn-rounded btn-press-sclae px-4 minw-235px" type="button">Ajouter un ingédient</button>
            </div>
            <div class="pb-3">
                <label class="form-label fw-bold" for="description">Description :</label>
                <textarea class="form-control" type="text" name="description" id="description"></textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <p class="fw-bold">Type : </p>
                <div class="pb-3">
                    <label class="form-check-label user-select-none" for="vegetarian">Végétarien</label>
                    <input class="form-check-input" type="checkbox" name="vegetarian" id="vegetarian">
                </div>
                <div class="pb-3">
                    <label class="form-check-label user-select-none" for="gluten_free">Sans gluten</label>
                    <input class="form-check-input" type="checkbox" name="gluten_free" id="gluten_free">
                </div>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image :</label>
                <input class="form-control input-padding" type="file" name="image" id="image">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex flex-column">
                <p class="fw-bold">Allergens : </p>
                
                    @foreach ($allergens as $allergen)
                    <div class="w-25 d-flex justify-content-between">
                        <label class="form-check-label" for="gluten_free">{{$allergen->name}} :</label>
                        <input class="form-check-input" type="checkbox" name="allergen-{{$allergen->id}}" id="gluten_free">
                    </div>
                    <hr>
                    @endforeach
                
            </div>
            <div>
                <input type="submit" class="btn btn-success btn-rounded btn-press-sclae px-5 minw-235px" value="Ajouter">
            </div>
        </form>
    </main>
@endsection