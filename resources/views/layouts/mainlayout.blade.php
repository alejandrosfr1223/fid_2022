<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FID</title>

    <link href="{{ asset('/css/app.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/css/stylesapp.css') }}" rel="stylesheet" type="text/css" >

    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/js/js.js') }}"></script>
</head>
<body>
    @if (Route::has('login'))
        <div id="loginbuttons">
            @auth
                <a>{{ trans("mainlayout.welcome") }}<b>{{auth()->user()->name}}</b></a>
                <a class="loginbtns" id="logout" name="logout"  href="{{route('logout')}}">{{ trans("mainlayout.logout") }}</a>
            @else
                <a class="loginbtns" id="login" name="login"  href="{{route('login')}}">{{ trans("mainlayout.login") }}</a>
                @if (Route::has('register'))
                    <a class="loginbtns" id="register" name="register" href="{{route('register')}}">{{ trans("mainlayout.register") }}</a>
                @endif
            @endauth
        </div>
    @endif
    <div id="banner">
        <center>
            <table style="margin-top:20px;">
                <tr>
                    <td>
                        <img src="img/logos/logo-fid-llave.png" style="margin-right: 10px; width: 5rem;">
                    </td>
                    <td>
                        <h1 style="font-weight:bold; padding-left: 10px; color:#606060; font-size: 5rem; border-left: 1px #606060 solid;">FID</h1>
                    </td>
                </tr>
            </table>
        </center>
    </div>
    <ul class="nav justify-content-center">
      <li class="nav-item">
        
      </li>
    </ul>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="margin: auto;">
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{route('home')}}">{{ trans("mainlayout.home") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('formation.home') ? 'active' : '' }}" href="{{route('formation.home')}}">{{ trans("mainlayout.formation") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('investigation.home') ? 'active' : '' }}" href="{{route('investigation.home')}}">{{ trans("mainlayout.investigation") }}</a>
            </li>
            <li class="nav-item right-border">
              <a class="nav-link {{ request()->routeIs('documentation.home') ? 'active' : '' }}" href="{{route('documentation.home')}}">{{ trans("mainlayout.documentation") }}</a>
            </li>
            @auth
                <li class="nav-item right-border">
                  <a class="nav-link {{ request()->routeIs('diffusion.home') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">{{ trans("mainlayout.dashboard") }}</a>
                </li>
            @else
                <li class="nav-item">
                  <a class="nav-link {{ request()->routeIs('diffusion.home') ? 'active' : '' }}" href="{{route('diffusion.home')}}">{{ trans("mainlayout.diffussion") }}</a>
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
                        <img class="footer_img" src="img/logos/logo-fid-llave.png">
                    </td>
                    <td>
                        <h1 class="footer_key">FID</h1>
                    </td>
                </tr>
            </table>
            <p style="font-weight: bold; color: white; font-size: 1.2rem;">
              @choice('mainlayout.phonenumbers', 2):<br>
              🇪🇸 (+34 911980993)<br>
              🇻🇪 (+58 2127201170)<br>
              🇨🇴 (+57 0353195843)<br>
              <br>
              {{ trans("mainlayout.mail") }}:<br>
              FID@sefaruniversal.com<br>
              <br>
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
                <input class="inputs" type="mail" name="mail" id="mail"/>
                <br>
                <p class="labelcontact">
                  @choice('mainlayout.phonenumbers', 1):
                </p>
                <input class="inputs" type="text" name="phone" id="phone"/>
                <br>
                <p class="labelcontact">
                {{ trans("mainlayout.contactcountry") }}:
                </p>
                <input class="inputs" type="text" name="country" id="country"/>
                <br>
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