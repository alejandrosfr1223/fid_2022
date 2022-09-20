@extends('/layouts/mainlayout')

@section('content')

    @php
        $array = json_decode($curso);
        $disponible = json_decode($array->disponib);
        $clasific = json_decode($array->clasific);
        if (!in_array("Disponible", $disponible) || !in_array("Curso", $clasific)) {
            header("Location: /fid/formation/courses");
            die();
        }
    @endphp

    <style>
        #bookinfo, #bookdesc{
            width: 85%;
            margin: auto;
            padding: 25px 0;
        }
        .marginauto{
            margin: auto;
        }
        .displaymobile{
            display: flex;
        }
        .books2 {
            text-align: center;
            width: 225px !important;
            transition: 0.5s;
            position: relative;
        }
        .botones-d{
            width: 280px !important;
            min-width: 280px !important;
        }
        #img_carátula img{
            margin: auto 0px auto 1rem; width: 172px;
            min-width: 172px;
        }
        .titleinfo{
            padding-left:2rem;
            text-align: left;
        }
        .titleinfo h1, .titleinfo h3{
            padding: 0px 25px;
        }
        @media screen and (max-width: 990px) {
            .displaymobile{
                display: block;
            }
            .titleinfo{
                margin: 25px 0px;
                padding-left:0;
                text-align: center;
            }
            .books2 {
                margin: auto;
            }
            #bookdesc{
                text-align: left;
            }
            #img_carátula img{
                margin: auto auto auto auto; width: 80%;
                min-width: 0px;
            }
            .botones-d{
                width: 100% !important;
                min-width: 0px !important;
            }
            .titleinfo h1, .titleinfo h3{
            padding: 0px 0px;
            }
        }
    </style>

    <div id="bookinfo" class="displaymobile">
        <div class="displaymobile">
            <div id="img_carátula" class="marginauto displaymobile">
                <img src='{{ asset("/img/logos/logo-fid-llave.png") }}' style="">                
            </div>
            <div class="marginauto titleinfo">
                <h1>
                    {{$curso["titulo"]}}
                </h1>
                <h3>
                    {{$curso["ponente"]}}
                </h3>
            </div>
        </div>
        <div class="marginauto botones-d">
            @php
                if ($curso["precio"] == "0" || $curso["precio"] == 0){
            @endphp
                <center>
                    <h3>Costo: <b>Gratis</b></h3>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="#">Acceder al Curso</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="{{route('login')}}">Acceder al Curso</a>
                        @endauth
                    @endif
                </center>
            @php
                } else {
            @endphp
                <center>
                    <h3>Costo: <b>{{ $curso["precio"] }}$</b></h3>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="#">Acceder al Curso</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="{{route('login')}}">Acceder al Curso</a>
                        @endauth
                    @endif
                </center>
            @php
                }
            @endphp
        </div>
    </div>
    <div id="bookdesc" class="marginauto" style="border-top: solid 1px #000000;">
        <center>
            <h1>Descripción</h1>
        </center>
        <p>
            @php
                print($curso["descripcion"]);
            @endphp
        </p>
    </div>

@endsection