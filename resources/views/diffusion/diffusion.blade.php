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
                                    <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("diffusion.diffusion") }}</h1>
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
                        Bajo el sello de Editorial BV, proyecta y desarrolla tres colecciones de libros destinadas a divulgar obras sobre las disciplinas que nos competen: Genealogía, Historia y Derecho.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor"/>
                            <h2>{{ trans("diffusion.diffusion") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div style="margin:auto; width:100%;">
                <div id="sub_elementscont1">
                    <a href="{{route('diffusion.editorialbv')}}">
                        <div class="cont_redirects infoproducts">
                            <img src="{{ asset('/img/bv/logo.png') }}" class="pageprod" />
                            <h3 class="bold">{{ trans("diffusion.ebv") }}</h3>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection