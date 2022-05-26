<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FID</title>

    <link rel="text/javascript" href="{{ URL::asset('/js/bootstrap.min.js') }}" />

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/css/stylesapp.css') }}" rel="stylesheet" type="text/css" >

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/js.js') }}"></script>
    
</head>
<body>
    @if (Route::has('login'))
        <div id="loginbuttons">
            @auth
                <div class="col-lg-6 col-md-12 mb-1 mb-md-0" id="wel_div">
                    <a>{{ trans("mainlayout.welcome") }}<b>{{auth()->user()->name}}</b></a>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0" id="but_div">
                    <a class="loginbtns" id="myaccount" name="myaccount"  href="/user/profile">{{ trans("mainlayout.myaccount") }}</a>
                    <a class="loginbtns" id="logout" name="logout"  href="{{route('logout')}}">{{ trans("mainlayout.logout") }}</a>
                </div>
            @else
                <div class="col-lg-6 col-md-12 mb-1 mb-md-0" id="wel_div">
                    <a> </a>
                </div>
                <div class="col-lg-6 col-md-12 mb-4 mb-md-0" id="but_div">
                    <a class="loginbtns" id="login" name="login"  href="{{route('login')}}">{{ trans("mainlayout.login") }}</a>
                    @if (Route::has('register'))
                        <a class="loginbtns" id="register" name="register" href="{{route('register')}}">{{ trans("mainlayout.register") }}</a>
                    @endif
                </div>
            @endauth
        </div>
    @endif
    <div id="banner">
        <center>
          <a href="{{route('home')}}" style="text-decoration: none;">
            <table style="margin-top:20px;">
                <tr>
                    <td>
                        <img src="/img/logos/logo-fid-llave.png" style="margin-right: 10px; width: 5rem;">
                    </td>
                    <td>
                        <h1 style="margin: auto; font-weight:bold; padding-left: 10px; color:#606060; font-size: 5rem; border-left: 1px #606060 solid;">FID</h1>
                    </td>
                </tr>
            </table>
          </a>
        </center>
    </div>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        
      </li>
    </ul>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: auto;">
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">{{ trans("mainlayout.home") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('formation.*') ? 'active' : '' }}" href="{{route('formation.home')}}">{{ trans("mainlayout.formation") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('investigation.*') ? 'active' : '' }}" href="{{route('investigation.home')}}">{{ trans("mainlayout.investigation") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('documentation.*') ? 'active' : '' }}" href="{{route('documentation.home')}}">{{ trans("mainlayout.documentation") }}</a>
            </li>
            @auth
                @if (Auth::user()->roles->first() == [])
                    <li class="nav-item">
                      <a class="nav-link {{ request()->routeIs('diffusion.*') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
                    </li>
                @else
                    @if (Auth::user()->roles->first()->name == "Administrador" || Auth::user()->roles->first()->name == "Operador")
                        <li class="nav-item right-border">
                          <a class="nav-link {{ request()->routeIs('diffusion.*') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="/admin">{{ trans("mainlayout.dashboard") }}</a>
                        </li>
                    @else
                        <li class="nav-item">
                          <a class="nav-link {{ request()->routeIs('diffusion.*') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
                        </li>
                    @endif
                @endif
            @else
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('diffusion.*') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
                </li>
            @endauth
            
        </div>
      </div>
    </nav>

    <div id="containermain">
        @yield('content')
    </div>

    <footer class="text-lg-start">
      <div class="containerfooter">
        <div class="row">

          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <table id="footerlogo">
                <tr>
                    <td>
                        <img class="footer_img" src="/img/logos/logo-fid-llave.png">
                    </td>
                    <td>
                        <h1 class="footer_key">FID</h1>
                    </td>
                </tr>
            </table>

            <p style="font-weight: bold; color: white; font-size: 1.2rem; display: inline-block;">
              @choice('mainlayout.phonenumbers', 2):
            </p>
            <p class="centeremojistext" style="font-weight: bold; color: white; font-size: 1.2rem; display: flex; margin:10px 0;">
              {!! Emoji::toImage(':flag_es:') !!} (+34) 911980993
            </p>
            <p class="centeremojistext" style="font-weight: bold; color: white; font-size: 1.2rem; display: flex; margin:10px 0;">
              {!! Emoji::toImage(':flag_ve:') !!} (+58) 2127201170
            </p>
            <p class="centeremojistext" style="font-weight: bold; color: white; font-size: 1.2rem; display: flex; margin:10px 0;">
              {!! Emoji::toImage(':flag_co:') !!} (+57) 0353195843
            </p>

            <br>

            <p style="font-weight: bold; color: white; font-size: 1.2rem; display: inline-block;">
              {{ trans("mainlayout.mail") }}:
            </p>
            <p class="centeremojistext" style="font-weight: bold; color: white; font-size: 1.2rem; display: flex; margin:10px 0;">
              {!! Emoji::toImage(':email:') !!} FID@sefaruniversal.com
            </p>
            
            <br>

            <p style="font-weight: bold; color: white; font-size: 1.2rem; display: inline-block;">
              <span class="fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="brand fab fa-twitter fa-stack-1x"></i>
              </span>
              <span class="fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="brand fab fa-instagram fa-stack-1x"></i>
              </span>
              <span class="fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="brand fab fa-facebook fa-stack-1x"></i>
              </span>
              <a href="#" style="margin-top: 10rem; color: #CCA766 !important; text-decoration: underline;">{{ trans("mainlayout.meetfid") }}</a>
            </p>
          </div>

          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <p style="font-weight: bold; color: #CCA766 !important; font-size: 1.2rem;">
            {{ trans("mainlayout.contactform") }}:
            </p>
              <form>
                <p class="labelcontact">
                {{ trans("mainlayout.name") }}:
                </p>
                <input class="inputs" type="text" name="fullname" id="fullname"/>
                <br>
                <p class="labelcontact">
                {{ trans("mainlayout.mail") }}:
                </p>
                <input class="inputs" type="email" name="email" id="email"/>
                <br>
                <p class="labelcontact">
                  @choice('mainlayout.phonenumbers', 1):
                </p>
                <input class="inputs" type="text" name="phone" id="phone"/>
                <br>
                <p class="labelcontact">
                {{ trans("mainlayout.contactcountry") }}:
                </p>
                <select id="country" name="country" class="inputs form-control">
                <option value="Afghanistan">Afghanistan</option>
                <option value="Åland Islands">Åland Islands</option>
                <option value="Albania">Albania</option>
                <option value="Algeria">Algeria</option>
                <option value="American Samoa">American Samoa</option>
                <option value="Andorra">Andorra</option>
                <option value="Angola">Angola</option>
                <option value="Anguilla">Anguilla</option>
                <option value="Antarctica">Antarctica</option>
                <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                <option value="Argentina">Argentina</option>
                <option value="Armenia">Armenia</option>
                <option value="Aruba">Aruba</option>
                <option value="Australia">Australia</option>
                <option value="Austria">Austria</option>
                <option value="Azerbaijan">Azerbaijan</option>
                <option value="Bahamas">Bahamas</option>
                <option value="Bahrain">Bahrain</option>
                <option value="Bangladesh">Bangladesh</option>
                <option value="Barbados">Barbados</option>
                <option value="Belarus">Belarus</option>
                <option value="Belgium">Belgium</option>
                <option value="Belize">Belize</option>
                <option value="Benin">Benin</option>
                <option value="Bermuda">Bermuda</option>
                <option value="Bhutan">Bhutan</option>
                <option value="Bolivia">Bolivia</option>
                <option value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                <option value="Botswana">Botswana</option>
                <option value="Bouvet Island">Bouvet Island</option>
                <option value="Brazil">Brazil</option>
                <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                <option value="Brunei Darussalam">Brunei Darussalam</option>
                <option value="Bulgaria">Bulgaria</option>
                <option value="Burkina Faso">Burkina Faso</option>
                <option value="Burundi">Burundi</option>
                <option value="Cambodia">Cambodia</option>
                <option value="Cameroon">Cameroon</option>
                <option value="Canada">Canada</option>
                <option value="Cape Verde">Cape Verde</option>
                <option value="Cayman Islands">Cayman Islands</option>
                <option value="Central African Republic">Central African Republic</option>
                <option value="Chad">Chad</option>
                <option value="Chile">Chile</option>
                <option value="China">China</option>
                <option value="Christmas Island">Christmas Island</option>
                <option value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                <option value="Colombia">Colombia</option>
                <option value="Comoros">Comoros</option>
                <option value="Congo">Congo</option>
                <option value="Congo, The Democratic Republic of The">Congo, The Democratic Republic of The</option>
                <option value="Cook Islands">Cook Islands</option>
                <option value="Costa Rica">Costa Rica</option>
                <option value="Cote D'ivoire">Cote D'ivoire</option>
                <option value="Croatia">Croatia</option>
                <option value="Cuba">Cuba</option>
                <option value="Cyprus">Cyprus</option>
                <option value="Czech Republic">Czech Republic</option>
                <option value="Denmark">Denmark</option>
                <option value="Djibouti">Djibouti</option>
                <option value="Dominica">Dominica</option>
                <option value="Dominican Republic">Dominican Republic</option>
                <option value="Ecuador">Ecuador</option>
                <option value="Egypt">Egypt</option>
                <option value="El Salvador">El Salvador</option>
                <option value="Equatorial Guinea">Equatorial Guinea</option>
                <option value="Eritrea">Eritrea</option>
                <option value="Estonia">Estonia</option>
                <option value="Ethiopia">Ethiopia</option>
                <option value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                <option value="Faroe Islands">Faroe Islands</option>
                <option value="Fiji">Fiji</option>
                <option value="Finland">Finland</option>
                <option value="France">France</option>
                <option value="French Guiana">French Guiana</option>
                <option value="French Polynesia">French Polynesia</option>
                <option value="French Southern Territories">French Southern Territories</option>
                <option value="Gabon">Gabon</option>
                <option value="Gambia">Gambia</option>
                <option value="Georgia">Georgia</option>
                <option value="Germany">Germany</option>
                <option value="Ghana">Ghana</option>
                <option value="Gibraltar">Gibraltar</option>
                <option value="Greece">Greece</option>
                <option value="Greenland">Greenland</option>
                <option value="Grenada">Grenada</option>
                <option value="Guadeloupe">Guadeloupe</option>
                <option value="Guam">Guam</option>
                <option value="Guatemala">Guatemala</option>
                <option value="Guernsey">Guernsey</option>
                <option value="Guinea">Guinea</option>
                <option value="Guinea-bissau">Guinea-bissau</option>
                <option value="Guyana">Guyana</option>
                <option value="Haiti">Haiti</option>
                <option value="Heard Island and Mcdonald Islands">Heard Island and Mcdonald Islands</option>
                <option value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                <option value="Honduras">Honduras</option>
                <option value="Hong Kong">Hong Kong</option>
                <option value="Hungary">Hungary</option>
                <option value="Iceland">Iceland</option>
                <option value="India">India</option>
                <option value="Indonesia">Indonesia</option>
                <option value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                <option value="Iraq">Iraq</option>
                <option value="Ireland">Ireland</option>
                <option value="Isle of Man">Isle of Man</option>
                <option value="Israel">Israel</option>
                <option value="Italy">Italy</option>
                <option value="Jamaica">Jamaica</option>
                <option value="Japan">Japan</option>
                <option value="Jersey">Jersey</option>
                <option value="Jordan">Jordan</option>
                <option value="Kazakhstan">Kazakhstan</option>
                <option value="Kenya">Kenya</option>
                <option value="Kiribati">Kiribati</option>
                <option value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic of</option>
                <option value="Korea, Republic of">Korea, Republic of</option>
                <option value="Kuwait">Kuwait</option>
                <option value="Kyrgyzstan">Kyrgyzstan</option>
                <option value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                <option value="Latvia">Latvia</option>
                <option value="Lebanon">Lebanon</option>
                <option value="Lesotho">Lesotho</option>
                <option value="Liberia">Liberia</option>
                <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                <option value="Liechtenstein">Liechtenstein</option>
                <option value="Lithuania">Lithuania</option>
                <option value="Luxembourg">Luxembourg</option>
                <option value="Macao">Macao</option>
                <option value="Macedonia, The Former Yugoslav Republic of">Macedonia, The Former Yugoslav Republic of</option>
                <option value="Madagascar">Madagascar</option>
                <option value="Malawi">Malawi</option>
                <option value="Malaysia">Malaysia</option>
                <option value="Maldives">Maldives</option>
                <option value="Mali">Mali</option>
                <option value="Malta">Malta</option>
                <option value="Marshall Islands">Marshall Islands</option>
                <option value="Martinique">Martinique</option>
                <option value="Mauritania">Mauritania</option>
                <option value="Mauritius">Mauritius</option>
                <option value="Mayotte">Mayotte</option>
                <option value="Mexico">Mexico</option>
                <option value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                <option value="Moldova, Republic of">Moldova, Republic of</option>
                <option value="Monaco">Monaco</option>
                <option value="Mongolia">Mongolia</option>
                <option value="Montenegro">Montenegro</option>
                <option value="Montserrat">Montserrat</option>
                <option value="Morocco">Morocco</option>
                <option value="Mozambique">Mozambique</option>
                <option value="Myanmar">Myanmar</option>
                <option value="Namibia">Namibia</option>
                <option value="Nauru">Nauru</option>
                <option value="Nepal">Nepal</option>
                <option value="Netherlands">Netherlands</option>
                <option value="Netherlands Antilles">Netherlands Antilles</option>
                <option value="New Caledonia">New Caledonia</option>
                <option value="New Zealand">New Zealand</option>
                <option value="Nicaragua">Nicaragua</option>
                <option value="Niger">Niger</option>
                <option value="Nigeria">Nigeria</option>
                <option value="Niue">Niue</option>
                <option value="Norfolk Island">Norfolk Island</option>
                <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                <option value="Norway">Norway</option>
                <option value="Oman">Oman</option>
                <option value="Pakistan">Pakistan</option>
                <option value="Palau">Palau</option>
                <option value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                <option value="Panama">Panama</option>
                <option value="Papua New Guinea">Papua New Guinea</option>
                <option value="Paraguay">Paraguay</option>
                <option value="Peru">Peru</option>
                <option value="Philippines">Philippines</option>
                <option value="Pitcairn">Pitcairn</option>
                <option value="Poland">Poland</option>
                <option value="Portugal">Portugal</option>
                <option value="Puerto Rico">Puerto Rico</option>
                <option value="Qatar">Qatar</option>
                <option value="Reunion">Reunion</option>
                <option value="Romania">Romania</option>
                <option value="Russian Federation">Russian Federation</option>
                <option value="Rwanda">Rwanda</option>
                <option value="Saint Helena">Saint Helena</option>
                <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                <option value="Saint Lucia">Saint Lucia</option>
                <option value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                <option value="Saint Vincent and The Grenadines">Saint Vincent and The Grenadines</option>
                <option value="Samoa">Samoa</option>
                <option value="San Marino">San Marino</option>
                <option value="Sao Tome and Principe">Sao Tome and Principe</option>
                <option value="Saudi Arabia">Saudi Arabia</option>
                <option value="Senegal">Senegal</option>
                <option value="Serbia">Serbia</option>
                <option value="Seychelles">Seychelles</option>
                <option value="Sierra Leone">Sierra Leone</option>
                <option value="Singapore">Singapore</option>
                <option value="Slovakia">Slovakia</option>
                <option value="Slovenia">Slovenia</option>
                <option value="Solomon Islands">Solomon Islands</option>
                <option value="Somalia">Somalia</option>
                <option value="South Africa">South Africa</option>
                <option value="South Georgia and The South Sandwich Islands">South Georgia and The South Sandwich Islands</option>
                <option value="Spain">Spain</option>
                <option value="Sri Lanka">Sri Lanka</option>
                <option value="Sudan">Sudan</option>
                <option value="Suriname">Suriname</option>
                <option value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                <option value="Swaziland">Swaziland</option>
                <option value="Sweden">Sweden</option>
                <option value="Switzerland">Switzerland</option>
                <option value="Syrian Arab Republic">Syrian Arab Republic</option>
                <option value="Taiwan">Taiwan</option>
                <option value="Tajikistan">Tajikistan</option>
                <option value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                <option value="Thailand">Thailand</option>
                <option value="Timor-leste">Timor-leste</option>
                <option value="Togo">Togo</option>
                <option value="Tokelau">Tokelau</option>
                <option value="Tonga">Tonga</option>
                <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                <option value="Tunisia">Tunisia</option>
                <option value="Turkey">Turkey</option>
                <option value="Turkmenistan">Turkmenistan</option>
                <option value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                <option value="Tuvalu">Tuvalu</option>
                <option value="Uganda">Uganda</option>
                <option value="Ukraine">Ukraine</option>
                <option value="United Arab Emirates">United Arab Emirates</option>
                <option value="United Kingdom">United Kingdom</option>
                <option value="United States">United States</option>
                <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                <option value="Uruguay">Uruguay</option>
                <option value="Uzbekistan">Uzbekistan</option>
                <option value="Vanuatu">Vanuatu</option>
                <option value="Venezuela">Venezuela</option>
                <option value="Viet Nam">Viet Nam</option>
                <option value="Virgin Islands, British">Virgin Islands, British</option>
                <option value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                <option value="Wallis and Futuna">Wallis and Futuna</option>
                <option value="Western Sahara">Western Sahara</option>
                <option value="Yemen">Yemen</option>
                <option value="Zambia">Zambia</option>
                <option value="Zimbabwe">Zimbabwe</option>
            </select>
                <p class="labelcontact">
                {{ trans("mainlayout.subject") }}:
                </p>
                <input class="inputs" type="text" name="suject" id="subject"/>
                <p class="labelcontact">
                {{ trans("mainlayout.message") }}:
                </p>
                <textarea class="inputs" type="text" name="message" id="message"> </textarea>
                <br>
                <button id="send" name="send">{{ trans("mainlayout.send") }}</button>
              </form>
          </div>

        </div>
      </div>
    </footer>

<div id="ajax_div" style="width: 100vw; height: 100vh; top:0; left:0; position:fixed; overflow: hidden; background-color:rgba(0,0,0,0.4); z-index:2000; display:none;">
</div>

</body>
</html>