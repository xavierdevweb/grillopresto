{{-- NEED FOR STRIPE --}}
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



@csrf


<h1 id="h2Paiement" class="text-start fs-1 my-3 fw-normal">Paiement
    <img src="{{ asset('image/mastercard.svg') }}" alt="" class="w-32px">
    <img src="{{ asset('image/visa.svg') }}" alt="" class="w-32px">
    <img src="{{ asset('image/amex.svg') }}" alt="" class="w-32px">
    <img src="{{ asset('image/discover.svg') }}" alt="" class="w-32px">
</h1>


<div class="row mb-5">

    <div class="col-md-6 col-md-offset w-100">
        @isset($cc[0])
            <select name="ccUser" id="ccUser" class="form-select btn-rounded ps-3 my-3">
                @for ($i = 0; $i < count($cc); $i++)
                    @if ($i == 0)
                        <option selected value="Choose a card">Chosissez une carte</option>
                    @endif
                    <option value="{{ $cc[$i]->card_number }}"> {{ $cc[$i]->card_number }}</option>
                @endfor
            </select>
        @endisset
        <div class="panel panel-default credit-card-box ">
            <div class="panel-body">
                @if (Session::has('success'))
                    <div class="alert alert-success text-center">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                        <p>{{ Session::get('success') }}</p>
                    </div>
                @endif

                <div class='form-row row'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Nom sur la carte</label>
                        <input class='form-control @error('name') is-invalid @enderror' name="name" size='4'
                            type='text' placeholder='John Doe' id="clientCardName">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class='form-row row mb-2'>
                    <div class='col-xs-12 form-group required'>
                        <label class='control-label'>Numéro de carte</label>
                        <input autocomplete='on' name="card_number"
                            class='form-control card-number @error('card_number') is-invalid @enderror' size='20'
                            placeholder='0000-0000-0000-0000' id="clientCardNumber" type='text'>
                        @error('card_number')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <small class="text-secondary small_text_custom">Format: 0000-0000-0000-0000</small>
                </div>
                <div class='form-row row'>

                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Exp - Mois</label>
                        <input name="month"
                            class='form-control card-expiry-month  @error('month') is-invalid @enderror'
                            placeholder='MM' size='2' id="clientCardMonth" type='text'>
                        @error('month')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                        <label class='control-label'>Exp - Année</label>
                        <input name="year" id="clientCardYear"
                            class='form-control card-expiry-year  @error('year') is-invalid @enderror'
                            placeholder='YYYY' size='4' type='text'>
                        @error('year')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                        <label class='control-label'>CVC</label>
                        <input autocomplete='on' class='form-control card-cvc  @error('cvc') is-invalid @enderror'
                            placeholder='ex. 311' id="clientCardCVC" name="cvc" size='4' type='text'>
                        @error('cvc')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                @if (Auth::check())
                    <input type="hidden" name="loggedUserId" value="{{ Auth::user()->id }}">
                @endif
                <?php
                    if (!(Auth::check()) || ((Auth::check()) && !(Auth::user()->role->role == "Admin_1" || Auth::user()->role->role == "Admin_2" || Auth::user()->role->role == "Admin_3"))){?>
                <div class="row mt-5">
                    <div class="col-xs-12 d-flex">
                        <button
                            class="btn btn-primary btn-lg btn-block btn-rounded px-5 btn-scale-press m-auto payButton"
                            type="submit">Commander</button>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>
</div>



{{-- NEED FOR STRIPE --}}
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script>
    $(function() {
        const h2pay = document.getElementById('h2Paiement');
        const h2InvalidCardInfo = document.getElementById('h2InvalidCard');

        var $form = $(".require-validation");
        $('form.require-validation').bind('submit', function(e) {
            const h2pay = document.getElementById('h1Paiement');

            var $form = $(".require-validation"),
                inputSelector = ['input[type=email]', 'input[type=password]',
                    'input[type=text]', 'input[type=file]',
                    'textarea'
                ].join(', '),
                $inputs = $form.find('.required').find(inputSelector),
                $errorMessage = $form.find('div.error'),
                valid = true;
            $errorMessage.addClass('');
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
                var $input = $(el);
                if ($input.val() === '') {
                    h2pay.remove();
                    $input.parent().addClass('has-error');
                    $errorMessage.removeClass('hide');
                    e.preventDefault();
                }
            });
            if (!$form.data('cc-on-file')) {
                e.preventDefault();

                Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                Stripe.createToken({
                    number: $('.card-number').val(),
                    cvc: $('.card-cvc').val(),
                    exp_month: $('.card-expiry-month').val(),
                    exp_year: $('.card-expiry-year').val()
                }, stripeResponseHandler);
            }
        });

        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message)

                if (h2pay.nextElementSibling.tagName !== "P") {
                    h2pay.insertAdjacentHTML('afterend',
                        "<p id='h2InvalidCard' class='text-danger fs-5 fw-bold'>Les informations de la carte sont invalides, veuillez réessayer</p>"
                    )
                }
            } else {
                /* token contains id, last4, and card type */
                var token = response['id'];
                $form.find('input[type=text]').empty();
                $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                $form.get(0).submit();
            }
        }
    });
</script>
