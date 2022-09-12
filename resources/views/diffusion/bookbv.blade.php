@extends('/layouts/mainlayout')

@section('content')

    @php
        $array = json_decode($book);
        $disponible = json_decode($array->disponib);
        $clasific = json_decode($array->clasific);
        if (!in_array("Disponible", $disponible) || !in_array("EditorialBV", $clasific)) {
            header("Location: /fid/diffusion/editorialbv");
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
        @media screen and (max-width: 990px) {
            .displaymobile{
                display: block;
            }
            .titleinfo{
                margin: 25px 0px;
                text-align: center;
            }
            .books2 {
                margin: auto;
            }
            #bookdesc{
                text-align: center;
            }
        }
    </style>

    <div id="bookinfo" class="displaymobile">
        <div class="displaymobile">
            <div id="img_carátula" class="marginauto displaymobile">
                @php
                    if (is_null($array->url_img_caratula)){
                @endphp

                <div class="books2">
                    <div class="book-cover">
                        <div class="info">
                            <p class="book-title">{{$book["titulo"]}}</p>
                            <br><br><br>
                            <p class="book-author">{{$book["autor"]}}</p>
                        </div>
                    </div>
                </div>

                @php
                    } else {
                @endphp
                
                <img src='{{$book["url_img_caratula"]}}' style="margin-left: 0px 10px 0px 40px; width: 172px;">
                
                @php
                    }
                @endphp
                
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
        <div class="marginauto">
            @php
                if ($book["precio"] == "0" || $book["precio"] == 0){
            @endphp
                <center>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 80%;" id="discov_more2" href="#">Descargar Gratis</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 80%;" id="discov_more2" href="{{route('login')}}">Descargar Gratis</a>
                        @endauth
                    @endif
                    
                    <a class="loginbtns" style="padding:0 15px; max-width: 80%;" id="discov_more2" href="#">Previsualizar</a>
                </center>
            @php
                } else {
            @endphp
                <center>
                    <h3>Precio: <b>{{ $book["precio"] }}$</b></h3>
                    @if (Route::has('login'))
                        @auth
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 80%;" id="discov_more2" href="#">Añadir al Carrito</a>
                        @else
                            <a class="loginbtns" style="padding:0 15px; margin:0; max-width: 80%;" id="discov_more2" href="{{route('login')}}">Añadir al Carrito</a>
                        @endauth
                    @endif
                    
                    <a class="loginbtns" style="padding:0 15px; max-width: 80%;" id="discov_more2" href="#">Previsualizar</a>
                </center>
            @php
                }
            @endphp
        </div>
    </div>
    <div id="bookdesc" class="marginauto" style="border-top: solid 1px #000000;">
        <h1>Descripción</h1>
        <p>
            @php
                if (is_null($array->notas)){
                    print($book["titulo"]);
                } else {
                    print($book["notas"]);
                }
            @endphp
        </p>
    </div>

@endsection