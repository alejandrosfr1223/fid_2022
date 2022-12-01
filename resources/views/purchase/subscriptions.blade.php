@extends('/layouts/mainlayout')

@section('content')

    @if (Route::has('login'))
        @auth

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/addons/cleave-phone.in.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput-jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <script>

        document.addEventListener('DOMContentLoaded', () => {

            $("#telephone").intlTelInput({
                preferredCountries: ["ve","es","co"],
                separateDialCode:true,
                formatOnDisplay:true,
                autoPlaceholder:"polite",
            });


            new Cleave('#ccn', {
                creditCard: true
            });

        });

    </script>

    <style>

        .inputs{
            min-width: 300px;
        }
        #telephone{
            padding-left: 78px !important;
        }
        .type{
            z-index: 100;
        }
        .iti{
            margin-bottom: 15px !important;
        }
        .spacedown{
            margin-bottom: 15px !important;
        }
    </style>

    <div style="position: relative;">
        <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl2 smallscreen">
        <div>
            <center>
                <h2 style="padding-top:20px; color:#12313a">FID</h2>
                <img class="first_img" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
            </center>
        </div>
        <form action="" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
            @csrf
            <div id='departments_cont' style="justify-content:center">
                <div class="col-sm-12 col-md-7 mb-0">
                    <center>
                        <h2 style="padding:10px 0px; color:#12313a">Datos de Pago</h2>
                    </center>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Tarjeta de Débito/Crédito</label>
                                <input
                                    autocomplete='off' id="ccn" class='form-control card-number'
                                    type='tel'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group required'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='***' maxlength="4" 
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required'>
                                <label class='control-label'>Mes de Expiración</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required'>
                                <label class='control-label'>Año de Expiración</label> <input
                                    class='form-control card-expiry-year' placeholder='YY' size='2'
                                    type='text'>
                            </div>
                        </div>
    
                </div>
                <div class="col-sm-12 col-md-5 mb-0 card" style="margin: 0px 20px; padding: 15px;">
                    <center>

                    <h2 style="padding:10px 0px; color:#12313a">Información de la compra</h2>

                    </center> 

                    @if ($suscripcion["id_proyectsub"]==0)
                    <img class="first_img recolorimg" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                    <h4 style="padding:10px 0px; color:#12313a">Suscripción: <b>FID</b></h4>
                    @endif

                    @if ($suscripcion["id_proyectsub"]==1)
                    <img class="first_img changecolorpngs" src="{{ asset('/img/home/Divinapastora.png') }}">
                    <h4 style="padding:10px 0px; color:#12313a">Suscripción: <b>Proyecto Divina Pastora</b></h4>
                    @endif

                    @if ($suscripcion["id_proyectsub"]==2)
                    <img class="first_img changecolorpngs" src="{{ asset('/img/juandelrincon/jdr.png') }}">
                    <h4 style="padding:10px 0px; color:#12313a">Suscripción: <b>Proyecto Juan del Rincón</b></h4>
                    @endif

                    <h4 style="padding:10px 0px; color:#12313a">Nivel: <b>{{$suscripcion["levelsub"]}}</b></h4>

                    <h4 style="padding:10px 0px; color:#12313a">Costo: <b>{{$suscripcion["price"]}}</b></h4>  

                    <input type="hidden" id="idproducto" name="idproducto" value="{{$suscripcion['id']}}">

                    <center>
                        <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar pago</button> <br>
                    </center> 
                    
                    <p style="font-size:12px;"><br>Al hacer click en realizar pago, usted está aceptando nuestros <a href="#">Terminos y Condiciones de Compra</a>.</p>
                </div>
            </div>
        </form>
    </div>

<script type="text/javascript" src="//js.stripe.com/v2/"></script>
    
<script type="text/javascript">
  
    $(function() {
      
        /*------------------------------------------
        --------------------------------------------
        Stripe Payment Code
        --------------------------------------------
        --------------------------------------------*/
        
        var $form = $(".require-validation");
         
        $('form.require-validation').bind('submit', function(e) {
            var $form = $(".require-validation"),
            inputSelector = ['input[type=email]', 'input[type=password]',
                             'input[type=text]', 'input[type=file]',
                             'textarea'].join(', '),
            $inputs = $form.find('.required').find(inputSelector),
            $errorMessage = $form.find('div.error'),
            valid = true;
            $errorMessage.addClass('hide');
        
            $('.has-error').removeClass('has-error');
            $inputs.each(function(i, el) {
              var $input = $(el);
              if ($input.val() === '') {
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
          
        /*------------------------------------------
        --------------------------------------------
        Stripe Response Handler
        --------------------------------------------
        --------------------------------------------*/
        function stripeResponseHandler(status, response) {
            if (response.error) {
                $('.error')
                    .removeClass('hide')
                    .find('.alert')
                    .text(response.error.message);
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


        @else
            @php
                header("Location: /fid/login");
                exit();
            @endphp
        @endauth
    @endif

@endsection