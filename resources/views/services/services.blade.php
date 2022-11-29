@extends('/layouts/mainlayout')

@section('content')

    <div class="home_container">
        <div class="submain_container">
            <table style="height: 15rem; width: 100%; text-align: center;">
                <tr>
                    <td>
                        <div class='welcomescreen'>
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                            </span>
                            <h1 class="title_notmain">Servicios y Suscripciones</h1>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="home_container" id="whitebg">
        <div style="position: relative;">
            <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
            <div id='departments_cont'>
                
                <div>
                    <h2 style="color:#cca766;">Servicios Disponibles</h2>
                    <p>
                        Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno Texto de relleno .
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="home_container bluebg">
        <img src="{{ asset('/img/home/logo-overlay2.png') }}" class="backg-ovrl3 bigscreen ol2-l">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl3 smallscreen">
        <div style="position: relative;">
            <div>
                <center>
                    <h2 style="padding-top:30px; color:#cca766;">Servicios</h2>
                </center>
            </div>
            <div id='departments_cont' style="justify-content:center">
                <div class="filasproducts row row-cols-1 row-cols-sm-2">
                    <a href="{{route('investigation.libro_familia')}}">
                        <div class="col infoproducts">
                            <img class="pageprod" src="{{ asset('/img/investigacion/LIBRO DE FAMILIA.png') }}">
                            <h2 style="color:#cca766;">Libros de Familia</h2>
                        </div>
                    </a>
                    <a href="{{route('investigation.arbol_genealogico')}}">
                        <div class="col infoproducts">
                            <img class="pageprod" src="{{ asset('/img/investigacion/ARBOL GENEALOGICO2.png') }}">
                            <h2 style="color:#cca766;">Árboles Genealógicos</h2>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="home_container">
        <div style="position: relative;">
            <div class="yellowbg">
                <center>
                    <h2 style="padding:30px 0px; color:#12313a;">Suscripciones</h2>
                </center>
            </div>
            <div style="position: relative;">
                <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
                <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl2 smallscreen">
                <div>
                    <center>
                        <h2 style="padding-top:20px; color:#12313a">FID</h2>
                        <img class="first_img" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                    </center>
                </div>
                <div id='departments_cont' style="justify-content:center">
                    <div class="filasproducts row row-cols-1 row-cols-sm-3">
                        <a href="{{ route('purchase.buysubscription', ['id' => 0]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 1</h2>
                                <img class="first_img recolorimg" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 1]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 2</h2>
                                <img class="first_img recolorimg" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 2]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 3</h2>
                                <img class="first_img recolorimg" src="{{ asset('/img/logos/logo-fid-llave.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="bluebg" style="position: relative;">
                <img src="{{ asset('/img/home/logo-overlay2.png') }}" class="backg-ovrl3 bigscreen ol2-l">
                <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl3 smallscreen">
                <center>
                    <h2 style="padding-top:20px; color:#cca766;">Proyecto Divina Pastora</h2>
                    <img class="first_img changecolorpngsyellow" src="{{ asset('/img/home/Divinapastora.png') }}">
                </center>
                <div id='departments_cont' style="justify-content:center">
                    <div class="filasproducts row row-cols-1 row-cols-sm-3">
                        <a href="{{ route('purchase.buysubscription', ['id' => 3]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 1</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/home/Divinapastora.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 4]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 2</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/home/Divinapastora.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 5]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 3</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/home/Divinapastora.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <div style="position: relative;">
                <img src="{{ asset('/img/home/logo-overlay2r.png') }}" class="backg-ovrl2 bigscreen ol2-r">
                <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl2 smallscreen">
                <div>
                
                    <center>
                        <h2 style="padding-top:20px; color:#12313a;">Proyecto Juan del Rincón</h2>
                        <img class="first_img changecolorpngsyellow" src="{{ asset('/img/juandelrincon/jdr.png') }}">
                    </center>
                </div>
                <div id='departments_cont' style="justify-content:center">
                    <div class="filasproducts row row-cols-1 row-cols-sm-3">
                        <a href="{{ route('purchase.buysubscription', ['id' => 6]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 1</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/juandelrincon/jdr.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 7]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 2</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/juandelrincon/jdr.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                        <a href="{{ route('purchase.buysubscription', ['id' => 8]) }}" class="col subscription">
                            <div class="typesubbox">
                                <h2 style="padding-top:20px; color:#12313a">Nivel 3</h2>
                                <img class="first_img changecolorpngs" src="{{ asset('/img/juandelrincon/jdr.png') }}">
                                <p style="color:#12313a">
                                    <b>Características</b><br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                    - <br>
                                </p>
                                <button class="loginbtns" id="discov_more">Suscribirme</button>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

@endsection