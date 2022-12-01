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
                creditCard: true,
                onCreditCardTypeChanged: function(type) {
                    $(".type").html('<i class="fab fa-2x fa-cc-' + type + '"></i>');
                }
            });

            new Cleave('#expire', {
               date: true,
               datePattern: ['m', 'y']
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
        <form action="" method="POST">
            @csrf
            <div id='departments_cont' style="justify-content:center">
                <div class="col-sm-12 col-md-5 mb-0">
                    <h2 style="padding:10px 0px; color:#12313a">Datos de Facturación</h2>
                    <label for="name">Nombre:</label><br>
                    <input type="text" name="name" id="name" class="inputs spacedown" required /><br>
                    <label for="lastname">Apellido:</label><br>
                    <input type="text" name="lastname" id="lastname" class="inputs spacedown" required /><br>
                    <label for="country">Pais de Residencia:</label><br>
                    <select class="inputs spacedown" name="country" id="country" required>
                        <option value="" disabled selected></option>
                        <option value="AF" {{old('pais_nac') === "AF" ? 'selected' : ""}}>Afganistán</option>
                        <option value="AL" {{old('pais_nac') === "AL" ? 'selected' : ""}}>Albania</option>
                        <option value="DE" {{old('pais_nac') === "DE" ? 'selected' : ""}}>Alemania</option>
                        <option value="AD" {{old('pais_nac') === "AD" ? 'selected' : ""}}>Andorra</option>
                        <option value="AO" {{old('pais_nac') === "AO" ? 'selected' : ""}}>Angola</option>
                        <option value="AI" {{old('pais_nac') === "AI" ? 'selected' : ""}}>Anguila</option>
                        <option value="AQ" {{old('pais_nac') === "AQ" ? 'selected' : ""}}>Antártida</option>
                        <option value="AG" {{old('pais_nac') === "AG" ? 'selected' : ""}}>Antigua y Barbuda</option>
                        <option value="SA" {{old('pais_nac') === "SA" ? 'selected' : ""}}>Arabia Saudita</option>
                        <option value="DZ" {{old('pais_nac') === "DZ" ? 'selected' : ""}}>Argelia</option>
                        <option value="AR" {{old('pais_nac') === "AR" ? 'selected' : ""}}>Argentina</option>
                        <option value="AM" {{old('pais_nac') === "AM" ? 'selected' : ""}}>Armenia</option>
                        <option value="AW" {{old('pais_nac') === "AW" ? 'selected' : ""}}>Aruba</option>
                        <option value="AU" {{old('pais_nac') === "AU" ? 'selected' : ""}}>Australia</option>
                        <option value="AT" {{old('pais_nac') === "AT" ? 'selected' : ""}}>Austria</option>
                        <option value="AZ" {{old('pais_nac') === "AZ" ? 'selected' : ""}}>Azerbaiyán</option>
                        <option value="BE" {{old('pais_nac') === "BE" ? 'selected' : ""}}>Bélgica</option>
                        <option value="BS" {{old('pais_nac') === "BS" ? 'selected' : ""}}>Bahamas</option>
                        <option value="BH" {{old('pais_nac') === "BH" ? 'selected' : ""}}>Bahrein</option>
                        <option value="BD" {{old('pais_nac') === "BD" ? 'selected' : ""}}>Bangladesh</option>
                        <option value="BB" {{old('pais_nac') === "BB" ? 'selected' : ""}}>Barbados</option>
                        <option value="BZ" {{old('pais_nac') === "BZ" ? 'selected' : ""}}>Belice</option>
                        <option value="BJ" {{old('pais_nac') === "BJ" ? 'selected' : ""}}>Benín</option>
                        <option value="BT" {{old('pais_nac') === "BT" ? 'selected' : ""}}>Bhután</option>
                        <option value="BY" {{old('pais_nac') === "BY" ? 'selected' : ""}}>Bielorrusia</option>
                        <option value="MM" {{old('pais_nac') === "MM" ? 'selected' : ""}}>Birmania</option>
                        <option value="BO" {{old('pais_nac') === "BO" ? 'selected' : ""}}>Bolivia</option>
                        <option value="BA" {{old('pais_nac') === "BA" ? 'selected' : ""}}>Bosnia y Herzegovina</option>
                        <option value="BW" {{old('pais_nac') === "BW" ? 'selected' : ""}}>Botsuana</option>
                        <option value="BR" {{old('pais_nac') === "BR" ? 'selected' : ""}}>Brasil</option>
                        <option value="BN" {{old('pais_nac') === "BN" ? 'selected' : ""}}>Brunéi</option>
                        <option value="BG" {{old('pais_nac') === "BG" ? 'selected' : ""}}>Bulgaria</option>
                        <option value="BF" {{old('pais_nac') === "BF" ? 'selected' : ""}}>Burkina Faso</option>
                        <option value="BI" {{old('pais_nac') === "BI" ? 'selected' : ""}}>Burundi</option>
                        <option value="CV" {{old('pais_nac') === "CV" ? 'selected' : ""}}>Cabo Verde</option>
                        <option value="KH" {{old('pais_nac') === "KH" ? 'selected' : ""}}>Camboya</option>
                        <option value="CM" {{old('pais_nac') === "CM" ? 'selected' : ""}}>Camerún</option>
                        <option value="CA" {{old('pais_nac') === "CA" ? 'selected' : ""}}>Canadá</option>
                        <option value="TD" {{old('pais_nac') === "TD" ? 'selected' : ""}}>Chad</option>
                        <option value="CL" {{old('pais_nac') === "CL" ? 'selected' : ""}}>Chile</option>
                        <option value="CN" {{old('pais_nac') === "CN" ? 'selected' : ""}}>China</option>
                        <option value="CY" {{old('pais_nac') === "CY" ? 'selected' : ""}}>Chipre</option>
                        <option value="VA" {{old('pais_nac') === "VA" ? 'selected' : ""}}>Ciudad del Vaticano</option>
                        <option value="CO" {{old('pais_nac') === "CO" ? 'selected' : ""}}>Colombia</option>
                        <option value="KM" {{old('pais_nac') === "KM" ? 'selected' : ""}}>Comoras</option>
                        <option value="CG" {{old('pais_nac') === "CG" ? 'selected' : ""}}>República del Congo</option>
                        <option value="CD" {{old('pais_nac') === "CD" ? 'selected' : ""}}>República Democrática del Congo</option>
                        <option value="KP" {{old('pais_nac') === "KP" ? 'selected' : ""}}>Corea del Norte</option>
                        <option value="KR" {{old('pais_nac') === "KR" ? 'selected' : ""}}>Corea del Sur</option>
                        <option value="CI" {{old('pais_nac') === "CI" ? 'selected' : ""}}>Costa de Marfil</option>
                        <option value="CR" {{old('pais_nac') === "CR" ? 'selected' : ""}}>Costa Rica</option>
                        <option value="HR" {{old('pais_nac') === "HR" ? 'selected' : ""}}>Croacia</option>
                        <option value="CU" {{old('pais_nac') === "CU" ? 'selected' : ""}}>Cuba</option>
                        <option value="CW" {{old('pais_nac') === "CW" ? 'selected' : ""}}>Curazao</option>
                        <option value="DK" {{old('pais_nac') === "DK" ? 'selected' : ""}}>Dinamarca</option>
                        <option value="DM" {{old('pais_nac') === "DM" ? 'selected' : ""}}>Dominica</option>
                        <option value="EC" {{old('pais_nac') === "EC" ? 'selected' : ""}}>Ecuador</option>
                        <option value="EG" {{old('pais_nac') === "EG" ? 'selected' : ""}}>Egipto</option>
                        <option value="SV" {{old('pais_nac') === "SV" ? 'selected' : ""}}>El Salvador</option>
                        <option value="AE" {{old('pais_nac') === "AE" ? 'selected' : ""}}>Emiratos Árabes Unidos</option>
                        <option value="ER" {{old('pais_nac') === "ER" ? 'selected' : ""}}>Eritrea</option>
                        <option value="SK" {{old('pais_nac') === "SK" ? 'selected' : ""}}>Eslovaquia</option>
                        <option value="SI" {{old('pais_nac') === "SI" ? 'selected' : ""}}>Eslovenia</option>
                        <option value="ES" {{old('pais_nac') === "ES" ? 'selected' : ""}}>España</option>
                        <option value="US" {{old('pais_nac') === "US" ? 'selected' : ""}}>Estados Unidos de América</option>
                        <option value="EE" {{old('pais_nac') === "EE" ? 'selected' : ""}}>Estonia</option>
                        <option value="ET" {{old('pais_nac') === "ET" ? 'selected' : ""}}>Etiopía</option>
                        <option value="PH" {{old('pais_nac') === "PH" ? 'selected' : ""}}>Filipinas</option>
                        <option value="FI" {{old('pais_nac') === "FI" ? 'selected' : ""}}>Finlandia</option>
                        <option value="FJ" {{old('pais_nac') === "FJ" ? 'selected' : ""}}>Fiyi</option>
                        <option value="FR" {{old('pais_nac') === "FR" ? 'selected' : ""}}>Francia</option>
                        <option value="GA" {{old('pais_nac') === "GA" ? 'selected' : ""}}>Gabón</option>
                        <option value="GM" {{old('pais_nac') === "GM" ? 'selected' : ""}}>Gambia</option>
                        <option value="GE" {{old('pais_nac') === "GE" ? 'selected' : ""}}>Georgia</option>
                        <option value="GH" {{old('pais_nac') === "GH" ? 'selected' : ""}}>Ghana</option>
                        <option value="GI" {{old('pais_nac') === "GI" ? 'selected' : ""}}>Gibraltar</option>
                        <option value="GD" {{old('pais_nac') === "GD" ? 'selected' : ""}}>Granada</option>
                        <option value="GR" {{old('pais_nac') === "GR" ? 'selected' : ""}}>Grecia</option>
                        <option value="GL" {{old('pais_nac') === "GL" ? 'selected' : ""}}>Groenlandia</option>
                        <option value="GP" {{old('pais_nac') === "GP" ? 'selected' : ""}}>Guadalupe</option>
                        <option value="GU" {{old('pais_nac') === "GU" ? 'selected' : ""}}>Guam</option>
                        <option value="GT" {{old('pais_nac') === "GT" ? 'selected' : ""}}>Guatemala</option>
                        <option value="GF" {{old('pais_nac') === "GF" ? 'selected' : ""}}>Guayana Francesa</option>
                        <option value="GG" {{old('pais_nac') === "GG" ? 'selected' : ""}}>Guernsey</option>
                        <option value="GN" {{old('pais_nac') === "GN" ? 'selected' : ""}}>Guinea</option>
                        <option value="GQ" {{old('pais_nac') === "GQ" ? 'selected' : ""}}>Guinea Ecuatorial</option>
                        <option value="GW" {{old('pais_nac') === "GW" ? 'selected' : ""}}>Guinea-Bissau</option>
                        <option value="GY" {{old('pais_nac') === "GY" ? 'selected' : ""}}>Guyana</option>
                        <option value="HT" {{old('pais_nac') === "HT" ? 'selected' : ""}}>Haití</option>
                        <option value="HN" {{old('pais_nac') === "HN" ? 'selected' : ""}}>Honduras</option>
                        <option value="HK" {{old('pais_nac') === "HK" ? 'selected' : ""}}>Hong kong</option>
                        <option value="HU" {{old('pais_nac') === "HU" ? 'selected' : ""}}>Hungría</option>
                        <option value="IN" {{old('pais_nac') === "IN" ? 'selected' : ""}}>India</option>
                        <option value="ID" {{old('pais_nac') === "ID" ? 'selected' : ""}}>Indonesia</option>
                        <option value="IR" {{old('pais_nac') === "IR" ? 'selected' : ""}}>Irán</option>
                        <option value="IQ" {{old('pais_nac') === "IQ" ? 'selected' : ""}}>Irak</option>
                        <option value="IE" {{old('pais_nac') === "IE" ? 'selected' : ""}}>Irlanda</option>
                        <option value="BV" {{old('pais_nac') === "BV" ? 'selected' : ""}}>Isla Bouvet</option>
                        <option value="IM" {{old('pais_nac') === "IM" ? 'selected' : ""}}>Isla de Man</option>
                        <option value="CX" {{old('pais_nac') === "CX" ? 'selected' : ""}}>Isla de Navidad</option>
                        <option value="NF" {{old('pais_nac') === "NF" ? 'selected' : ""}}>Isla Norfolk</option>
                        <option value="IS" {{old('pais_nac') === "IS" ? 'selected' : ""}}>Islandia</option>
                        <option value="BM" {{old('pais_nac') === "BM" ? 'selected' : ""}}>Islas Bermudas</option>
                        <option value="KY" {{old('pais_nac') === "KY" ? 'selected' : ""}}>Islas Caimán</option>
                        <option value="CC" {{old('pais_nac') === "CC" ? 'selected' : ""}}>Islas Cocos (Keeling)</option>
                        <option value="CK" {{old('pais_nac') === "CK" ? 'selected' : ""}}>Islas Cook</option>
                        <option value="AX" {{old('pais_nac') === "AX" ? 'selected' : ""}}>Islas de Åland</option>
                        <option value="FO" {{old('pais_nac') === "FO" ? 'selected' : ""}}>Islas Feroe</option>
                        <option value="GS" {{old('pais_nac') === "GS" ? 'selected' : ""}}>Islas Georgias del Sur y Sandwich del Sur</option>
                        <option value="HM" {{old('pais_nac') === "HM" ? 'selected' : ""}}>Islas Heard y McDonald</option>
                        <option value="MV" {{old('pais_nac') === "MV" ? 'selected' : ""}}>Islas Maldivas</option>
                        <option value="FK" {{old('pais_nac') === "FK" ? 'selected' : ""}}>Islas Malvinas</option>
                        <option value="MP" {{old('pais_nac') === "MP" ? 'selected' : ""}}>Islas Marianas del Norte</option>
                        <option value="MH" {{old('pais_nac') === "MH" ? 'selected' : ""}}>Islas Marshall</option>
                        <option value="PN" {{old('pais_nac') === "PN" ? 'selected' : ""}}>Islas Pitcairn</option>
                        <option value="SB" {{old('pais_nac') === "SB" ? 'selected' : ""}}>Islas Salomón</option>
                        <option value="TC" {{old('pais_nac') === "TC" ? 'selected' : ""}}>Islas Turcas y Caicos</option>
                        <option value="UM" {{old('pais_nac') === "UM" ? 'selected' : ""}}>Islas Ultramarinas Menores de Estados Unidos</option>
                        <option value="VG" {{old('pais_nac') === "VG" ? 'selected' : ""}}>Islas Vírgenes Británicas</option>
                        <option value="VI" {{old('pais_nac') === "VI" ? 'selected' : ""}}>Islas Vírgenes de los Estados Unidos</option>
                        <option value="IL" {{old('pais_nac') === "IL" ? 'selected' : ""}}>Israel</option>
                        <option value="IT" {{old('pais_nac') === "IT" ? 'selected' : ""}}>Italia</option>
                        <option value="JM" {{old('pais_nac') === "JM" ? 'selected' : ""}}>Jamaica</option>
                        <option value="JP" {{old('pais_nac') === "JP" ? 'selected' : ""}}>Japón</option>
                        <option value="JE" {{old('pais_nac') === "JE" ? 'selected' : ""}}>Jersey</option>
                        <option value="JO" {{old('pais_nac') === "JO" ? 'selected' : ""}}>Jordania</option>
                        <option value="KZ" {{old('pais_nac') === "KZ" ? 'selected' : ""}}>Kazajistán</option>
                        <option value="KE" {{old('pais_nac') === "KE" ? 'selected' : ""}}>Kenia</option>
                        <option value="KG" {{old('pais_nac') === "KG" ? 'selected' : ""}}>Kirguistán</option>
                        <option value="KI" {{old('pais_nac') === "KI" ? 'selected' : ""}}>Kiribati</option>
                        <option value="KW" {{old('pais_nac') === "KW" ? 'selected' : ""}}>Kuwait</option>
                        <option value="LB" {{old('pais_nac') === "LB" ? 'selected' : ""}}>Líbano</option>
                        <option value="LA" {{old('pais_nac') === "LA" ? 'selected' : ""}}>Laos</option>
                        <option value="LS" {{old('pais_nac') === "LS" ? 'selected' : ""}}>Lesoto</option>
                        <option value="LV" {{old('pais_nac') === "LV" ? 'selected' : ""}}>Letonia</option>
                        <option value="LR" {{old('pais_nac') === "LR" ? 'selected' : ""}}>Liberia</option>
                        <option value="LY" {{old('pais_nac') === "LY" ? 'selected' : ""}}>Libia</option>
                        <option value="LI" {{old('pais_nac') === "LI" ? 'selected' : ""}}>Liechtenstein</option>
                        <option value="LT" {{old('pais_nac') === "LT" ? 'selected' : ""}}>Lituania</option>
                        <option value="LU" {{old('pais_nac') === "LU" ? 'selected' : ""}}>Luxemburgo</option>
                        <option value="MX" {{old('pais_nac') === "MX" ? 'selected' : ""}}>México</option>
                        <option value="MC" {{old('pais_nac') === "MC" ? 'selected' : ""}}>Mónaco</option>
                        <option value="MO" {{old('pais_nac') === "MO" ? 'selected' : ""}}>Macao</option>
                        <option value="MK" {{old('pais_nac') === "MK" ? 'selected' : ""}}>Macedônia</option>
                        <option value="MG" {{old('pais_nac') === "MG" ? 'selected' : ""}}>Madagascar</option>
                        <option value="MY" {{old('pais_nac') === "MY" ? 'selected' : ""}}>Malasia</option>
                        <option value="MW" {{old('pais_nac') === "MW" ? 'selected' : ""}}>Malawi</option>
                        <option value="ML" {{old('pais_nac') === "ML" ? 'selected' : ""}}>Mali</option>
                        <option value="MT" {{old('pais_nac') === "MT" ? 'selected' : ""}}>Malta</option>
                        <option value="MA" {{old('pais_nac') === "MA" ? 'selected' : ""}}>Marruecos</option>
                        <option value="MQ" {{old('pais_nac') === "MQ" ? 'selected' : ""}}>Martinica</option>
                        <option value="MU" {{old('pais_nac') === "MU" ? 'selected' : ""}}>Mauricio</option>
                        <option value="MR" {{old('pais_nac') === "MR" ? 'selected' : ""}}>Mauritania</option>
                        <option value="YT" {{old('pais_nac') === "YT" ? 'selected' : ""}}>Mayotte</option>
                        <option value="FM" {{old('pais_nac') === "FM" ? 'selected' : ""}}>Micronesia</option>
                        <option value="MD" {{old('pais_nac') === "MD" ? 'selected' : ""}}>Moldavia</option>
                        <option value="MN" {{old('pais_nac') === "MN" ? 'selected' : ""}}>Mongolia</option>
                        <option value="ME" {{old('pais_nac') === "ME" ? 'selected' : ""}}>Montenegro</option>
                        <option value="MS" {{old('pais_nac') === "MS" ? 'selected' : ""}}>Montserrat</option>
                        <option value="MZ" {{old('pais_nac') === "MZ" ? 'selected' : ""}}>Mozambique</option>
                        <option value="NA" {{old('pais_nac') === "NA" ? 'selected' : ""}}>Namibia</option>
                        <option value="NR" {{old('pais_nac') === "NR" ? 'selected' : ""}}>Nauru</option>
                        <option value="NP" {{old('pais_nac') === "NP" ? 'selected' : ""}}>Nepal</option>
                        <option value="NI" {{old('pais_nac') === "NI" ? 'selected' : ""}}>Nicaragua</option>
                        <option value="NE" {{old('pais_nac') === "NE" ? 'selected' : ""}}>Niger</option>
                        <option value="NG" {{old('pais_nac') === "NG" ? 'selected' : ""}}>Nigeria</option>
                        <option value="NU" {{old('pais_nac') === "NU" ? 'selected' : ""}}>Niue</option>
                        <option value="NO" {{old('pais_nac') === "NO" ? 'selected' : ""}}>Noruega</option>
                        <option value="NC" {{old('pais_nac') === "NC" ? 'selected' : ""}}>Nueva Caledonia</option>
                        <option value="NZ" {{old('pais_nac') === "NZ" ? 'selected' : ""}}>Nueva Zelanda</option>
                        <option value="OM" {{old('pais_nac') === "OM" ? 'selected' : ""}}>Omán</option>
                        <option value="NL" {{old('pais_nac') === "NL" ? 'selected' : ""}}>Países Bajos</option>
                        <option value="PK" {{old('pais_nac') === "PK" ? 'selected' : ""}}>Pakistán</option>
                        <option value="PW" {{old('pais_nac') === "PW" ? 'selected' : ""}}>Palau</option>
                        <option value="PS" {{old('pais_nac') === "PS" ? 'selected' : ""}}>Palestina</option>
                        <option value="PA" {{old('pais_nac') === "PA" ? 'selected' : ""}}>Panamá</option>
                        <option value="PG" {{old('pais_nac') === "PG" ? 'selected' : ""}}>Papúa Nueva Guinea</option>
                        <option value="PY" {{old('pais_nac') === "PY" ? 'selected' : ""}}>Paraguay</option>
                        <option value="PE" {{old('pais_nac') === "PE" ? 'selected' : ""}}>Perú</option>
                        <option value="PF" {{old('pais_nac') === "PF" ? 'selected' : ""}}>Polinesia Francesa</option>
                        <option value="PL" {{old('pais_nac') === "PL" ? 'selected' : ""}}>Polonia</option>
                        <option value="PT" {{old('pais_nac') === "PT" ? 'selected' : ""}}>Portugal</option>
                        <option value="PR" {{old('pais_nac') === "PR" ? 'selected' : ""}}>Puerto Rico</option>
                        <option value="QA" {{old('pais_nac') === "QA" ? 'selected' : ""}}>Qatar</option>
                        <option value="GB" {{old('pais_nac') === "GB" ? 'selected' : ""}}>Reino Unido</option>
                        <option value="CF" {{old('pais_nac') === "CF" ? 'selected' : ""}}>República Centroafricana</option>
                        <option value="CZ" {{old('pais_nac') === "CZ" ? 'selected' : ""}}>República Checa</option>
                        <option value="DO" {{old('pais_nac') === "DO" ? 'selected' : ""}}>República Dominicana</option>
                        <option value="SS" {{old('pais_nac') === "SS" ? 'selected' : ""}}>República de Sudán del Sur</option>
                        <option value="RE" {{old('pais_nac') === "RE" ? 'selected' : ""}}>Reunión</option>
                        <option value="RW" {{old('pais_nac') === "RW" ? 'selected' : ""}}>Ruanda</option>
                        <option value="RO" {{old('pais_nac') === "RO" ? 'selected' : ""}}>Rumanía</option>
                        <option value="RU" {{old('pais_nac') === "RU" ? 'selected' : ""}}>Rusia</option>
                        <option value="EH" {{old('pais_nac') === "EH" ? 'selected' : ""}}>Sahara Occidental</option>
                        <option value="WS" {{old('pais_nac') === "WS" ? 'selected' : ""}}>Samoa</option>
                        <option value="AS" {{old('pais_nac') === "AS" ? 'selected' : ""}}>Samoa Americana</option>
                        <option value="BL" {{old('pais_nac') === "BL" ? 'selected' : ""}}>San Bartolomé</option>
                        <option value="KN" {{old('pais_nac') === "KN" ? 'selected' : ""}}>San Cristóbal y Nieves</option>
                        <option value="SM" {{old('pais_nac') === "SM" ? 'selected' : ""}}>San Marino</option>
                        <option value="MF" {{old('pais_nac') === "MF" ? 'selected' : ""}}>San Martín (Francia)</option>
                        <option value="PM" {{old('pais_nac') === "PM" ? 'selected' : ""}}>San Pedro y Miquelón</option>
                        <option value="VC" {{old('pais_nac') === "VC" ? 'selected' : ""}}>San Vicente y las Granadinas</option>
                        <option value="SH" {{old('pais_nac') === "SH" ? 'selected' : ""}}>Santa Elena</option>
                        <option value="LC" {{old('pais_nac') === "LC" ? 'selected' : ""}}>Santa Lucía</option>
                        <option value="ST" {{old('pais_nac') === "ST" ? 'selected' : ""}}>Santo Tomé y Príncipe</option>
                        <option value="SN" {{old('pais_nac') === "SN" ? 'selected' : ""}}>Senegal</option>
                        <option value="RS" {{old('pais_nac') === "RS" ? 'selected' : ""}}>Serbia</option>
                        <option value="SC" {{old('pais_nac') === "SC" ? 'selected' : ""}}>Seychelles</option>
                        <option value="SL" {{old('pais_nac') === "SL" ? 'selected' : ""}}>Sierra Leona</option>
                        <option value="SG" {{old('pais_nac') === "SG" ? 'selected' : ""}}>Singapur</option>
                        <option value="SX" {{old('pais_nac') === "SX" ? 'selected' : ""}}>Sint Maarten</option>
                        <option value="SY" {{old('pais_nac') === "SY" ? 'selected' : ""}}>Siria</option>
                        <option value="SO" {{old('pais_nac') === "SO" ? 'selected' : ""}}>Somalia</option>
                        <option value="LK" {{old('pais_nac') === "LK" ? 'selected' : ""}}>Sri lanka</option>
                        <option value="ZA" {{old('pais_nac') === "ZA" ? 'selected' : ""}}>Sudáfrica</option>
                        <option value="SD" {{old('pais_nac') === "SD" ? 'selected' : ""}}>Sudán</option>
                        <option value="SE" {{old('pais_nac') === "SE" ? 'selected' : ""}}>Suecia</option>
                        <option value="CH" {{old('pais_nac') === "CH" ? 'selected' : ""}}>Suiza</option>
                        <option value="SR" {{old('pais_nac') === "SR" ? 'selected' : ""}}>Surinám</option>
                        <option value="SJ" {{old('pais_nac') === "SJ" ? 'selected' : ""}}>Svalbard y Jan Mayen</option>
                        <option value="SZ" {{old('pais_nac') === "SZ" ? 'selected' : ""}}>Swazilandia</option>
                        <option value="TJ" {{old('pais_nac') === "TJ" ? 'selected' : ""}}>Tayikistán</option>
                        <option value="TH" {{old('pais_nac') === "TH" ? 'selected' : ""}}>Tailandia</option>
                        <option value="TW" {{old('pais_nac') === "TW" ? 'selected' : ""}}>Taiwán</option>
                        <option value="TZ" {{old('pais_nac') === "TZ" ? 'selected' : ""}}>Tanzania</option>
                        <option value="IO" {{old('pais_nac') === "IO" ? 'selected' : ""}}>Territorio Británico del Océano Índico</option>
                        <option value="TF" {{old('pais_nac') === "TF" ? 'selected' : ""}}>Territorios Australes y Antárticas Franceses</option>
                        <option value="TL" {{old('pais_nac') === "TL" ? 'selected' : ""}}>Timor Oriental</option>
                        <option value="TG" {{old('pais_nac') === "TG" ? 'selected' : ""}}>Togo</option>
                        <option value="TK" {{old('pais_nac') === "TK" ? 'selected' : ""}}>Tokelau</option>
                        <option value="TO" {{old('pais_nac') === "TO" ? 'selected' : ""}}>Tonga</option>
                        <option value="TT" {{old('pais_nac') === "TT" ? 'selected' : ""}}>Trinidad y Tobago</option>
                        <option value="TN" {{old('pais_nac') === "TN" ? 'selected' : ""}}>Tunez</option>
                        <option value="TM" {{old('pais_nac') === "TM" ? 'selected' : ""}}>Turkmenistán</option>
                        <option value="TR" {{old('pais_nac') === "TR" ? 'selected' : ""}}>Turquía</option>
                        <option value="TV" {{old('pais_nac') === "TV" ? 'selected' : ""}}>Tuvalu</option>
                        <option value="UA" {{old('pais_nac') === "UA" ? 'selected' : ""}}>Ucrania</option>
                        <option value="UG" {{old('pais_nac') === "UG" ? 'selected' : ""}}>Uganda</option>
                        <option value="UY" {{old('pais_nac') === "UY" ? 'selected' : ""}}>Uruguay</option>
                        <option value="UZ" {{old('pais_nac') === "UZ" ? 'selected' : ""}}>Uzbekistán</option>
                        <option value="VU" {{old('pais_nac') === "VU" ? 'selected' : ""}}>Vanuatu</option>
                        <option value="VE" {{old('pais_nac') === "VE" ? 'selected' : ""}}>Venezuela</option>
                        <option value="VN" {{old('pais_nac') === "VN" ? 'selected' : ""}}>Vietnam</option>
                        <option value="WF" {{old('pais_nac') === "WF" ? 'selected' : ""}}>Wallis y Futuna</option>
                        <option value="YE" {{old('pais_nac') === "YE" ? 'selected' : ""}}>Yemen</option>
                        <option value="DJ" {{old('pais_nac') === "DJ" ? 'selected' : ""}}>Yibuti</option>
                        <option value="ZM" {{old('pais_nac') === "ZM" ? 'selected' : ""}}>Zambia</option>
                        <option value="ZW" {{old('pais_nac') === "ZW" ? 'selected' : ""}}>Zimbabue</option>
                    </select><br>
                    <label for="dir1">Dirección Linea 1:</label><br>
                    <input type="text" name="dir1" id="dir1" class="inputs spacedown" required /><br>
                    <label for="dir1">Dirección Linea 2:</label><br>
                    <input type="text" name="dir2" id="dir2" class="inputs spacedown" required /><br>
                    <label for="dir1">Código Postal:</label><br>
                    <input type="tel" name="postal" id="postal" class="inputs spacedown" required /><br>
                    <label for="telephone">Teléfono:</label><br>
                    <input type="tel" name="telephone" id="telephone" class="inputs spacedown" required /><br>
                    <label for="mail">Correo:</label><br>
                    <input type="text" name="mail" id="mail" class="inputs spacedown" required /><br>
                    <br>
                </div>
                <div class="col-sm-12 col-md-5 mb-0">
                    <h2 style="padding:10px 0px; color:#12313a">Datos de Pago</h2>
                    <label for="cardname">Nombre en la Tarjeta:</label><br>
                    <input type="text" name="cardname" id="cardname" class="inputs spacedown" required /><br>
                    <div style="display: flex;">
                        <label for="name">Tarjeta de Crédito/Débito:&nbsp</label>
                        <div class="type"></div>
                    </div>
                    <input id="ccn" name="ccn" type="text" placeholder="XXXX XXXX XXXX XXXX" inputmode="numeric" class="inputs spacedown cardNumber type" />
                    <label for="expire">Fecha de Expiracion:</label><br>
                    <input id="expire" name="expire" type="text" placeholder="MM/AA" inputmode="numeric" class="inputs spacedown" />
                    <label for="cvv">Fecha de Expiracion:</label><br>
                    <input id="cvv" name="cvv" type="password" placeholder="xxx" pattern="[0-9]+" maxlength="3" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" inputmode="numeric" class="inputs spacedown" />
                </div>
                <div class="col-sm-12 col-md-5 mb-0">
                    @php

                        if ($servicio["nombre"]=="Arbol Genealógico") {
                    @endphp

                    <input type="hidden" name="servid" value="0">

                    @php
                        } else if ($servicio["nombre"]=="Libro de Familia") {
                    @endphp

                    <input type="hidden" name="servid" value="1">

                    @php
                        }
                    @endphp
                </div>
            </div>
        </form>
    </div>

        @else
            @php
                header("Location: /fid/login");
                exit();
            @endphp
        @endauth
    @endif

@endsection