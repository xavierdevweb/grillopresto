@extends('admin.template.base')
@section('banner-title', 'Administrateur- Gestion des repas')
@section('title', 'Repas ajouter')
@section('content')
@if (Auth::user()->role->role === "Admin_2")
@include('admin.template.sub-navbar-admin-2')
@endif
@if (Auth::user()->role->role === "Admin_3")
@include('admin.template.sub-navbar-admin-3')
@endif
    <main class="adminRepasIndex m-auto mw-750px">
        <h1 class="text-center fs-1 my-5 fw-normal">Tous les repas</h1>

        @if (Session::has('deleteSuccess'))
            <p class="alert alert-success">{{Session::get('deleteSuccess')}}</p>
        @endif

        <div class="container d-flex flex-column align-items-center mb-5">
            <div class="nav_container mt-4 px-2 d-flex flex-column align-items-center">
                <form action="{{route('admin.repas.show')}}" method="POST" class="w-100">
                    @csrf
                    <div>
                        <label for="meal" class="form-label">Rechercher un repas</label>
                        <select class="form-select p-3 btn-rounded" name="meal" id="meal">
                            <option value="">Repas</option>
                            @foreach ($meals as $meal)
                                <option value="{{$meal->id}}">{{$meal->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex justify-content-center mb-3">
                        <button type="submit"
                            class="btn btn-info mt-5 btn-rounded px-5 btn-scale-press minw-235px">Rechercher</button>
                    </div>
                </form>
                
                <a class="btn btn-primary btn-rounded py-2 px-4 minw-235px" href="{{route('admin.repas.showAll')}}">Afficher tout les repas</a>

                <hr class="w-25 mt-5" />
                <h1 class="text-center fs-1 my-5 fw-normal">Créé un nouveau repas</h1>
                <a class="btn btn-success btn-rounded py-2 px-4 minw-235px" href="{{route('admin.repas.create')}}">Ajouter un repas</a>

            </div>
        </div>


       
    </main>
@endsection