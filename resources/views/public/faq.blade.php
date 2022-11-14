@extends('public.template.base')

@section('banner-title', 'FAQ')
@section('content')
    <main class="faq">

        <div class="container">
            <div class="container d-flex justify-content-center p-4 my-4">
                <h2>Foire aux questions</h2>
            </div>

            <?php
            ?>

            <div class="accordion" id="accordionExample">
                <?php $i = 0; ?>
                @foreach ($faqs as $faq)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading <?php echo $i; ?>">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $i; ?>" aria-controls="collapse<?php echo $i; ?>">
                                <?php echo $faq->question; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $i; ?>" class="accordion-collapse collapse"
                            aria-labelledby="heading<?php echo $i; ?>" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <?php echo $faq->answer; ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                @endforeach
            </div>


            <hr class="w-25 mt-5 mb-3 m-auto">

            <div class="container">

                <h2 class="d-flex justify-content-center p-4">Notre adresse</h2>

                <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                    <iframe
                        src="https://maps.google.com/maps?q=475 Rue du Cégep, Sherbrooke&t=&z=13&ie=UTF8&iwloc=&output=embed"
                        frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>

            </div>

            <hr class="w-25 my-5 m-auto">
            <div class="container">
                <h2 class="d-flex justify-content-center pb-4">Nous Joindre</h2>
                <h4 class="d-flex justify-content-center">Téléphone</h4>
                <div class="d-flex justify-content-center p-1">
                    <p>819-843-8321</p>
                </div>
                <?php
                if(Auth::user()){
                    if (!(Auth::user()->role->role == "Admin_1" || Auth::user()->role->role == "Admin_2" || Auth::user()->role->role == "Admin_3")){?>
                <div class="d-flex justify-content-center p-4 mb-5">
                    <a href="{{ route('user.tickets.create') }}"
                        class="btn btn-primary btn-rounded btn-scale-press px-5">Envoyer un Ticket</a>
                </div>
                <?php }} else {
                    ?>
                    <div class="d-flex justify-content-center p-4 mb-5">
                        <a href="{{ route('user.tickets.create') }}"
                            class="btn btn-primary btn-rounded btn-scale-press px-5">Envoyer un Ticket</a>
                    </div>
                <div class="my-5"></div>
                <?php
                }?>

            </div>
        </div>
    </main>

@endsection
