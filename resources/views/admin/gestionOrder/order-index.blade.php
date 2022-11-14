@extends('admin.template.base')
@section('banner-title', 'Administrateur - Historique commande')
@section('title', 'Admin Orders')
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

    <main class="mb-auto">
        <h1 class="text-center fs-1 my-5 fw-normal">Commande à confirmer</h1>
        <div class="text-center my-3">
            <a href="{{ route('admin.order.index') }}" class="text-decoration-none"><i
                    class="fa-solid fa-arrow-left-long me-2"></i>Retour en arrière</a>
        </div>
        @if (Auth::check())
            <?php $user = Auth::user()->id;
            ?>
        @else
            <?php $user = ''; ?>
        @endif
        <div class="mw-1000px">
            @if (Session::has('successResponse'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center mx-3"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('successResponse') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @elseif (Session::has('errorUpdate'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center mx-3"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('errorUpdate') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @endif
            @if (isset($ordersArray[0]))
                <div class="mx-3">
                    <form action="{{ route('admin.order.update', ' ') }}" method="POST">
                        @method('PATCH')
                        @csrf
                        <table class="table table-hover table-striped table-tickets">
                            <thead class="ccc br-10px">
                                <tr>
                                    <th class="border-0 br-tl-10px p-2 p-md-3">Commande</th>
                                    <th class="border-0 d-sm-none d-md-block p-md-3">Date</th>
                                    <th class="border-0 p-md-3">Client</th>
                                    <th class="border-0 p-md-3">Prix</th>
                                    <th class="border-0 p-md-3">Statut</th>
                                    <th class="text-center border-0 br-tr-10px p-md-3">Voir</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- {{ $order->order_status->status }} --}}
                                @foreach ($ordersArray as $order)
                                    <tr class="tr_commande">
                                        <td class="border-0 p-2 p-md-3 order_td overflow-auto align-middle">
                                            {{ $order->order_number }}</td>
                                        <td class="border-0 p-2 p-md-4 d-sm-none d-md-block align-middle">
                                            {{ $order->created_at }}
                                        </td>
                                        <td class="border-0 p-2 p-md-4  align-middle">
                                            <a class="text-decoration-none"
                                                href="{{ route('admin.order.client.show', $order->user_id) }}">{{ $order->user_id }}</a>
                                        </td>
                                        <td class="border-0 p-2 p-md-3 align-middle">{{ $order->price }}</td>
                                        <td class="border-0 p-2 p-md-3 align-middle">
                                            <select name="status[]" id="" class="form-select tr_commande_select">
                                                @foreach ($orderStatus as $status)
                                                    <option value="{{ $order->id }}-{{ $status->status }}">
                                                        {{ $status->status }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="text-center border-0 p-2 p-md-3 align-middle"><a
                                                href="{{ route('admin.order.show', $order->id) }}"><i
                                                    class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center mt-5">
                            <button type="submit" class="btn btn-primary btn-rounded px-5 btn-press-scale">Actualiser les
                                commandes</button>
                        </div>
                    </form>
                </div>
            @else
                <div class="text-center mb-5">
                    <h1 class="text-center fs-1 my-5 fw-normal">Aucune commandes à confirmer</h1>
                </div>
            @endif
        </div>

        @if ($ordersArray instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-5 d-flex justify-content-center">
                {{ $ordersArray->links('public.template.pagination') }}
            </div>
        @endif
    </main>
@endsection
