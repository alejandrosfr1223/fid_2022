@extends('/layouts/mainlayout')

@section('content')

    @php
        $array = json_decode($book);
        $disponible = json_decode($array->disponib);
        $clasific = json_decode($array->clasific);
        if (!in_array("Disponible", $disponible) || !in_array("Digitalizacion1", $clasific)) {
            header("Location: /fid/diffusion/editorialbv");
            die();
        }
    @endphp

    <style>
        #bookinfo, #bookdesc, #bookimg{
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
        .imgcontainer{
            margin: auto;
            display: flex;
        }
        .img_show_page{
            width: 25%;
            padding: 20px 45px;
            transition: 0.5s;
            transform: scale(1);
        }

        .img_show_page:hover{
            transform: scale(1.05);
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
                    {{$book["titulo"]}}
                </h1>
                <h3>
                    {{$book["autor"]}}
                </h3>
            </div>
        </div>
        <div class="marginauto botones-d">
            @php
                if ($book["precio"] == "0" || $book["precio"] == 0){
            @endphp
                <center>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="#">Descargar Gratis</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="{{route('login')}}">Descargar Gratis</a>
                        @endauth
                    @endif
                    
                    <a class="loginbtns" style="padding:0 15px; max-width: 100%;" id="discov_more2" href="#">Previsualizar</a>
                </center>
            @php
                } else {
            @endphp
                <center>
                    <h3>Precio: <b>{{ $book["precio"] }}$</b></h3>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="#">Añadir al Carrito</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 100%;" id="discov_more2" href="{{route('login')}}">Añadir al Carrito</a>
                        @endauth
                    @endif
                    
                    <a class="loginbtns" style="padding:0 15px; max-width: 100%;" id="discov_more2" href="#">Previsualizar</a>
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
                print($book["notas"]);
            @endphp
        </p>
    </div>


    @php
        if($book["img_1"]!=null || $book["img_2"]!=null || $book["img_3"]!=null || $book["img_4"]!=null){
    @endphp
    <div id="bookimg" class="marginauto" style="border-top: solid 1px #000000;">
        <center>
            <h1 style="margin:0 !important;">Imágenes</h1>
        </center>
        <div class="imgcontainer">
            @php
                if($book["img_1"]!=null){
            @endphp
                    <img src='{{ asset("/storage/".$book["img_1"]) }}' id="img_1" class="img_show_page">
            @php
                }

                if($book["img_2"]!=null){
            @endphp
                    <img src='{{ asset("/storage/".$book["img_2"]) }}' id="img_2" class="img_show_page">
            @php
                }
                
                if($book["img_3"]!=null){
            @endphp
                    <img src='{{ asset("/storage/".$book["img_3"]) }}' id="img_3" class="img_show_page">
            @php
                }
                
                if($book["img_4"]!=null){
            @endphp
                    <img src='{{ asset("/storage/".$book["img_4"]) }}' id="img_4" class="img_show_page">
            @php
                }
            @endphp
        </div>
    </div>

    @php
        }
    @endphp

@endsection