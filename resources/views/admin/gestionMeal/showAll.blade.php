@extends('admin.template.base')
@section('banner-title', 'Administrateur - Tous les repas')
@section('title', 'Afficher tout les repas')
@section('content')
    @if (Auth::user()->role->role === 'Admin_2')
        @include('admin.template.sub-navbar-admin-2')
    @endif
    @if (Auth::user()->role->role === 'Admin_3')
        @include('admin.template.sub-navbar-admin-3')
    @endif
    <main class="adminRepasIndex m-auto p-3">
        <h1 class="text-center fs-1 my-5 fw-normal">Tous les repas</h1>
        <nav class="nav_container m-auto mt-5">
            <ul class="d-flex justify-content-between align-items-center">
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'classic' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'classique']) }}">Standard</a></li>
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'vegetarien' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'vegetarien']) }}">Végétarien</a></li>
                <li class="d-flex align-items-center justify-content-center"><a
                        class="bg-primary text-white {{ $type == 'sans_gluten' ? 'nav_selected' : '' }}"
                        href="{{ route('admin.repas.showAll', ['type' => 'sans_gluten']) }}">Sans Gluten</a></li>
            </ul>
        </nav>
        <table class="table table-striped table-hover mw-1000px mt-5">
            <thead>
                <tr class="bg-primary text-white">
                    <th class="p-3 th_repas_all">Nom</th>
                    <th class="p-3 th_repas_all">Voir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($meals as $meal)
                    <tr>
                        <td class="p-3">
                            <span class="ps-2">{{ $meal->name }}</span>
                        </td>
                        <td class="p-3">
                            <a href="{{ route('admin.repas.show.get', ['id' => $meal->id]) }}" class="ms-3">
                                <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
        @if ($meals instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-5">
                {{ $meals->links('public.template.pagination') }}
            </div>
        @endif
    </div>
    </main>
@endsection
