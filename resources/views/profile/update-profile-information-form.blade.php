<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Mis datos
    </x-slot>

    <x-slot name="description">
        Actualizar mi información.
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="Foto de Perfil" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                          x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    Seleccionar una foto
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        Eliminar foto
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="Nombre" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="lastname" value="Apellido" />
            <x-jet-input id="lastname" type="text" class="mt-1 block w-full" wire:model.defer="state.lastname" autocomplete="lastname" />
            <x-jet-input-error for="lastname" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="Correo" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phonenumber" value="Teléfono" />
            <x-jet-input id="phonenumber" type="text" class="mt-1 block w-full" wire:model.defer="state.phonenumber" autocomplete="phonenumber" />
            <x-jet-input-error for="phonenumber" class="mt-2" />
        </div>

        <!-- Pais de Residencia -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country_iso2" value="País de Residencia" />
            <select id="country_iso2" wire:model.defer="state.country_iso2" name="country_iso2"  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm inputs block mt-1 w-full" style="height: 44px;" wire:model="country_iso2">
                <option value="" disabled selected>Seleccione una opción</option>
                <option value="AF" {{old('country_iso2') === "AF" ? 'selected' : ""}}>Afganistán</option>
                <option value="AL" {{old('country_iso2') === "AL" ? 'selected' : ""}}>Albania</option>
                <option value="DE" {{old('country_iso2') === "DE" ? 'selected' : ""}}>Alemania</option>
                <option value="AD" {{old('country_iso2') === "AD" ? 'selected' : ""}}>Andorra</option>
                <option value="AO" {{old('country_iso2') === "AO" ? 'selected' : ""}}>Angola</option>
                <option value="AI" {{old('country_iso2') === "AI" ? 'selected' : ""}}>Anguila</option>
                <option value="AQ" {{old('country_iso2') === "AQ" ? 'selected' : ""}}>Antártida</option>
                <option value="AG" {{old('country_iso2') === "AG" ? 'selected' : ""}}>Antigua y Barbuda</option>
                <option value="SA" {{old('country_iso2') === "SA" ? 'selected' : ""}}>Arabia Saudita</option>
                <option value="DZ" {{old('country_iso2') === "DZ" ? 'selected' : ""}}>Argelia</option>
                <option value="AR" {{old('country_iso2') === "AR" ? 'selected' : ""}}>Argentina</option>
                <option value="AM" {{old('country_iso2') === "AM" ? 'selected' : ""}}>Armenia</option>
                <option value="AW" {{old('country_iso2') === "AW" ? 'selected' : ""}}>Aruba</option>
                <option value="AU" {{old('country_iso2') === "AU" ? 'selected' : ""}}>Australia</option>
                <option value="AT" {{old('country_iso2') === "AT" ? 'selected' : ""}}>Austria</option>
                <option value="AZ" {{old('country_iso2') === "AZ" ? 'selected' : ""}}>Azerbaiyán</option>
                <option value="BE" {{old('country_iso2') === "BE" ? 'selected' : ""}}>Bélgica</option>
                <option value="BS" {{old('country_iso2') === "BS" ? 'selected' : ""}}>Bahamas</option>
                <option value="BH" {{old('country_iso2') === "BH" ? 'selected' : ""}}>Bahrein</option>
                <option value="BD" {{old('country_iso2') === "BD" ? 'selected' : ""}}>Bangladesh</option>
                <option value="BB" {{old('country_iso2') === "BB" ? 'selected' : ""}}>Barbados</option>
                <option value="BZ" {{old('country_iso2') === "BZ" ? 'selected' : ""}}>Belice</option>
                <option value="BJ" {{old('country_iso2') === "BJ" ? 'selected' : ""}}>Benín</option>
                <option value="BT" {{old('country_iso2') === "BT" ? 'selected' : ""}}>Bhután</option>
                <option value="BY" {{old('country_iso2') === "BY" ? 'selected' : ""}}>Bielorrusia</option>
                <option value="MM" {{old('country_iso2') === "MM" ? 'selected' : ""}}>Birmania</option>
                <option value="BO" {{old('country_iso2') === "BO" ? 'selected' : ""}}>Bolivia</option>
                <option value="BA" {{old('country_iso2') === "BA" ? 'selected' : ""}}>Bosnia y Herzegovina</option>
                <option value="BW" {{old('country_iso2') === "BW" ? 'selected' : ""}}>Botsuana</option>
                <option value="BR" {{old('country_iso2') === "BR" ? 'selected' : ""}}>Brasil</option>
                <option value="BN" {{old('country_iso2') === "BN" ? 'selected' : ""}}>Brunéi</option>
                <option value="BG" {{old('country_iso2') === "BG" ? 'selected' : ""}}>Bulgaria</option>
                <option value="BF" {{old('country_iso2') === "BF" ? 'selected' : ""}}>Burkina Faso</option>
                <option value="BI" {{old('country_iso2') === "BI" ? 'selected' : ""}}>Burundi</option>
                <option value="CV" {{old('country_iso2') === "CV" ? 'selected' : ""}}>Cabo Verde</option>
                <option value="KH" {{old('country_iso2') === "KH" ? 'selected' : ""}}>Camboya</option>
                <option value="CM" {{old('country_iso2') === "CM" ? 'selected' : ""}}>Camerún</option>
                <option value="CA" {{old('country_iso2') === "CA" ? 'selected' : ""}}>Canadá</option>
                <option value="TD" {{old('country_iso2') === "TD" ? 'selected' : ""}}>Chad</option>
                <option value="CL" {{old('country_iso2') === "CL" ? 'selected' : ""}}>Chile</option>
                <option value="CN" {{old('country_iso2') === "CN" ? 'selected' : ""}}>China</option>
                <option value="CY" {{old('country_iso2') === "CY" ? 'selected' : ""}}>Chipre</option>
                <option value="VA" {{old('country_iso2') === "VA" ? 'selected' : ""}}>Ciudad del Vaticano</option>
                <option value="CO" {{old('country_iso2') === "CO" ? 'selected' : ""}}>Colombia</option>
                <option value="KM" {{old('country_iso2') === "KM" ? 'selected' : ""}}>Comoras</option>
                <option value="CG" {{old('country_iso2') === "CG" ? 'selected' : ""}}>República del Congo</option>
                <option value="CD" {{old('country_iso2') === "CD" ? 'selected' : ""}}>República Democrática del Congo</option>
                <option value="KP" {{old('country_iso2') === "KP" ? 'selected' : ""}}>Corea del Norte</option>
                <option value="KR" {{old('country_iso2') === "KR" ? 'selected' : ""}}>Corea del Sur</option>
                <option value="CI" {{old('country_iso2') === "CI" ? 'selected' : ""}}>Costa de Marfil</option>
                <option value="CR" {{old('country_iso2') === "CR" ? 'selected' : ""}}>Costa Rica</option>
                <option value="HR" {{old('country_iso2') === "HR" ? 'selected' : ""}}>Croacia</option>
                <option value="CU" {{old('country_iso2') === "CU" ? 'selected' : ""}}>Cuba</option>
                <option value="CW" {{old('country_iso2') === "CW" ? 'selected' : ""}}>Curazao</option>
                <option value="DK" {{old('country_iso2') === "DK" ? 'selected' : ""}}>Dinamarca</option>
                <option value="DM" {{old('country_iso2') === "DM" ? 'selected' : ""}}>Dominica</option>
                <option value="EC" {{old('country_iso2') === "EC" ? 'selected' : ""}}>Ecuador</option>
                <option value="EG" {{old('country_iso2') === "EG" ? 'selected' : ""}}>Egipto</option>
                <option value="SV" {{old('country_iso2') === "SV" ? 'selected' : ""}}>El Salvador</option>
                <option value="AE" {{old('country_iso2') === "AE" ? 'selected' : ""}}>Emiratos Árabes Unidos</option>
                <option value="ER" {{old('country_iso2') === "ER" ? 'selected' : ""}}>Eritrea</option>
                <option value="SK" {{old('country_iso2') === "SK" ? 'selected' : ""}}>Eslovaquia</option>
                <option value="SI" {{old('country_iso2') === "SI" ? 'selected' : ""}}>Eslovenia</option>
                <option value="ES" {{old('country_iso2') === "ES" ? 'selected' : ""}}>España</option>
                <option value="US" {{old('country_iso2') === "US" ? 'selected' : ""}}>Estados Unidos de América</option>
                <option value="EE" {{old('country_iso2') === "EE" ? 'selected' : ""}}>Estonia</option>
                <option value="ET" {{old('country_iso2') === "ET" ? 'selected' : ""}}>Etiopía</option>
                <option value="PH" {{old('country_iso2') === "PH" ? 'selected' : ""}}>Filipinas</option>
                <option value="FI" {{old('country_iso2') === "FI" ? 'selected' : ""}}>Finlandia</option>
                <option value="FJ" {{old('country_iso2') === "FJ" ? 'selected' : ""}}>Fiyi</option>
                <option value="FR" {{old('country_iso2') === "FR" ? 'selected' : ""}}>Francia</option>
                <option value="GA" {{old('country_iso2') === "GA" ? 'selected' : ""}}>Gabón</option>
                <option value="GM" {{old('country_iso2') === "GM" ? 'selected' : ""}}>Gambia</option>
                <option value="GE" {{old('country_iso2') === "GE" ? 'selected' : ""}}>Georgia</option>
                <option value="GH" {{old('country_iso2') === "GH" ? 'selected' : ""}}>Ghana</option>
                <option value="GI" {{old('country_iso2') === "GI" ? 'selected' : ""}}>Gibraltar</option>
                <option value="GD" {{old('country_iso2') === "GD" ? 'selected' : ""}}>Granada</option>
                <option value="GR" {{old('country_iso2') === "GR" ? 'selected' : ""}}>Grecia</option>
                <option value="GL" {{old('country_iso2') === "GL" ? 'selected' : ""}}>Groenlandia</option>
                <option value="GP" {{old('country_iso2') === "GP" ? 'selected' : ""}}>Guadalupe</option>
                <option value="GU" {{old('country_iso2') === "GU" ? 'selected' : ""}}>Guam</option>
                <option value="GT" {{old('country_iso2') === "GT" ? 'selected' : ""}}>Guatemala</option>
                <option value="GF" {{old('country_iso2') === "GF" ? 'selected' : ""}}>Guayana Francesa</option>
                <option value="GG" {{old('country_iso2') === "GG" ? 'selected' : ""}}>Guernsey</option>
                <option value="GN" {{old('country_iso2') === "GN" ? 'selected' : ""}}>Guinea</option>
                <option value="GQ" {{old('country_iso2') === "GQ" ? 'selected' : ""}}>Guinea Ecuatorial</option>
                <option value="GW" {{old('country_iso2') === "GW" ? 'selected' : ""}}>Guinea-Bissau</option>
                <option value="GY" {{old('country_iso2') === "GY" ? 'selected' : ""}}>Guyana</option>
                <option value="HT" {{old('country_iso2') === "HT" ? 'selected' : ""}}>Haití</option>
                <option value="HN" {{old('country_iso2') === "HN" ? 'selected' : ""}}>Honduras</option>
                <option value="HK" {{old('country_iso2') === "HK" ? 'selected' : ""}}>Hong kong</option>
                <option value="HU" {{old('country_iso2') === "HU" ? 'selected' : ""}}>Hungría</option>
                <option value="IN" {{old('country_iso2') === "IN" ? 'selected' : ""}}>India</option>
                <option value="ID" {{old('country_iso2') === "ID" ? 'selected' : ""}}>Indonesia</option>
                <option value="IR" {{old('country_iso2') === "IR" ? 'selected' : ""}}>Irán</option>
                <option value="IQ" {{old('country_iso2') === "IQ" ? 'selected' : ""}}>Irak</option>
                <option value="IE" {{old('country_iso2') === "IE" ? 'selected' : ""}}>Irlanda</option>
                <option value="BV" {{old('country_iso2') === "BV" ? 'selected' : ""}}>Isla Bouvet</option>
                <option value="IM" {{old('country_iso2') === "IM" ? 'selected' : ""}}>Isla de Man</option>
                <option value="CX" {{old('country_iso2') === "CX" ? 'selected' : ""}}>Isla de Navidad</option>
                <option value="NF" {{old('country_iso2') === "NF" ? 'selected' : ""}}>Isla Norfolk</option>
                <option value="IS" {{old('country_iso2') === "IS" ? 'selected' : ""}}>Islandia</option>
                <option value="BM" {{old('country_iso2') === "BM" ? 'selected' : ""}}>Islas Bermudas</option>
                <option value="KY" {{old('country_iso2') === "KY" ? 'selected' : ""}}>Islas Caimán</option>
                <option value="CC" {{old('country_iso2') === "CC" ? 'selected' : ""}}>Islas Cocos (Keeling)</option>
                <option value="CK" {{old('country_iso2') === "CK" ? 'selected' : ""}}>Islas Cook</option>
                <option value="AX" {{old('country_iso2') === "AX" ? 'selected' : ""}}>Islas de Åland</option>
                <option value="FO" {{old('country_iso2') === "FO" ? 'selected' : ""}}>Islas Feroe</option>
                <option value="GS" {{old('country_iso2') === "GS" ? 'selected' : ""}}>Islas Georgias del Sur y Sandwich del Sur</option>
                <option value="HM" {{old('country_iso2') === "HM" ? 'selected' : ""}}>Islas Heard y McDonald</option>
                <option value="MV" {{old('country_iso2') === "MV" ? 'selected' : ""}}>Islas Maldivas</option>
                <option value="FK" {{old('country_iso2') === "FK" ? 'selected' : ""}}>Islas Malvinas</option>
                <option value="MP" {{old('country_iso2') === "MP" ? 'selected' : ""}}>Islas Marianas del Norte</option>
                <option value="MH" {{old('country_iso2') === "MH" ? 'selected' : ""}}>Islas Marshall</option>
                <option value="PN" {{old('country_iso2') === "PN" ? 'selected' : ""}}>Islas Pitcairn</option>
                <option value="SB" {{old('country_iso2') === "SB" ? 'selected' : ""}}>Islas Salomón</option>
                <option value="TC" {{old('country_iso2') === "TC" ? 'selected' : ""}}>Islas Turcas y Caicos</option>
                <option value="UM" {{old('country_iso2') === "UM" ? 'selected' : ""}}>Islas Ultramarinas Menores de Estados Unidos</option>
                <option value="VG" {{old('country_iso2') === "VG" ? 'selected' : ""}}>Islas Vírgenes Británicas</option>
                <option value="VI" {{old('country_iso2') === "VI" ? 'selected' : ""}}>Islas Vírgenes de los Estados Unidos</option>
                <option value="IL" {{old('country_iso2') === "IL" ? 'selected' : ""}}>Israel</option>
                <option value="IT" {{old('country_iso2') === "IT" ? 'selected' : ""}}>Italia</option>
                <option value="JM" {{old('country_iso2') === "JM" ? 'selected' : ""}}>Jamaica</option>
                <option value="JP" {{old('country_iso2') === "JP" ? 'selected' : ""}}>Japón</option>
                <option value="JE" {{old('country_iso2') === "JE" ? 'selected' : ""}}>Jersey</option>
                <option value="JO" {{old('country_iso2') === "JO" ? 'selected' : ""}}>Jordania</option>
                <option value="KZ" {{old('country_iso2') === "KZ" ? 'selected' : ""}}>Kazajistán</option>
                <option value="KE" {{old('country_iso2') === "KE" ? 'selected' : ""}}>Kenia</option>
                <option value="KG" {{old('country_iso2') === "KG" ? 'selected' : ""}}>Kirguistán</option>
                <option value="KI" {{old('country_iso2') === "KI" ? 'selected' : ""}}>Kiribati</option>
                <option value="KW" {{old('country_iso2') === "KW" ? 'selected' : ""}}>Kuwait</option>
                <option value="LB" {{old('country_iso2') === "LB" ? 'selected' : ""}}>Líbano</option>
                <option value="LA" {{old('country_iso2') === "LA" ? 'selected' : ""}}>Laos</option>
                <option value="LS" {{old('country_iso2') === "LS" ? 'selected' : ""}}>Lesoto</option>
                <option value="LV" {{old('country_iso2') === "LV" ? 'selected' : ""}}>Letonia</option>
                <option value="LR" {{old('country_iso2') === "LR" ? 'selected' : ""}}>Liberia</option>
                <option value="LY" {{old('country_iso2') === "LY" ? 'selected' : ""}}>Libia</option>
                <option value="LI" {{old('country_iso2') === "LI" ? 'selected' : ""}}>Liechtenstein</option>
                <option value="LT" {{old('country_iso2') === "LT" ? 'selected' : ""}}>Lituania</option>
                <option value="LU" {{old('country_iso2') === "LU" ? 'selected' : ""}}>Luxemburgo</option>
                <option value="MX" {{old('country_iso2') === "MX" ? 'selected' : ""}}>México</option>
                <option value="MC" {{old('country_iso2') === "MC" ? 'selected' : ""}}>Mónaco</option>
                <option value="MO" {{old('country_iso2') === "MO" ? 'selected' : ""}}>Macao</option>
                <option value="MK" {{old('country_iso2') === "MK" ? 'selected' : ""}}>Macedônia</option>
                <option value="MG" {{old('country_iso2') === "MG" ? 'selected' : ""}}>Madagascar</option>
                <option value="MY" {{old('country_iso2') === "MY" ? 'selected' : ""}}>Malasia</option>
                <option value="MW" {{old('country_iso2') === "MW" ? 'selected' : ""}}>Malawi</option>
                <option value="ML" {{old('country_iso2') === "ML" ? 'selected' : ""}}>Mali</option>
                <option value="MT" {{old('country_iso2') === "MT" ? 'selected' : ""}}>Malta</option>
                <option value="MA" {{old('country_iso2') === "MA" ? 'selected' : ""}}>Marruecos</option>
                <option value="MQ" {{old('country_iso2') === "MQ" ? 'selected' : ""}}>Martinica</option>
                <option value="MU" {{old('country_iso2') === "MU" ? 'selected' : ""}}>Mauricio</option>
                <option value="MR" {{old('country_iso2') === "MR" ? 'selected' : ""}}>Mauritania</option>
                <option value="YT" {{old('country_iso2') === "YT" ? 'selected' : ""}}>Mayotte</option>
                <option value="FM" {{old('country_iso2') === "FM" ? 'selected' : ""}}>Micronesia</option>
                <option value="MD" {{old('country_iso2') === "MD" ? 'selected' : ""}}>Moldavia</option>
                <option value="MN" {{old('country_iso2') === "MN" ? 'selected' : ""}}>Mongolia</option>
                <option value="ME" {{old('country_iso2') === "ME" ? 'selected' : ""}}>Montenegro</option>
                <option value="MS" {{old('country_iso2') === "MS" ? 'selected' : ""}}>Montserrat</option>
                <option value="MZ" {{old('country_iso2') === "MZ" ? 'selected' : ""}}>Mozambique</option>
                <option value="NA" {{old('country_iso2') === "NA" ? 'selected' : ""}}>Namibia</option>
                <option value="NR" {{old('country_iso2') === "NR" ? 'selected' : ""}}>Nauru</option>
                <option value="NP" {{old('country_iso2') === "NP" ? 'selected' : ""}}>Nepal</option>
                <option value="NI" {{old('country_iso2') === "NI" ? 'selected' : ""}}>Nicaragua</option>
                <option value="NE" {{old('country_iso2') === "NE" ? 'selected' : ""}}>Niger</option>
                <option value="NG" {{old('country_iso2') === "NG" ? 'selected' : ""}}>Nigeria</option>
                <option value="NU" {{old('country_iso2') === "NU" ? 'selected' : ""}}>Niue</option>
                <option value="NO" {{old('country_iso2') === "NO" ? 'selected' : ""}}>Noruega</option>
                <option value="NC" {{old('country_iso2') === "NC" ? 'selected' : ""}}>Nueva Caledonia</option>
                <option value="NZ" {{old('country_iso2') === "NZ" ? 'selected' : ""}}>Nueva Zelanda</option>
                <option value="OM" {{old('country_iso2') === "OM" ? 'selected' : ""}}>Omán</option>
                <option value="NL" {{old('country_iso2') === "NL" ? 'selected' : ""}}>Países Bajos</option>
                <option value="PK" {{old('country_iso2') === "PK" ? 'selected' : ""}}>Pakistán</option>
                <option value="PW" {{old('country_iso2') === "PW" ? 'selected' : ""}}>Palau</option>
                <option value="PS" {{old('country_iso2') === "PS" ? 'selected' : ""}}>Palestina</option>
                <option value="PA" {{old('country_iso2') === "PA" ? 'selected' : ""}}>Panamá</option>
                <option value="PG" {{old('country_iso2') === "PG" ? 'selected' : ""}}>Papúa Nueva Guinea</option>
                <option value="PY" {{old('country_iso2') === "PY" ? 'selected' : ""}}>Paraguay</option>
                <option value="PE" {{old('country_iso2') === "PE" ? 'selected' : ""}}>Perú</option>
                <option value="PF" {{old('country_iso2') === "PF" ? 'selected' : ""}}>Polinesia Francesa</option>
                <option value="PL" {{old('country_iso2') === "PL" ? 'selected' : ""}}>Polonia</option>
                <option value="PT" {{old('country_iso2') === "PT" ? 'selected' : ""}}>Portugal</option>
                <option value="PR" {{old('country_iso2') === "PR" ? 'selected' : ""}}>Puerto Rico</option>
                <option value="QA" {{old('country_iso2') === "QA" ? 'selected' : ""}}>Qatar</option>
                <option value="GB" {{old('country_iso2') === "GB" ? 'selected' : ""}}>Reino Unido</option>
                <option value="CF" {{old('country_iso2') === "CF" ? 'selected' : ""}}>República Centroafricana</option>
                <option value="CZ" {{old('country_iso2') === "CZ" ? 'selected' : ""}}>República Checa</option>
                <option value="DO" {{old('country_iso2') === "DO" ? 'selected' : ""}}>República Dominicana</option>
                <option value="SS" {{old('country_iso2') === "SS" ? 'selected' : ""}}>República de Sudán del Sur</option>
                <option value="RE" {{old('country_iso2') === "RE" ? 'selected' : ""}}>Reunión</option>
                <option value="RW" {{old('country_iso2') === "RW" ? 'selected' : ""}}>Ruanda</option>
                <option value="RO" {{old('country_iso2') === "RO" ? 'selected' : ""}}>Rumanía</option>
                <option value="RU" {{old('country_iso2') === "RU" ? 'selected' : ""}}>Rusia</option>
                <option value="EH" {{old('country_iso2') === "EH" ? 'selected' : ""}}>Sahara Occidental</option>
                <option value="WS" {{old('country_iso2') === "WS" ? 'selected' : ""}}>Samoa</option>
                <option value="AS" {{old('country_iso2') === "AS" ? 'selected' : ""}}>Samoa Americana</option>
                <option value="BL" {{old('country_iso2') === "BL" ? 'selected' : ""}}>San Bartolomé</option>
                <option value="KN" {{old('country_iso2') === "KN" ? 'selected' : ""}}>San Cristóbal y Nieves</option>
                <option value="SM" {{old('country_iso2') === "SM" ? 'selected' : ""}}>San Marino</option>
                <option value="MF" {{old('country_iso2') === "MF" ? 'selected' : ""}}>San Martín (Francia)</option>
                <option value="PM" {{old('country_iso2') === "PM" ? 'selected' : ""}}>San Pedro y Miquelón</option>
                <option value="VC" {{old('country_iso2') === "VC" ? 'selected' : ""}}>San Vicente y las Granadinas</option>
                <option value="SH" {{old('country_iso2') === "SH" ? 'selected' : ""}}>Santa Elena</option>
                <option value="LC" {{old('country_iso2') === "LC" ? 'selected' : ""}}>Santa Lucía</option>
                <option value="ST" {{old('country_iso2') === "ST" ? 'selected' : ""}}>Santo Tomé y Príncipe</option>
                <option value="SN" {{old('country_iso2') === "SN" ? 'selected' : ""}}>Senegal</option>
                <option value="RS" {{old('country_iso2') === "RS" ? 'selected' : ""}}>Serbia</option>
                <option value="SC" {{old('country_iso2') === "SC" ? 'selected' : ""}}>Seychelles</option>
                <option value="SL" {{old('country_iso2') === "SL" ? 'selected' : ""}}>Sierra Leona</option>
                <option value="SG" {{old('country_iso2') === "SG" ? 'selected' : ""}}>Singapur</option>
                <option value="SX" {{old('country_iso2') === "SX" ? 'selected' : ""}}>Sint Maarten</option>
                <option value="SY" {{old('country_iso2') === "SY" ? 'selected' : ""}}>Siria</option>
                <option value="SO" {{old('country_iso2') === "SO" ? 'selected' : ""}}>Somalia</option>
                <option value="LK" {{old('country_iso2') === "LK" ? 'selected' : ""}}>Sri lanka</option>
                <option value="ZA" {{old('country_iso2') === "ZA" ? 'selected' : ""}}>Sudáfrica</option>
                <option value="SD" {{old('country_iso2') === "SD" ? 'selected' : ""}}>Sudán</option>
                <option value="SE" {{old('country_iso2') === "SE" ? 'selected' : ""}}>Suecia</option>
                <option value="CH" {{old('country_iso2') === "CH" ? 'selected' : ""}}>Suiza</option>
                <option value="SR" {{old('country_iso2') === "SR" ? 'selected' : ""}}>Surinám</option>
                <option value="SJ" {{old('country_iso2') === "SJ" ? 'selected' : ""}}>Svalbard y Jan Mayen</option>
                <option value="SZ" {{old('country_iso2') === "SZ" ? 'selected' : ""}}>Swazilandia</option>
                <option value="TJ" {{old('country_iso2') === "TJ" ? 'selected' : ""}}>Tayikistán</option>
                <option value="TH" {{old('country_iso2') === "TH" ? 'selected' : ""}}>Tailandia</option>
                <option value="TW" {{old('country_iso2') === "TW" ? 'selected' : ""}}>Taiwán</option>
                <option value="TZ" {{old('country_iso2') === "TZ" ? 'selected' : ""}}>Tanzania</option>
                <option value="IO" {{old('country_iso2') === "IO" ? 'selected' : ""}}>Territorio Británico del Océano Índico</option>
                <option value="TF" {{old('country_iso2') === "TF" ? 'selected' : ""}}>Territorios Australes y Antárticas Franceses</option>
                <option value="TL" {{old('country_iso2') === "TL" ? 'selected' : ""}}>Timor Oriental</option>
                <option value="TG" {{old('country_iso2') === "TG" ? 'selected' : ""}}>Togo</option>
                <option value="TK" {{old('country_iso2') === "TK" ? 'selected' : ""}}>Tokelau</option>
                <option value="TO" {{old('country_iso2') === "TO" ? 'selected' : ""}}>Tonga</option>
                <option value="TT" {{old('country_iso2') === "TT" ? 'selected' : ""}}>Trinidad y Tobago</option>
                <option value="TN" {{old('country_iso2') === "TN" ? 'selected' : ""}}>Tunez</option>
                <option value="TM" {{old('country_iso2') === "TM" ? 'selected' : ""}}>Turkmenistán</option>
                <option value="TR" {{old('country_iso2') === "TR" ? 'selected' : ""}}>Turquía</option>
                <option value="TV" {{old('country_iso2') === "TV" ? 'selected' : ""}}>Tuvalu</option>
                <option value="UA" {{old('country_iso2') === "UA" ? 'selected' : ""}}>Ucrania</option>
                <option value="UG" {{old('country_iso2') === "UG" ? 'selected' : ""}}>Uganda</option>
                <option value="UY" {{old('country_iso2') === "UY" ? 'selected' : ""}}>Uruguay</option>
                <option value="UZ" {{old('country_iso2') === "UZ" ? 'selected' : ""}}>Uzbekistán</option>
                <option value="VU" {{old('country_iso2') === "VU" ? 'selected' : ""}}>Vanuatu</option>
                <option value="VE" {{old('country_iso2') === "VE" ? 'selected' : ""}}>Venezuela</option>
                <option value="VN" {{old('country_iso2') === "VN" ? 'selected' : ""}}>Vietnam</option>
                <option value="WF" {{old('country_iso2') === "WF" ? 'selected' : ""}}>Wallis y Futuna</option>
                <option value="YE" {{old('country_iso2') === "YE" ? 'selected' : ""}}>Yemen</option>
                <option value="DJ" {{old('country_iso2') === "DJ" ? 'selected' : ""}}>Yibuti</option>
                <option value="ZM" {{old('country_iso2') === "ZM" ? 'selected' : ""}}>Zambia</option>
                <option value="ZW" {{old('country_iso2') === "ZW" ? 'selected' : ""}}>Zimbabue</option>
            </select>
            <x-jet-input-error for="country_iso2" class="mt-2" />
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            Suscripción FID: 
            <b>
                @php
                    switch (auth()->user()->level_fidsub) {
                        case 0:
                            echo('Gratis');
                            break;
                        case 1:
                            echo('Nivel 1');
                            break;
                        case 2:
                            echo('Nivel 2');
                            break;
                        case 3:
                            echo('Nivel 3');
                            break;
                    }
                @endphp
            </b>
        </div>


        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            Suscripción al Proyecto Divina Pastora de Almas: 
            <b>
                @php
                    switch (auth()->user()->level_dpasub) {
                        case 0:
                            echo('Gratis');
                            break;
                        case 1:
                            echo('Nivel 1');
                            break;
                        case 2:
                            echo('Nivel 2');
                            break;
                        case 3:
                            echo('Nivel 3');
                            break;
                    }
                @endphp
            </b>
        </div>

        <!-- Phone -->
        <div class="col-span-6 sm:col-span-4">
            Suscripción al proyecto Juan del Rincón: 
            <b>
                @php
                    switch (auth()->user()->level_jdrsub) {
                        case 0:
                            echo('Gratis');
                            break;
                        case 1:
                            echo('Nivel 1');
                            break;
                        case 2:
                            echo('Nivel 2');
                            break;
                        case 3:
                            echo('Nivel 3');
                            break;
                    }
                @endphp
            </b>
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Guardado
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            Guardar
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
