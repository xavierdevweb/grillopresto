@extends('public.template.base')
@section('banner-title', 'Mon profil - Ma commande')
@section('content')
@switch(Auth::user()->role->role)
        @case('Admin_1')
            @include('admin.template.sub-navbar-admin-1')
        @break

        @case('Admin_2')
            @include('admin.template.sub-navbar-admin-2')
        @break

        @case('Admin_3')
            @include('admin.template.sub-navbar-admin-3')
        @break
    @endswitch
    <main class="m-auto">
        <div class="mw-1000px px-3 m-auto">
            <section class="topSection">
                <div class="text-center my-3">
                    <a href="{{ redirect()->getUrlGenerator()->previous() }}" class="text-decoration-none"><i
                            class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
                </div>
                <div>
                    <h1 class="text-start fs-4 my-5 fw-normal"><span><strong>Commande: </strong></span>{{ $order->order_number }}</h1>
                    <h2 class="text-start fs-5"><strong>Date:
                        </strong>{{ date('d-m-Y', strtotime($order->created_at)) }}</h2>
                    <h2 class="text-start fs-5 mb-5"><strong>Prix: </strong>{{ $order->price }}$</h2>
                </div>
            </section>

            <section class="mealSection fs-5">
                @foreach ($meals as $meal)
                    <div class="my-5 p-4 bg-light rounded-5">
                        <img class="w-100 rounded-5 mb-5 meal_card_order" src="{{ asset('storage/' . $meal->image_path) }}" alt="image">
                        <span class="fw-bold">Type: </span>
                        @if ($meal->vegetarian || $meal->gluten_free)
                            @if ($meal->vegetarian)
                                <span>Végétarien</span>
                            @endif
                            @if ($meal->gluten_free)
                                <span>Sans gluten</span>
                            @endif
                        @else
                            <span>Classique</span>
                        @endif
                        <p><span class="fw-bold">Description: </span>{{ $meal->description }}</p>

                        <p><span class="fw-bold">Ingrédients: </span> </p>
                        <ul>
                            @foreach ($meal->ingredients as $ingredient)
                                <li>{{ $ingredient }}</li>
                            @endforeach
                        </ul>
                        <p class="fw-bold mb-1">Allergènes: </p>
                        <div class="d-flex flex-column gap-3 mb-4">
                            @foreach ($meal->allergens as $allergen)
                                @if ($allergen->name == 'Noix')
                                    <div>
                                        <img src="{{ asset('image/peanuts.png') }}" alt="peanut-allergy"
                                            class="fa-peanuts-custom"></i><span> Arachides et noix</span>
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
                    </div>
                @endforeach

            </section>
        </div>
    </main>
@endsection
