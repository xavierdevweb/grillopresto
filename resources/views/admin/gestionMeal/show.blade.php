@extends('admin.template.base')
@section('banner-title', 'Administrateur- Modification des repas')
@section('title', 'Afficher un repas')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="singleMeal m-auto">
        <section class="topSection p-5">

            <h1 class="text-center fs-1 my-5 fw-normal">{{ $meal->name }}</h1>
        </section>
        
        {{-- @if ($added)
            <div class="alert alert-success text-center mt-3 mb-3">
                Vous avez bien ajoutez le repas au panier
            </div>
        @endif --}}

        <section class="mealSection fs-5">
            
            <img class="w-100 mb-5" src="{{ asset('storage/'.$meal->image_path) }}" alt="image">
            <p class="fw-bold">Type : </p>
            @if ($meal->vegetarian || $meal->gluten_free)
                @if ($meal->vegetarian)
                <p>Végétarien</p>
                @endif
                @if ($meal->gluten_free)
                    <p>Sans gluten</p>
                @endif
            @else
                <p>Classique</p>
            @endif
            <p><span class="fw-bold">Description :</span>{{ $meal->description  }}</p>
            
            <p><span class="fw-bold">Ingrédients :</span> </p>
            <ul>
                @foreach ($meal->ingredients as $ingredient)
                    <li>{{ $ingredient }}</li>
                @endforeach
            </ul>
            <p class="fw-bold mb-1">Allergènes :</p>
            <div class="d-flex flex-column gap-3 mb-4">
                @foreach ($meal->allergens as $allergen)
                    @if ($allergen->name == 'Noix')
                        <div>
                            <img src="{{ asset('image/peanuts.png') }}" alt="peanut-allergy" class="fa-peanuts-custom"></i><span> Arachides et noix</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Lait')
                        <div>
                            <i class="fa-solid fa-cow"></i><span> Produits Laitiers</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Oeuf')
                        <div>
                            <i class="fa-solid fa-egg"></i><span> Œufs</span>
                        </div>
                    @endif
                    @if ($allergen->name == 'Crustacés')
                        <div>
                            <i class="fa-solid fa-shrimp"></i><span> Crustacés</span>
                        </div>
                    @endif
                @endforeach
            </div>
           <form method="POST" action="{{route('admin.repas.destroy', ['repa' => $meal->id])}}">
                @csrf
                @method('delete')
                
                <button type="submit" class="btn btn-primary mt-5">Supprimer</button>
            </form>
            

            

        </section>
    </main>
@endsection
