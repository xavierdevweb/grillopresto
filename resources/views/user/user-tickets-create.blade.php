@extends('public.template.base')
@section('banner-title', 'Support - Créé un nouveau ticket')
@section('title', 'New ticket')
@section('content')

    @if (Auth::check())
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

            @case('Client')
                @include('user.template.sub-navbar')
            @break
        @endswitch
    @endif
    <main class="m-auto">
        @if (Auth::check())
            <?php $user = Auth::user()->id;
            $userInfo = (object) App\Models\User::where('id', (int) $user)->get();
            ?>
        @else
            <?php $user = ''; ?>
        @endif


        <div class="container mw-600px">
            @if (Session::has('SuccessTicket'))
                <div class="alert alert-success mt-5 d-flex justify-content-between align-items-center"
                    id="divAlertSucccessInfoChanged">
                    {{ Session::get('SuccessTicket') }}
                    <button type="button" class="close btn btn-link text-decoration-none"
                        id="btnAlertSucccessInfoChanged"><span class="text-success">X</span></button>
                </div>
            @endif
            <form action="{{ route('user.tickets.store', $user) }}" method="POST">
                @csrf
                <h1 class="display-6 text-center my-sm-4 my-md-5">Nouveau ticket de support</h1>

                <div>
                    <label for="selectTicketType" class="form-label fs-5">Choisir une raison</label>
                    <select class="form-select mw-600px form-control  @error('ticket_type_id') is-invalid @enderror"
                        aria-label="Default select example" name="ticket_type_id" id="selectTicketType">
                        <option selected>Raison</option>
                        @foreach ($ticketTypes as $type)
                            <option @if (@old('ticket_type_id') == (int) $type->id) selected @endif value="{{ (int) $type->id }}">
                                {{ $type->type }}</option>
                        @endforeach
                    </select>
                    @error('ticket_type_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="my-4">
                    <label for="order_number" class="form-label">Numéro de commande s'il y a lieu</label>
                    <input type="text" name="order_number" id="order_number"
                        @if (isset($orderNumber[0])) value="{{ $orderNumber[0]->order_number }}" @else value="{{ old('order_number') }}" @endif
                        class="form-control @error('order_number') is-invalid @enderror" placeholder="# de commande">
                    @error('order_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="emailTicket" class="form-label">Courriel de contact</label>
                    <input type="email" name="email" id="emailTicket"
                        @if (isset($userInfo[0]->email) && $userInfo[0]->email != null) value="{{ (string) $userInfo[0]->email }}" @else value="{{ old('email') }}" @endif
                        class="form-control @error('email') is-invalid @enderror" placeholder="Courriel">
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div>
                    <label for="textareaNewTicket">Explication du problème</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" maxlength="400"
                        placeholder="Expliquer nous le problème, avec un maximum d'informations." id="textareaNewTicket">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                    <small class="small_text_custom">Votre description peut seulement contenir des: . , - @ # $ \' des chiffres et des lettres et un longueur minimum de 50 caracteres et maximum 400</small>
                </div>
                <?php
                    if (Auth::check() && Auth::user()->role->role == "Client") {?>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-rounded btn-scale-press w-50 my-5">Envoyer</button>
                </div><?php }elseif(!(Auth::check())){?>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success btn-rounded btn-scale-press w-50 my-5">Envoyer</button>
                </div>
                <?php }?>
                <div class="my-5"></div>
            </form>
        </div>
    </main>
@endsection
