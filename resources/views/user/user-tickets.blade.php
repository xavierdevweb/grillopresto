@extends('public.template.base')
@section('banner-title', 'Mon profil - Mes tickets')
@section('content')

    @include('user.template.sub-navbar')
    <main class="m-auto d-flex flex-column align-items-center mt-5">
        <div class="container mx-sm-3 mx-lg-0 mw-1075px">
            @if ($ticketsArray != null)
                <table class="table table-hover table-striped table-tickets">
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
                                <tr class='border border-1'>
                                @else
                                <tr class='border border-1'>
                            @endif
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_number }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket['date'] }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_status->status }}</td>
                            <td class="border-0 p-2 p-md-3 align-middle">{{ $ticket->ticket_type->type }}</td>
                            <td class="d-sm-none d-md-block border-0 p-2 p-md-3 align-middle">{{ $ticket['description'] }}
                            </td>
                            <td class="text-center border-0 p-2 p-md-3 align-middle"><a
                                    href="{{ route('user.tickets.show', $ticket->id) }}"><i
                                        class="fa-solid fa-arrow-up-right-from-square"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($ticketsArray instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-5 d-flex justify-content-center">
                        {{ $ticketsArray->links('public.template.pagination') }}
                    </div>
                @endif
        </div>

        <hr class="w-25 text-primary my-5 m-auto">

        <div class="text-center mb-5">
            <h2 class="mb-5">Envoyer un nouveau Ticket</h2>
            <a href="{{ route('user.tickets.create', Auth::user()->id) }}"
                class="btn btn-primary btn-rounded btn-scale-press px-5">Nouveau ticket</a>
        </div>
    @else
        <div class="text-center mb-5">
            <h2 class="mb-5">Envoyer un nouveau Ticket</h2>
            <a href="{{ route('user.tickets.create', Auth::user()->id) }}"
                class="btn btn-primary btn-rounded btn-scale-press px-5">Nouveau ticket</a>
        </div>
        @endif

    </main>
@endsection
