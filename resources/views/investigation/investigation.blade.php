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
                                    <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                                <h1 class="title_notmain">{{ trans("investigation.investigation") }}</h1>
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
                        FID dispone de un amplio fondo bibliográfico y documental gestionado mediante una base de datos, que sirve de sustento para la realización de trabajos de investigación en las áreas de genealogía, historia y derecho genealógico.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img class="imglogo_subpage" src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(270deg);" />
                            <h2>{{ trans("investigation.investigation") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div style="margin:auto; width:100%;">
                <div id="sub_elementscont2">
                    <a  href="{{route('investigation.hist_unit')}}">
                        <div class="cont_redirects">
                            <span class="padicons members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                            </span>
                            <h3 class="bold">{{ trans("investigation.hist_unit") }}</h3>
                        </div>
                    </a>
                    <a  href="{{route('investigation.jurid_unit')}}">
                        <div class="cont_redirects">
                            <span class="padicons members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-gavel fa-stack-1x fa-inverse"></i>
                            </span>
                            <h3 class="bold">{{ trans("investigation.jurid_unit") }}</h3>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>

@endsection