@extends('admin.template.base')
@section('banner-title', 'Administrateur - Gestion des tickets')
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
    <main class="m-auto d-flex flex-column align-items-center mt-5">
        <div><h1 class="text-center fs-1 mb-5 fw-normal">Ticket ouvert</h1></div>
        <div class="container mx-sm-3 mx-lg-0 mw-1000px ">
            @if ($ticketsArray != null)
                <table class="table table-hover table-tickets">
                    <thead>
                        <tr class="ccc">
                            <th class="border-0 br-tl-10px p-2 p-md-3">Ticket</th>
                            <th class="border-0 p-2 p-md-3">Date</th>
                            <th class="border-0 p-2 p-md-3">État</th>
                            <th class="border-0 p-2 p-md-3">Type</th>
                            <th class="d-sm-none d-md-block border-0 p-2 p-md-3">Description</th>
                            <th class="text-center border-0 br-tr-10px p-2 p-md-3">Voir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        
                        ?>
                        @foreach ($ticketsArray as $ticket)
                            <?php $i++; ?>
                            @if (count($ticketsArray) == 1)
                                @switch($ticket->ticket_type->type)
                                    @case('Paiement refusé')
                                        <tr class='border border-1 yellowRow'>
                                        @break

                                        @case('Commande non reçu')
                                        <tr class='border border-1 blueRow'>
                                        @break

                                        @case('Support')
                                        <tr class='border border-1 greenRow'>
                                        @break

                                        @case('Problème de commande')
                                        <tr class='border border-1 redRow'>
                                        @break

                                        @default
                                        <tr class='border border-1'>
                                    @endswitch
                                @else
                                    @switch($ticket->ticket_type->type)
                                        @case('Paiement refusé')
                                        <tr class='border border-1 yellowRow'>
                                        @break

                                        @case('Commande non reçu')
                                        <tr class='border border-1 blueRow'>
                                        @break

                                        @case('Support')
                                        <tr class='border border-1 greenRow'>
                                        @break

                                        @case('Problème de commande')
                                        <tr class='border border-1 redRow'>
                                        @break

                                        @default
                                        <tr class='border border-1'>
                                    @endswitch
                            @endif
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_number }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket['date'] }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_status->status }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_type->type }}</td>
                            <td class="d-sm-none d-md-block border-0 p-2 p-md-3 align-middle">{{ $ticket['description'] }}</td>
                            <td class="text-center border-0 p-2 p-md-3 align-middle"><a
                                    href="{{ route('admin.ticket.show', $ticket->id) }}"><i
                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <div class="text-center mb-5">
                    <h2 class="mb-5">Aucun ticket d'ouvert</h2>
                </div>
            @endif


        </div>
        @if ($ticketForPagination instanceof \Illuminate\Pagination\LengthAwarePaginator)
            <div class="mt-5">
                {{ $ticketForPagination->links('public.template.pagination') }}
            </div>
        @endif
    </main>
@endsection
