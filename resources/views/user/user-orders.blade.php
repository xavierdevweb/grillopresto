@extends('public.template.base')
@section('banner-title', 'Mon profil - Historique commande')
@section('content')

    @include('user.template.sub-navbar')
    <main class="m-auto">
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
            @elseif (Session::has('noPermission'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center mx-3"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('noPermission') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @elseif (Session::has('ticketClosed'))
                <div class="alert alert-danger  d-flex justify-content-between align-items-center mx-3"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('ticketClosed') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-danger">X</span></button>
                </div>
            @elseif (Session::has('paymentSuccess'))
                <div class="alert alert-success  d-flex justify-content-between align-items-center mx-3"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('paymentSuccess') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif

            @if (isset($ordersArray[0]))
                <div class="mx-3 mt-5">
                    <table class="table table-hover table-striped table-tickets">
                        <thead class="ccc br-10px">
                            <tr>
                                <th class="border-0 br-tl-10px p-2 p-md-3">Commande</th>
                                <th class="border-0 d-sm-none d-md-block p-md-3">Date</th>
                                <th class="border-0 p-md-3">Prix</th>
                                <th class="border-0 p-md-3">Statut</th>
                                <th class="text-center border-0 p-md-3">Aide</th>
                                <th class="text-center border-0 br-tr-10px p-md-3">Voir</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($ordersArray as $order)
                                <tr>
                                    <td class="border-0 p-2 p-md-3 order_td overflow-auto">{{ $order->order_number }}</td>
                                    <td class="border-0 p-2 p-md-3 d-sm-none d-md-block">{{ $order->created_at }}
                                    </td>
                                    <td class="border-0 p-2 p-md-3 ">{{ $order->price }}</td>
                                    <td class="border-0 p-2 p-md-3 ">{{ $order->order_status->status }}</td>
                                    <td class="text-center border-0 p-2 p-md-3"><a
                                            href="{{ route('user.tickets.create', $order->order_number) }}"><i
                                                class="fa-solid fa-circle-exclamation"></i></a></td>
                                    <td class="text-center border-0 p-2 p-md-3"><a
                                            href="{{ route('user.orders.show', $order) }}"><i
                                                class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <hr class="w-25 text-primary my-5 m-auto">

                <div class="text-center mb-5">
                    <h2 class="mb-5">Commander de nouveaux repas</h2>
                    <a href="{{ route('menu') }}" class="btn btn-primary btn-rounded btn-scale-press px-5">Commander</a>
                </div>
            @else
                <h2 class="text-center">Aucune commandes pour ce compte</h2>
                <hr class="w-25 text-primary my-5 m-auto">

                <div class="text-center mb-5">
                    <h2 class="mb-5">Commander de nouveaux repas</h2>
                    <a href="{{ route('menu') }}" class="btn btn-primary btn-rounded btn-scale-press px-5">Commander</a>
                </div>
            @endif
        </div>
    </main>

@endsection
