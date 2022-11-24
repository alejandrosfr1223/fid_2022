<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FID</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('/favicon.ico') }}">

    <link rel="text/javascript" href="{{ asset('/js/bootstrap.min.js') }}" />

    <link href="{{ asset('/css/app.css') }}?2" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/css/imgdeclare.css') }}?2" rel="stylesheet" type="text/css" >
    <link href="{{ asset('/css/stylesapp.css') }}?2" rel="stylesheet" type="text/css" >

    <script type="text/javascript" src="{{ asset('/js/app.js') }}?2"></script>
    <script type="text/javascript" src="{{ asset('/js/js.js') }}?2"></script>
    
</head>
<body>
    <div id="banner">
        <center>
          <a href="{{route('home')}}" style="text-decoration: none;">
            <table style="margin-top:20px;">
                <tr>
                    <td>
                        <img src="{{ asset('/img/logos/logo-fid-llave.png') }}" style="margin-right: 10px; width: 5rem;">
                    </td>
                    <td>
                        <h1 style="margin: auto; font-weight:bold; padding-left: 10px; color:#606060; font-size: 5rem; border-left: 1px #606060 solid;">FID</h1>
                    </td>
                </tr>
            </table>
          </a>
        </center>
    </div>

    <div id="containermain" style="align-items:center; margin: 30px auto; text-align: center; align-content: center;">
       ¡Usuario Registrado Correctamente!
    </div>

    <footer class="text-lg-start">
      <div class="containerfooter">
        <div class="row">

          <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
            <table id="footerlogo">
                <tr>
                    <td>
                        <img class="footer_img" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
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

        </div>
      </div>
    </footer>

</body>
</html>