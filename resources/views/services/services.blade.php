@extends('/layouts/mainlayout')

@section('content')

    @if(session("payment"))
		<script type="text/javascript">
			Swal.fire({
                showCloseButton: true,
	            icon: 'success',
	            title: '¡Muchas Gracias!',
	            html: '{{ session("payment") }}',
                showDenyButton: true,
	            confirmButtonText: 'Aceptar',
                denyButtonText: 'Ver mi Factura',
	        }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                /*if (!result.isConfirmed) {
                    window.open('{{ session("paymenturl") }}', '_blank').focus();
                }*/
            });
		</script>
	@endif

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
    <div class="home_container bluebg" style="padding: 20px 0;">
        <img src="{{ asset('/img/home/logo-overlay2.png') }}" class="backg-ovrl3 bigscreen ol2-l">
        <img src="{{ asset('/img/logos/vector-logo.svg') }}" class="backg-ovrl3 smallscreen">
        <center>
            <h2 style="color:#cca766;">Servicios Disponibles</h2>
        </center>
        <div class="filasproducts row row-cols-1 row-cols-sm-2 row-cols-md-4">
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
            <a href="{{route('investigation.invalacarta')}}">
                <div class="col infoproducts">
                    <img class="pageprod" src="{{ asset('/img/lupa.png') }}">
                    <h2 style="color:#cca766;">Investigación a la carta</h2>
                </div>
            </a>
        </div>
    </div>

    <div class="home_container">
        <div style="position: relative;">
            <div class="yellowbg">
                <center>
                    <h2 style="padding:30px 0px; margin: 0 ; color:#12313a;">Suscripciones</h2>
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

                        @foreach ($productos as $i)

                            @php
                            
                            if ( $i['id_proyectsub']==0 && $i['service']==0 ){

                            @endphp

                                @auth

                                    @if (auth()->user()->level_fidsub != $i['levelsub'])

                                    <a href="{{ route('purchase.buysubscription', ['id' => $i['id']]) }}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                    @else

                                    <a class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Ya estas suscrito</button>
                                        </div>
                                    </a>

                                    @endif

                                @else

                                    <a href="{{route('login')}}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                @endif

                            @php
                            
                            }

                            @endphp

                        @endforeach

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
                        @foreach ($productos as $i)

                            @php
                            
                            if ( $i['id_proyectsub']==1 && $i['service']==0 ){

                            @endphp

                                @auth

                                    @if (auth()->user()->level_dpasub != $i['levelsub'])

                                    <a href="{{ route('purchase.buysubscription', ['id' => $i['id']]) }}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                    @else

                                    <a class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Ya estas suscrito</button>
                                        </div>
                                    </a>

                                    @endif

                                @else

                                    <a href="{{route('login')}}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                @endif

                            @php
                            
                            }

                            @endphp

                        @endforeach
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
                        @foreach ($productos as $i)

                            @php
                            
                            if ( $i['id_proyectsub']==2 && $i['service']==0 ){

                            @endphp

                                @auth

                                    @if (auth()->user()->level_jdrsub != $i['levelsub'])

                                    <a href="{{ route('purchase.buysubscription', ['id' => $i['id']]) }}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                    @else

                                    <a class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Ya estas suscrito</button>
                                        </div>
                                    </a>

                                    @endif

                                @else

                                    <a href="{{route('login')}}" class="col subscription">
                                        <div class="typesubbox">
                                            <h2 style="padding-top:20px; color:#12313a">Nivel {{ $i['levelsub'] }}</h2>
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
                                            <h2 style="padding-top:20px; color:#12313a">Precio: ${{ $i['price'] }}</h2>
                                            <button class="loginbtns" id="discov_more">Suscribirme</button>
                                        </div>
                                    </a>

                                @endif

                            @php
                            
                            }

                            @endphp

                        @endforeach
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>

@endsection