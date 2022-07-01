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
                                    <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("investigation.hist_unit") }}</h1>
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img class="imglogo_subpage" src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(270deg);" />
                            <h2>{{ trans("investigation.hist_unit") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div id="cont-books">
                <center>
                    <h2>Investigaciones</h2>
                </center>
                <div class="bookrow downborder">
                    <div class="books">
                        <img style="width:100%; padding:20px;" src="{{ asset('/img/home/Divinapastora.png') }}" class="changecolorpngsyellow"/>
                    </div>
                    <div class="booksinfo">
                        <h1>{{ trans("home.divpastora") }}</h1>
                        <p>{{ trans("home.divpastora_txt") }}</p>
                    </div> 
                    <div class="booksmoreinfo">
                        <a class="loginbtns" id='goto_divinapastora'>Descubrir más</a><br>
                    </div>                   
                </div>
                <div class="bookrow downborder">
                    <div class="books">
                        <img style="width:100%; padding:20px;" src="{{ asset('/img/juandelrincon/jdr.png') }}" class="changecolorpngsyellow"/>
                    </div>
                    <div class="booksinfo">
                        <h1>{{ trans("home.jdelrincon") }}</h1>
                        <p>{{ trans("home.jdelrincon_txt") }}</p>
                    </div> 
                    <div class="booksmoreinfo">
                        <a class="loginbtns" id='goto_divinapastora'>Descubrir más</a><br>
                    </div>                   
                </div>
                @foreach ($books as $book)
                    @php
                        $array = json_decode($book['clasific']);
                        if (in_array("InvestigacionFID", $array)) {
                    @endphp
                    <div class="bookrow downborder">
                        <div class="books">
                            <img style="width:90%; padding:20px; margin:auto;" src="{{ asset('/img/logos/logo-fid-llave.png') }}" />
                        </div>
                        <div class="booksinfo">
                            <h1>{{$book["titulo"]}}</h1>
                            <h3>{{$book["autor"]}}</h3>
                            <p>{{$book["notas"]}}</p>
                        </div> 
                        <div class="booksmoreinfo">
                            <a class="loginbtns viewbook" id='libro_{{$book["id"]}}'>Descubrir más</a><br>
                        </div>                   
                    </div>
                    @php
                        }
                    @endphp
                @endforeach
            </div>
            <center>
                <h2>Servicios Disponibles</h2>
            </center>
            <div class="filasproducts row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <a href="{{route('investigation.libro_familia')}}">
                    <div class="col infoproducts">
                        <img class="pageprod" src="{{ asset('/img/investigacion/LIBRO DE FAMILIA.png') }}">
                        <h2>Libros de Familia</h2>
                    </div>
                </a>
                <a href="{{route('investigation.arbol_genealogico')}}">
                    <div class="col infoproducts">
                        <img class="pageprod" src="{{ asset('/img/investigacion/ARBOL GENEALOGICO2.png') }}">
                        <h2>Árboles Genealógicos</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div>
    </div>

@endsection