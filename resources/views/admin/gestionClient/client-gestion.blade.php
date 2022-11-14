@extends('admin.template.base')
@section('banner-title', 'Rechercher un client')
@section('title', 'Client gestion')
@section('content')
@switch(Auth::user()->role->role)
        @case('Admin_3')
            @include('admin.template.sub-navbar-admin-3')
        @break
    @endswitch
    <div class="container">
        @if (Session::has('noUserFound'))
            <div class="alert alert-danger d-flex justify-content-between align-items-center w-100 mw-700px mt-5"
                id="divAlertSucccessInfoChanged">
                {{ Session::get('noUserFound') }}
                <button type="button" class="close btn btn-link text-decoration-none" id="btnAlertSucccessInfoChanged"><span
                        class="text-danger">X</span></button>
            </div>
        @endif
    </div>
    <main class="mb-auto">
        <h1 class="text-center fs-1 my-5 fw-normal">Rechercher un membre</h1>
        <div class="container d-flex flex-column align-items-center mb-5">
            <div class="nav_container mt-4 px-2">
                <ul class="d-flex justify-content-center align-items-center">
                    <li class="d-flex align-items-center justify-content-center"><a
                            class="cursor-pointer bg-primary text-white" id="linkSearchEmail">Email</a></li>
                    <li class="d-flex align-items-center justify-content-center"><a class="bg-primary text-white"
                            id="linkSearchTel">Tel</a></li>
                </ul>
                <form action="{{ route('admin.client.show', ' ') }}" method="GET">
                    <div id="divSearchEmail">
                        <label for="email" class="form-label">Rechercher un client via son email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
                    </div>
                    <div id="divSearchTel" class="d-none">
                        <label for="tel" class="form-label">Rechercher un client via son téléphone</label>
                        <input type="tel" class="form-control" placeholder="819-000-0000" name="tel">
                    </div>
                    <div class="d-flex justify-content-sm-center justify-content-md-start">
                        <button type="submit"
                            class="btn btn-info mt-5 btn-rounded px-5 btn-scale-press">Rechercher</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    {{-- @include('admin.gestionClient.template.modal-user-destroy') --}}
@endsection
