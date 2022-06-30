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

            <div class="filasproducts row row-cols-1 row-cols-sm-2 row-cols-md-4">
                <a href="{{route('investigation.libro_familia')}}">
                    <div class="col infoproducts">
                        <img class="pageprod" src="/img/investigacion/LIBRO DE FAMILIA.png">
                        <h2>Libros de Familia</h2>
                    </div>
                </a>
                <a href="{{route('investigation.arbol_genealogico')}}">
                    <div class="col infoproducts">
                        <img class="pageprod" src="/img/investigacion/ARBOL GENEALOGICO2.png">
                        <h2>Árboles Genealógicos</h2>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <div>
    </div>

@endsection