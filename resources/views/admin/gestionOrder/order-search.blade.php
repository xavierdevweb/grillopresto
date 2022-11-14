@extends('admin.template.base')
@section('banner-title', 'Administrateur - Rechercher une commande')
@section('title', 'Client gestion')
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
    <div class="container">
        @if (Session::has('noOrderFound'))
            <div class="alert alert-danger d-flex justify-content-between align-items-center w-100 mw-700px mt-5"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('noOrderFound') }}
                <button type="button" class="close btn btn-link text-decoration-none" id="btnAlertSucccessInfoChanged"><span
                        class="text-danger">X</span></button>
            </div>
        @endif
    </div>
    <main class="mb-auto">
        <div class="container d-flex flex-column align-items-center mb-5">
            <h1 class="text-center fs-1 my-5 fw-normal">Recherchez une commande</h1>
            <div class="nav_container mt-4 px-2">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="d-flex align-items-center justify-content-center"><a
                            class="cursor-pointer bg-primary text-white" id="linkSearchEmail">Commande#</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                            id="linkSearchTel">Email - Tel</a></li>
                </ul>
                <form action="{{ route('admin.order.search', ' ') }}" method="GET">
                    <div id="divSearchEmail">
                        <label for="order_number" class="form-label">Rechercher via le numéro de commande</label>
                        <input type="text" class="form-control" name="order_number" placeholder="Commande #">
                    </div>
                    <div id="divSearchTel" class="d-none">
                        <label for="tel" class="form-label">Rechercher une commande via son téléphone</label>
                        <input type="tel" class="form-control" name="tel" placeholder="000-000-0000">
                        <label for="email" class="form-label">Rechercher une commande via son email</label>
                        <input type="email" class="form-control" name="email" placeholder="Johndoe@hotmail.com">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit"
                            class="btn btn-info mt-5 btn-rounded px-5 btn-scale-press">Rechercher</button>
                    </div>
                </form>
                <hr class="w-25 text-primary my-5 m-auto">
                <div class="d-flex justify-content-center">
                    <a href="{{ route('admin.order.show.all') }}"
                        class="btn btn-info btn-rounded px-5 btn-scale-press">Afficher toutes les commandes</a>
                </div>
            </div>

        </div>
    </main>
@endsection
