@extends('/layouts/mainlayout')

@section('content')

    @laravelTelInputStyles

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
            
            $('#nameoncard').keyup(function(){
                this.value = this.value.toUpperCase();
            });

            $("#phone").intlTelInput({
                preferredCountries: ["ve","es","co","mx"],
                separateDialCode:true,
                formatOnDisplay:true,
                autoPlaceholder:"polite"
            });

            $("#phone").on("keyup", function(){
                $("#cellphone").val($(".iti__selected-dial-code").html() + $("#phone").val());
            });

            new Cleave('#ccn', {
                creditCard: true
            });


            new Cleave('.card-expiry-year', {
               date: true,
               datePattern: ['y']
            });

            new Cleave('.card-expiry-month', {
               date: true,
               datePattern: ['m']
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

        #payment-cont{
            padding: 30px 0 30px 0;
            width: 70%;
            margin: auto;
            display: flex;
            position: relative;
        }

        @media screen and (max-width: 990px) {
            #payment-cont {
                flex-direction: column;
                width: 90%;
            }
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
            <div id='payment-cont' style="justify-content:center">
                <div class="col-sm-12 col-md-7 mb-0">
                    <center>
                        <h2 style="padding:10px 0px; color:#12313a">Datos de Facturación</h2>
                    </center>
                        <div class=' form-row row'>
                            <div class='col-xs-12 col-md-6 form-group required mt-3'>
                                <label class='control-label'>Nombre</label>
                                <input
                                    autocomplete='off' id="name" name="name" class='form-control'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-6 form-group required mt-3'>
                                <label class='control-label'>Apellido</label>
                                <input
                                    autocomplete='off' id="lastname" name="lastname" class='form-control'
                                    type='text'>
                            </div>
                        </div>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>País de Residencia</label>
                                <select class="form-control" name="country" id="country" required>
                                    <option value="" disabled selected></option>
                                    <option value="AF" {{old('country') === "AF" ? 'selected' : ""}}>Afganistán</option>
                                    <option value="AL" {{old('country') === "AL" ? 'selected' : ""}}>Albania</option>
                                    <option value="DE" {{old('country') === "DE" ? 'selected' : ""}}>Alemania</option>
                                    <option value="AD" {{old('country') === "AD" ? 'selected' : ""}}>Andorra</option>
                                    <option value="AO" {{old('country') === "AO" ? 'selected' : ""}}>Angola</option>
                                    <option value="AI" {{old('country') === "AI" ? 'selected' : ""}}>Anguila</option>
                                    <option value="AQ" {{old('country') === "AQ" ? 'selected' : ""}}>Antártida</option>
                                    <option value="AG" {{old('country') === "AG" ? 'selected' : ""}}>Antigua y Barbuda</option>
                                    <option value="SA" {{old('country') === "SA" ? 'selected' : ""}}>Arabia Saudita</option>
                                    <option value="DZ" {{old('country') === "DZ" ? 'selected' : ""}}>Argelia</option>
                                    <option value="AR" {{old('country') === "AR" ? 'selected' : ""}}>Argentina</option>
                                    <option value="AM" {{old('country') === "AM" ? 'selected' : ""}}>Armenia</option>
                                    <option value="AW" {{old('country') === "AW" ? 'selected' : ""}}>Aruba</option>
                                    <option value="AU" {{old('country') === "AU" ? 'selected' : ""}}>Australia</option>
                                    <option value="AT" {{old('country') === "AT" ? 'selected' : ""}}>Austria</option>
                                    <option value="AZ" {{old('country') === "AZ" ? 'selected' : ""}}>Azerbaiyán</option>
                                    <option value="BE" {{old('country') === "BE" ? 'selected' : ""}}>Bélgica</option>
                                    <option value="BS" {{old('country') === "BS" ? 'selected' : ""}}>Bahamas</option>
                                    <option value="BH" {{old('country') === "BH" ? 'selected' : ""}}>Bahrein</option>
                                    <option value="BD" {{old('country') === "BD" ? 'selected' : ""}}>Bangladesh</option>
                                    <option value="BB" {{old('country') === "BB" ? 'selected' : ""}}>Barbados</option>
                                    <option value="BZ" {{old('country') === "BZ" ? 'selected' : ""}}>Belice</option>
                                    <option value="BJ" {{old('country') === "BJ" ? 'selected' : ""}}>Benín</option>
                                    <option value="BT" {{old('country') === "BT" ? 'selected' : ""}}>Bhután</option>
                                    <option value="BY" {{old('country') === "BY" ? 'selected' : ""}}>Bielorrusia</option>
                                    <option value="MM" {{old('country') === "MM" ? 'selected' : ""}}>Birmania</option>
                                    <option value="BO" {{old('country') === "BO" ? 'selected' : ""}}>Bolivia</option>
                                    <option value="BA" {{old('country') === "BA" ? 'selected' : ""}}>Bosnia y Herzegovina</option>
                                    <option value="BW" {{old('country') === "BW" ? 'selected' : ""}}>Botsuana</option>
                                    <option value="BR" {{old('country') === "BR" ? 'selected' : ""}}>Brasil</option>
                                    <option value="BN" {{old('country') === "BN" ? 'selected' : ""}}>Brunéi</option>
                                    <option value="BG" {{old('country') === "BG" ? 'selected' : ""}}>Bulgaria</option>
                                    <option value="BF" {{old('country') === "BF" ? 'selected' : ""}}>Burkina Faso</option>
                                    <option value="BI" {{old('country') === "BI" ? 'selected' : ""}}>Burundi</option>
                                    <option value="CV" {{old('country') === "CV" ? 'selected' : ""}}>Cabo Verde</option>
                                    <option value="KH" {{old('country') === "KH" ? 'selected' : ""}}>Camboya</option>
                                    <option value="CM" {{old('country') === "CM" ? 'selected' : ""}}>Camerún</option>
                                    <option value="CA" {{old('country') === "CA" ? 'selected' : ""}}>Canadá</option>
                                    <option value="TD" {{old('country') === "TD" ? 'selected' : ""}}>Chad</option>
                                    <option value="CL" {{old('country') === "CL" ? 'selected' : ""}}>Chile</option>
                                    <option value="CN" {{old('country') === "CN" ? 'selected' : ""}}>China</option>
                                    <option value="CY" {{old('country') === "CY" ? 'selected' : ""}}>Chipre</option>
                                    <option value="VA" {{old('country') === "VA" ? 'selected' : ""}}>Ciudad del Vaticano</option>
                                    <option value="CO" {{old('country') === "CO" ? 'selected' : ""}}>Colombia</option>
                                    <option value="KM" {{old('country') === "KM" ? 'selected' : ""}}>Comoras</option>
                                    <option value="CG" {{old('country') === "CG" ? 'selected' : ""}}>República del Congo</option>
                                    <option value="CD" {{old('country') === "CD" ? 'selected' : ""}}>República Democrática del Congo</option>
                                    <option value="KP" {{old('country') === "KP" ? 'selected' : ""}}>Corea del Norte</option>
                                    <option value="KR" {{old('country') === "KR" ? 'selected' : ""}}>Corea del Sur</option>
                                    <option value="CI" {{old('country') === "CI" ? 'selected' : ""}}>Costa de Marfil</option>
                                    <option value="CR" {{old('country') === "CR" ? 'selected' : ""}}>Costa Rica</option>
                                    <option value="HR" {{old('country') === "HR" ? 'selected' : ""}}>Croacia</option>
                                    <option value="CU" {{old('country') === "CU" ? 'selected' : ""}}>Cuba</option>
                                    <option value="CW" {{old('country') === "CW" ? 'selected' : ""}}>Curazao</option>
                                    <option value="DK" {{old('country') === "DK" ? 'selected' : ""}}>Dinamarca</option>
                                    <option value="DM" {{old('country') === "DM" ? 'selected' : ""}}>Dominica</option>
                                    <option value="EC" {{old('country') === "EC" ? 'selected' : ""}}>Ecuador</option>
                                    <option value="EG" {{old('country') === "EG" ? 'selected' : ""}}>Egipto</option>
                                    <option value="SV" {{old('country') === "SV" ? 'selected' : ""}}>El Salvador</option>
                                    <option value="AE" {{old('country') === "AE" ? 'selected' : ""}}>Emiratos Árabes Unidos</option>
                                    <option value="ER" {{old('country') === "ER" ? 'selected' : ""}}>Eritrea</option>
                                    <option value="SK" {{old('country') === "SK" ? 'selected' : ""}}>Eslovaquia</option>
                                    <option value="SI" {{old('country') === "SI" ? 'selected' : ""}}>Eslovenia</option>
                                    <option value="ES" {{old('country') === "ES" ? 'selected' : ""}}>España</option>
                                    <option value="US" {{old('country') === "US" ? 'selected' : ""}}>Estados Unidos de América</option>
                                    <option value="EE" {{old('country') === "EE" ? 'selected' : ""}}>Estonia</option>
                                    <option value="ET" {{old('country') === "ET" ? 'selected' : ""}}>Etiopía</option>
                                    <option value="PH" {{old('country') === "PH" ? 'selected' : ""}}>Filipinas</option>
                                    <option value="FI" {{old('country') === "FI" ? 'selected' : ""}}>Finlandia</option>
                                    <option value="FJ" {{old('country') === "FJ" ? 'selected' : ""}}>Fiyi</option>
                                    <option value="FR" {{old('country') === "FR" ? 'selected' : ""}}>Francia</option>
                                    <option value="GA" {{old('country') === "GA" ? 'selected' : ""}}>Gabón</option>
                                    <option value="GM" {{old('country') === "GM" ? 'selected' : ""}}>Gambia</option>
                                    <option value="GE" {{old('country') === "GE" ? 'selected' : ""}}>Georgia</option>
                                    <option value="GH" {{old('country') === "GH" ? 'selected' : ""}}>Ghana</option>
                                    <option value="GI" {{old('country') === "GI" ? 'selected' : ""}}>Gibraltar</option>
                                    <option value="GD" {{old('country') === "GD" ? 'selected' : ""}}>Granada</option>
                                    <option value="GR" {{old('country') === "GR" ? 'selected' : ""}}>Grecia</option>
                                    <option value="GL" {{old('country') === "GL" ? 'selected' : ""}}>Groenlandia</option>
                                    <option value="GP" {{old('country') === "GP" ? 'selected' : ""}}>Guadalupe</option>
                                    <option value="GU" {{old('country') === "GU" ? 'selected' : ""}}>Guam</option>
                                    <option value="GT" {{old('country') === "GT" ? 'selected' : ""}}>Guatemala</option>
                                    <option value="GF" {{old('country') === "GF" ? 'selected' : ""}}>Guayana Francesa</option>
                                    <option value="GG" {{old('country') === "GG" ? 'selected' : ""}}>Guernsey</option>
                                    <option value="GN" {{old('country') === "GN" ? 'selected' : ""}}>Guinea</option>
                                    <option value="GQ" {{old('country') === "GQ" ? 'selected' : ""}}>Guinea Ecuatorial</option>
                                    <option value="GW" {{old('country') === "GW" ? 'selected' : ""}}>Guinea-Bissau</option>
                                    <option value="GY" {{old('country') === "GY" ? 'selected' : ""}}>Guyana</option>
                                    <option value="HT" {{old('country') === "HT" ? 'selected' : ""}}>Haití</option>
                                    <option value="HN" {{old('country') === "HN" ? 'selected' : ""}}>Honduras</option>
                                    <option value="HK" {{old('country') === "HK" ? 'selected' : ""}}>Hong kong</option>
                                    <option value="HU" {{old('country') === "HU" ? 'selected' : ""}}>Hungría</option>
                                    <option value="IN" {{old('country') === "IN" ? 'selected' : ""}}>India</option>
                                    <option value="ID" {{old('country') === "ID" ? 'selected' : ""}}>Indonesia</option>
                                    <option value="IR" {{old('country') === "IR" ? 'selected' : ""}}>Irán</option>
                                    <option value="IQ" {{old('country') === "IQ" ? 'selected' : ""}}>Irak</option>
                                    <option value="IE" {{old('country') === "IE" ? 'selected' : ""}}>Irlanda</option>
                                    <option value="BV" {{old('country') === "BV" ? 'selected' : ""}}>Isla Bouvet</option>
                                    <option value="IM" {{old('country') === "IM" ? 'selected' : ""}}>Isla de Man</option>
                                    <option value="CX" {{old('country') === "CX" ? 'selected' : ""}}>Isla de Navidad</option>
                                    <option value="NF" {{old('country') === "NF" ? 'selected' : ""}}>Isla Norfolk</option>
                                    <option value="IS" {{old('country') === "IS" ? 'selected' : ""}}>Islandia</option>
                                    <option value="BM" {{old('country') === "BM" ? 'selected' : ""}}>Islas Bermudas</option>
                                    <option value="KY" {{old('country') === "KY" ? 'selected' : ""}}>Islas Caimán</option>
                                    <option value="CC" {{old('country') === "CC" ? 'selected' : ""}}>Islas Cocos (Keeling)</option>
                                    <option value="CK" {{old('country') === "CK" ? 'selected' : ""}}>Islas Cook</option>
                                    <option value="AX" {{old('country') === "AX" ? 'selected' : ""}}>Islas de Åland</option>
                                    <option value="FO" {{old('country') === "FO" ? 'selected' : ""}}>Islas Feroe</option>
                                    <option value="GS" {{old('country') === "GS" ? 'selected' : ""}}>Islas Georgias del Sur y Sandwich del Sur</option>
                                    <option value="HM" {{old('country') === "HM" ? 'selected' : ""}}>Islas Heard y McDonald</option>
                                    <option value="MV" {{old('country') === "MV" ? 'selected' : ""}}>Islas Maldivas</option>
                                    <option value="FK" {{old('country') === "FK" ? 'selected' : ""}}>Islas Malvinas</option>
                                    <option value="MP" {{old('country') === "MP" ? 'selected' : ""}}>Islas Marianas del Norte</option>
                                    <option value="MH" {{old('country') === "MH" ? 'selected' : ""}}>Islas Marshall</option>
                                    <option value="PN" {{old('country') === "PN" ? 'selected' : ""}}>Islas Pitcairn</option>
                                    <option value="SB" {{old('country') === "SB" ? 'selected' : ""}}>Islas Salomón</option>
                                    <option value="TC" {{old('country') === "TC" ? 'selected' : ""}}>Islas Turcas y Caicos</option>
                                    <option value="UM" {{old('country') === "UM" ? 'selected' : ""}}>Islas Ultramarinas Menores de Estados Unidos</option>
                                    <option value="VG" {{old('country') === "VG" ? 'selected' : ""}}>Islas Vírgenes Británicas</option>
                                    <option value="VI" {{old('country') === "VI" ? 'selected' : ""}}>Islas Vírgenes de los Estados Unidos</option>
                                    <option value="IL" {{old('country') === "IL" ? 'selected' : ""}}>Israel</option>
                                    <option value="IT" {{old('country') === "IT" ? 'selected' : ""}}>Italia</option>
                                    <option value="JM" {{old('country') === "JM" ? 'selected' : ""}}>Jamaica</option>
                                    <option value="JP" {{old('country') === "JP" ? 'selected' : ""}}>Japón</option>
                                    <option value="JE" {{old('country') === "JE" ? 'selected' : ""}}>Jersey</option>
                                    <option value="JO" {{old('country') === "JO" ? 'selected' : ""}}>Jordania</option>
                                    <option value="KZ" {{old('country') === "KZ" ? 'selected' : ""}}>Kazajistán</option>
                                    <option value="KE" {{old('country') === "KE" ? 'selected' : ""}}>Kenia</option>
                                    <option value="KG" {{old('country') === "KG" ? 'selected' : ""}}>Kirguistán</option>
                                    <option value="KI" {{old('country') === "KI" ? 'selected' : ""}}>Kiribati</option>
                                    <option value="KW" {{old('country') === "KW" ? 'selected' : ""}}>Kuwait</option>
                                    <option value="LB" {{old('country') === "LB" ? 'selected' : ""}}>Líbano</option>
                                    <option value="LA" {{old('country') === "LA" ? 'selected' : ""}}>Laos</option>
                                    <option value="LS" {{old('country') === "LS" ? 'selected' : ""}}>Lesoto</option>
                                    <option value="LV" {{old('country') === "LV" ? 'selected' : ""}}>Letonia</option>
                                    <option value="LR" {{old('country') === "LR" ? 'selected' : ""}}>Liberia</option>
                                    <option value="LY" {{old('country') === "LY" ? 'selected' : ""}}>Libia</option>
                                    <option value="LI" {{old('country') === "LI" ? 'selected' : ""}}>Liechtenstein</option>
                                    <option value="LT" {{old('country') === "LT" ? 'selected' : ""}}>Lituania</option>
                                    <option value="LU" {{old('country') === "LU" ? 'selected' : ""}}>Luxemburgo</option>
                                    <option value="MX" {{old('country') === "MX" ? 'selected' : ""}}>México</option>
                                    <option value="MC" {{old('country') === "MC" ? 'selected' : ""}}>Mónaco</option>
                                    <option value="MO" {{old('country') === "MO" ? 'selected' : ""}}>Macao</option>
                                    <option value="MK" {{old('country') === "MK" ? 'selected' : ""}}>Macedônia</option>
                                    <option value="MG" {{old('country') === "MG" ? 'selected' : ""}}>Madagascar</option>
                                    <option value="MY" {{old('country') === "MY" ? 'selected' : ""}}>Malasia</option>
                                    <option value="MW" {{old('country') === "MW" ? 'selected' : ""}}>Malawi</option>
                                    <option value="ML" {{old('country') === "ML" ? 'selected' : ""}}>Mali</option>
                                    <option value="MT" {{old('country') === "MT" ? 'selected' : ""}}>Malta</option>
                                    <option value="MA" {{old('country') === "MA" ? 'selected' : ""}}>Marruecos</option>
                                    <option value="MQ" {{old('country') === "MQ" ? 'selected' : ""}}>Martinica</option>
                                    <option value="MU" {{old('country') === "MU" ? 'selected' : ""}}>Mauricio</option>
                                    <option value="MR" {{old('country') === "MR" ? 'selected' : ""}}>Mauritania</option>
                                    <option value="YT" {{old('country') === "YT" ? 'selected' : ""}}>Mayotte</option>
                                    <option value="FM" {{old('country') === "FM" ? 'selected' : ""}}>Micronesia</option>
                                    <option value="MD" {{old('country') === "MD" ? 'selected' : ""}}>Moldavia</option>
                                    <option value="MN" {{old('country') === "MN" ? 'selected' : ""}}>Mongolia</option>
                                    <option value="ME" {{old('country') === "ME" ? 'selected' : ""}}>Montenegro</option>
                                    <option value="MS" {{old('country') === "MS" ? 'selected' : ""}}>Montserrat</option>
                                    <option value="MZ" {{old('country') === "MZ" ? 'selected' : ""}}>Mozambique</option>
                                    <option value="NA" {{old('country') === "NA" ? 'selected' : ""}}>Namibia</option>
                                    <option value="NR" {{old('country') === "NR" ? 'selected' : ""}}>Nauru</option>
                                    <option value="NP" {{old('country') === "NP" ? 'selected' : ""}}>Nepal</option>
                                    <option value="NI" {{old('country') === "NI" ? 'selected' : ""}}>Nicaragua</option>
                                    <option value="NE" {{old('country') === "NE" ? 'selected' : ""}}>Niger</option>
                                    <option value="NG" {{old('country') === "NG" ? 'selected' : ""}}>Nigeria</option>
                                    <option value="NU" {{old('country') === "NU" ? 'selected' : ""}}>Niue</option>
                                    <option value="NO" {{old('country') === "NO" ? 'selected' : ""}}>Noruega</option>
                                    <option value="NC" {{old('country') === "NC" ? 'selected' : ""}}>Nueva Caledonia</option>
                                    <option value="NZ" {{old('country') === "NZ" ? 'selected' : ""}}>Nueva Zelanda</option>
                                    <option value="OM" {{old('country') === "OM" ? 'selected' : ""}}>Omán</option>
                                    <option value="NL" {{old('country') === "NL" ? 'selected' : ""}}>Países Bajos</option>
                                    <option value="PK" {{old('country') === "PK" ? 'selected' : ""}}>Pakistán</option>
                                    <option value="PW" {{old('country') === "PW" ? 'selected' : ""}}>Palau</option>
                                    <option value="PS" {{old('country') === "PS" ? 'selected' : ""}}>Palestina</option>
                                    <option value="PA" {{old('country') === "PA" ? 'selected' : ""}}>Panamá</option>
                                    <option value="PG" {{old('country') === "PG" ? 'selected' : ""}}>Papúa Nueva Guinea</option>
                                    <option value="PY" {{old('country') === "PY" ? 'selected' : ""}}>Paraguay</option>
                                    <option value="PE" {{old('country') === "PE" ? 'selected' : ""}}>Perú</option>
                                    <option value="PF" {{old('country') === "PF" ? 'selected' : ""}}>Polinesia Francesa</option>
                                    <option value="PL" {{old('country') === "PL" ? 'selected' : ""}}>Polonia</option>
                                    <option value="PT" {{old('country') === "PT" ? 'selected' : ""}}>Portugal</option>
                                    <option value="PR" {{old('country') === "PR" ? 'selected' : ""}}>Puerto Rico</option>
                                    <option value="QA" {{old('country') === "QA" ? 'selected' : ""}}>Qatar</option>
                                    <option value="GB" {{old('country') === "GB" ? 'selected' : ""}}>Reino Unido</option>
                                    <option value="CF" {{old('country') === "CF" ? 'selected' : ""}}>República Centroafricana</option>
                                    <option value="CZ" {{old('country') === "CZ" ? 'selected' : ""}}>República Checa</option>
                                    <option value="DO" {{old('country') === "DO" ? 'selected' : ""}}>República Dominicana</option>
                                    <option value="SS" {{old('country') === "SS" ? 'selected' : ""}}>República de Sudán del Sur</option>
                                    <option value="RE" {{old('country') === "RE" ? 'selected' : ""}}>Reunión</option>
                                    <option value="RW" {{old('country') === "RW" ? 'selected' : ""}}>Ruanda</option>
                                    <option value="RO" {{old('country') === "RO" ? 'selected' : ""}}>Rumanía</option>
                                    <option value="RU" {{old('country') === "RU" ? 'selected' : ""}}>Rusia</option>
                                    <option value="EH" {{old('country') === "EH" ? 'selected' : ""}}>Sahara Occidental</option>
                                    <option value="WS" {{old('country') === "WS" ? 'selected' : ""}}>Samoa</option>
                                    <option value="AS" {{old('country') === "AS" ? 'selected' : ""}}>Samoa Americana</option>
                                    <option value="BL" {{old('country') === "BL" ? 'selected' : ""}}>San Bartolomé</option>
                                    <option value="KN" {{old('country') === "KN" ? 'selected' : ""}}>San Cristóbal y Nieves</option>
                                    <option value="SM" {{old('country') === "SM" ? 'selected' : ""}}>San Marino</option>
                                    <option value="MF" {{old('country') === "MF" ? 'selected' : ""}}>San Martín (Francia)</option>
                                    <option value="PM" {{old('country') === "PM" ? 'selected' : ""}}>San Pedro y Miquelón</option>
                                    <option value="VC" {{old('country') === "VC" ? 'selected' : ""}}>San Vicente y las Granadinas</option>
                                    <option value="SH" {{old('country') === "SH" ? 'selected' : ""}}>Santa Elena</option>
                                    <option value="LC" {{old('country') === "LC" ? 'selected' : ""}}>Santa Lucía</option>
                                    <option value="ST" {{old('country') === "ST" ? 'selected' : ""}}>Santo Tomé y Príncipe</option>
                                    <option value="SN" {{old('country') === "SN" ? 'selected' : ""}}>Senegal</option>
                                    <option value="RS" {{old('country') === "RS" ? 'selected' : ""}}>Serbia</option>
                                    <option value="SC" {{old('country') === "SC" ? 'selected' : ""}}>Seychelles</option>
                                    <option value="SL" {{old('country') === "SL" ? 'selected' : ""}}>Sierra Leona</option>
                                    <option value="SG" {{old('country') === "SG" ? 'selected' : ""}}>Singapur</option>
                                    <option value="SX" {{old('country') === "SX" ? 'selected' : ""}}>Sint Maarten</option>
                                    <option value="SY" {{old('country') === "SY" ? 'selected' : ""}}>Siria</option>
                                    <option value="SO" {{old('country') === "SO" ? 'selected' : ""}}>Somalia</option>
                                    <option value="LK" {{old('country') === "LK" ? 'selected' : ""}}>Sri lanka</option>
                                    <option value="ZA" {{old('country') === "ZA" ? 'selected' : ""}}>Sudáfrica</option>
                                    <option value="SD" {{old('country') === "SD" ? 'selected' : ""}}>Sudán</option>
                                    <option value="SE" {{old('country') === "SE" ? 'selected' : ""}}>Suecia</option>
                                    <option value="CH" {{old('country') === "CH" ? 'selected' : ""}}>Suiza</option>
                                    <option value="SR" {{old('country') === "SR" ? 'selected' : ""}}>Surinám</option>
                                    <option value="SJ" {{old('country') === "SJ" ? 'selected' : ""}}>Svalbard y Jan Mayen</option>
                                    <option value="SZ" {{old('country') === "SZ" ? 'selected' : ""}}>Swazilandia</option>
                                    <option value="TJ" {{old('country') === "TJ" ? 'selected' : ""}}>Tayikistán</option>
                                    <option value="TH" {{old('country') === "TH" ? 'selected' : ""}}>Tailandia</option>
                                    <option value="TW" {{old('country') === "TW" ? 'selected' : ""}}>Taiwán</option>
                                    <option value="TZ" {{old('country') === "TZ" ? 'selected' : ""}}>Tanzania</option>
                                    <option value="IO" {{old('country') === "IO" ? 'selected' : ""}}>Territorio Británico del Océano Índico</option>
                                    <option value="TF" {{old('country') === "TF" ? 'selected' : ""}}>Territorios Australes y Antárticas Franceses</option>
                                    <option value="TL" {{old('country') === "TL" ? 'selected' : ""}}>Timor Oriental</option>
                                    <option value="TG" {{old('country') === "TG" ? 'selected' : ""}}>Togo</option>
                                    <option value="TK" {{old('country') === "TK" ? 'selected' : ""}}>Tokelau</option>
                                    <option value="TO" {{old('country') === "TO" ? 'selected' : ""}}>Tonga</option>
                                    <option value="TT" {{old('country') === "TT" ? 'selected' : ""}}>Trinidad y Tobago</option>
                                    <option value="TN" {{old('country') === "TN" ? 'selected' : ""}}>Tunez</option>
                                    <option value="TM" {{old('country') === "TM" ? 'selected' : ""}}>Turkmenistán</option>
                                    <option value="TR" {{old('country') === "TR" ? 'selected' : ""}}>Turquía</option>
                                    <option value="TV" {{old('country') === "TV" ? 'selected' : ""}}>Tuvalu</option>
                                    <option value="UA" {{old('country') === "UA" ? 'selected' : ""}}>Ucrania</option>
                                    <option value="UG" {{old('country') === "UG" ? 'selected' : ""}}>Uganda</option>
                                    <option value="UY" {{old('country') === "UY" ? 'selected' : ""}}>Uruguay</option>
                                    <option value="UZ" {{old('country') === "UZ" ? 'selected' : ""}}>Uzbekistán</option>
                                    <option value="VU" {{old('country') === "VU" ? 'selected' : ""}}>Vanuatu</option>
                                    <option value="VE" {{old('country') === "VE" ? 'selected' : ""}}>Venezuela</option>
                                    <option value="VN" {{old('country') === "VN" ? 'selected' : ""}}>Vietnam</option>
                                    <option value="WF" {{old('country') === "WF" ? 'selected' : ""}}>Wallis y Futuna</option>
                                    <option value="YE" {{old('country') === "YE" ? 'selected' : ""}}>Yemen</option>
                                    <option value="DJ" {{old('country') === "DJ" ? 'selected' : ""}}>Yibuti</option>
                                    <option value="ZM" {{old('country') === "ZM" ? 'selected' : ""}}>Zambia</option>
                                    <option value="ZW" {{old('country') === "ZW" ? 'selected' : ""}}>Zimbabue</option>
                                </select>
                            </div>
                        </div>


                        <div class=' form-row row'>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>Estado</label>
                                <input
                                    autocomplete='off' id="state" name="state" class='form-control'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>Ciudad</label>
                                <input
                                    autocomplete='off' id="city" name="city" class='form-control'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>Código Postal</label>
                                <input
                                    autocomplete='off' id="postcode" name="postcode" class='form-control'
                                    type='tel'>
                            </div>
                        </div>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Dirección (Linea 1)</label>
                                <input
                                    autocomplete='off' id="dir1" name="dir1" class='form-control'
                                    type='text'>
                            </div>
                        </div>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Dirección (Linea 2)</label>
                                <input
                                    autocomplete='off' id="dir2" name="dir2" class='form-control'
                                    type='text'>
                            </div>
                        </div>

                        <style>
                            .iti{margin: 0 !important;}
                        </style>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Número de Teléfono</label>
                                <input type="tel"
                                  id="phone"
                                  class="form-control"
                                />
                                <input type="hidden"
                                  id="cellphone"
                                  name="cellphone"
                                  class="form-control"
                                />
                            </div>
                        </div>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Correo</label>
                                <input
                                    autocomplete='off' id="email" name="email" class='form-control'
                                    type='email'>
                            </div>
                        </div>

                    <center>
                        <h2 style="padding:10px 0px; color:#12313a"><i class="mt-4 fas fa-credit-card"></i> Datos de Pago <i class="fas fa-credit-card"></i></h2>
                    </center>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nombre en la Tarjeta</label>
                                <input
                                    autocomplete='off' name="nameoncard" id="nameoncard" class='form-control'
                                    type='text'>
                            </div>
                        </div>

                        <div class='mt-3 form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label type'>Número de Tarjeta de Débito/Crédito</label>
                                <input
                                    autocomplete='off' id="ccn" class='form-control card-number'
                                    type='tel'>
                            </div>
                        </div>
    
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>CVC</label> <input autocomplete='off'
                                    class='form-control card-cvc' placeholder='***' maxlength="4" 
                                    type='password'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>Mes de Expiración</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group required mt-3'>
                                <label class='control-label'>Año de Expiración</label> <input
                                    class='form-control card-expiry-year' placeholder='YY' size='2'
                                    type='text'>
                            </div>
                        </div>
    
                </div>
                <div class="col-sm-12 col-md-5 mb-0 " style="margin: 0px 20px; padding: 15px;">
                    <div class="card" style="margin: 0px 20px; padding: 15px;">
                        <center>

                        <h2 style="padding:10px 0px; color:#12313a">Información de la compra</h2>

                        </center> 

                        @if ($servicio["id"]==0)
                        <img class="first_img" src="{{ asset('/img/investigacion/ARBOL GENEALOGICO2.png') }}">
                        @endif

                        @if ($servicio["id"]==1)
                        <img class="first_img" src="{{ asset('/img/investigacion/LIBRO DE FAMILIA.png') }}">
                        @endif

                        @if ($servicio["id"]==2)
                        <img class="first_img" src="{{ asset('/img/lupa.png') }}">
                        @endif

                        <h4 style="padding:10px 0px; color:#12313a">Servicio: <b>{{$servicio["nombre"]}}</b></h4>

                        <h4 style="padding:10px 0px 2px 0px; color:#12313a">Pago Inicial: <b>{{$servicio["price"]}}$</b></h4> 

                        <p style="font-size:12px;">Este pago solo es una inicial por contratación de servicio. Tras evaluar su caso con uno de nuestros expertos, procederemos a enviar un presupuesto final.</p>
                        <br><br>
                        <input type="hidden" id="idproducto" name="idproducto" value="{{$servicio['id']}}">

                        <center>
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Realizar pago</button> <br>
                        </center> 
                        
                        <p style="font-size:12px;"><br>Al hacer click en realizar pago, usted está aceptando nuestros <a href="#">Terminos y Condiciones de Compra</a>.</p>
                    </div>
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
                var error = "";

                switch(response.error.code){
                    case "authentication_required":
                        error = "La tarjeta fue rechazada porque la transacción requiere autenticación.";
                        break;
                    case "approve_with_id":
                        error = "No se puede autorizar el pago.";
                        break;
                    case "call_issuer":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "card_not_supported":
                        error = "La tarjeta no admite este tipo de compra.";
                        break;
                    case "card_velocity_exceeded":
                        error = "El cliente ha superado el saldo o límite de crédito disponible en su tarjeta.";
                        break;
                    case "currency_not_supported":
                        error = "La tarjeta no admite la moneda especificada.";
                        break;
                    case "do_not_honor":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "do_not_try_again":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "duplicate_transaction":
                        error = "Recientemente se envió una transacción con la misma cantidad e información de la tarjeta de crédito.";
                        break;
                    case "expired_card":
                        error = "La tarjeta ha caducado.";
                        break;
                    case "fraudulent":
                        error = "El pago fue rechazado porque Stripe sospecha que es fraudulento.";
                        break;
                    case "generic_decline":
                        error = "La tarjeta fue rechazada por un motivo desconocido o posiblemente provocada por una regla de pago bloqueada .";
                        break;
                    case "incorrect_number":
                        error = "El número de tarjeta es incorrecto.";
                        break;
                    case "incorrect_cvc":
                        error = "El número CVC es incorrecto.";
                        break;
                    case "incorrect_pin":
                        error = "El PIN ingresado es incorrecto. Este código de rechazo solo se aplica a los pagos realizados con un lector de tarjetas.";
                        break;
                    case "incorrect_zip":
                        error = "El código postal es incorrecto.";
                        break;
                    case "insufficient_funds":
                        error = "La tarjeta no tiene fondos suficientes para completar la compra.";
                        break;
                    case "invalid_account":
                        error = "La tarjeta o la cuenta a la que está conectada la tarjeta no es válida.";
                        break;
                    case "invalid_amount":
                        error = "El monto del pago no es válido o excede el monto permitido.";
                        break;
                    case "invalid_cvc":
                        error = "El número CVC es incorrecto.";
                        break;
                    case "invalid_expiry_month":
                        error = "El mes de vencimiento no es válido.";
                        break;
                    case "invalid_expiry_year":
                        error = "El año de caducidad no es válido.";
                        break;
                    case "invalid_number":
                        error = "El número de tarjeta es incorrecto.";
                        break;
                    case "invalid_pin":
                        error = "El PIN ingresado es incorrecto. Este código de rechazo solo se aplica a los pagos realizados con un lector de tarjetas.";
                        break;
                    case "issuer_not_available":
                        error = "No se pudo contactar al emisor de la tarjeta, por lo que no se pudo autorizar el pago.";
                        break;
                    case "lost_card":
                        error = "El pago fue rechazado porque la tarjeta se reportó perdida.";
                        break;
                    case "merchant_blacklist":
                        error = "El pago fue rechazado porque coincide con un valor en la lista de bloqueo del usuario de Stripe.";
                        break;
                    case "new_account_information_available":
                        error = "La tarjeta o la cuenta a la que está conectada la tarjeta no es válida.";
                        break;
                    case "no_action_taken":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "not_permitted":
                        error = "El pago no está permitido.";
                        break;
                    case "offline_pin_required":
                        error = "La tarjeta fue rechazada porque requiere un PIN.";
                        break;
                    case "online_or_offline_pin_required":
                        error = "La tarjeta fue rechazada porque requiere un PIN.";
                        break;
                    case "pickup_card":
                        error = "El cliente no puede usar esta tarjeta para realizar este pago (es posible que haya sido reportada como perdida o robada).";
                        break;
                    case "pin_try_exceeded":
                        error = "Se superó el número permitido de intentos de PIN.";
                        break;
                    case "processing_error":
                        error = "Ocurrió un error al procesar la tarjeta.";
                        break;
                    case "reenter_transaction":
                        error = "El emisor no pudo procesar el pago por un motivo desconocido.";
                        break;
                    case "restricted_card":
                        error = "El cliente no puede usar esta tarjeta para realizar este pago (es posible que haya sido reportada como perdida o robada).";
                        break;
                    case "revocation_of_all_authorizations":
                        error = "La tarjeta fue rechazada por un motivo desconocido";
                        break;
                    case "revocation_of_authorization":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "security_violation":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "service_not_allowed":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "stolen_card":
                        error = "El pago fue rechazado porque la tarjeta fue reportada como robada.";
                        break;
                    case "stop_payment_order":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "testmode_decline":
                        error = "Se utilizó un número de tarjeta de prueba de Stripe.";
                        break;
                    case "transaction_not_allowed":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "try_again_later":
                        error = "La tarjeta fue rechazada por un motivo desconocido.";
                        break;
                    case "withdrawal_count_limit_exceeded":
                        error = "El cliente ha superado el saldo o límite de crédito disponible en su tarjeta.";
                        break;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: error,
                    showConfirmButton: false,
                    timer: 2500
                });
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

    @laravelTelInputScripts

@endsection