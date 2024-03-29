@extends('/layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div class="submain_container">
                <table style="height: 15rem; width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div class='welcomescreen'>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x"></i>
                                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("documentation.dig_books") }}</h1>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="home_container notmain" id="whitebg">
            <div id='departments_cont'>
                <div class="leftdivide" id="dep_info_cnt">
                    
                    <p>
                    FID cuenta con los medios técnicos y profesionales requeridos para la digitalización de fondos documentales y bibliográficos, aplicando para ello su experiencia en el manejo de escáneres y software especializados.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(90deg);" />
                            <h2>{{ trans("documentation.dig_books") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div id="cont-books">
                <center>
                    <h2>Digitalizaciones</h2>
                </center>
                @foreach ($books as $book)
                    @php
                        $array = json_decode($book['clasific']);
                        $disponible = json_decode($book['disponib']);
                        if (in_array("Digitalizacion1", $array)) {
                    @endphp
                    <div class="bookrow downborder">
                        <div class="books" style="margin: auto;">
                            <img style="width:90%; padding:20px; margin:auto;" src="{{ asset('/img/logos/logo-fid-llave.png') }}" />
                        </div>
                        <div class="booksinfo">
                            <h1>{{$book["titulo"]}}</h1>
                            <h3>{{$book["autor"]}}</h3>
                            <p>{{$book["notas"]}}</p>
                        </div> 
                        <div class="booksmoreinfo">
                            @php
                                if (isset($disponible)) {
                                    if(in_array('Disponible', $disponible)){
                            @endphp
                            
                            <a class="loginbtns" id='libro_{{$book["id"]}}' href='/fid/documentation/dig_books/bookdig/{{$book["id"]}}'>Descubrir más</a><br>

                            @php
                                    } else {
                            @endphp

                            <a class="loginbtns viewbook 2" id='libro_{{$book["id"]}}'>Descubrir más</a><br>

                            @php            
                                    }
                                } else {
                            @endphp
                            
                            <a class="loginbtns viewbook 3" id='libro_{{$book["id"]}}'>Descubrir más</a><br>

                            @php
                                }
                            @endphp
                            
                        </div>                   
                    </div>
                    @php
                        }
                    @endphp
                @endforeach
            </div>
        </div>
    </div>

@endsection