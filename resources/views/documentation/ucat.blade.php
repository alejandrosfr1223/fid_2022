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
                                <h1 class="title_notmain">{{ trans("documentation.cat_unit") }}</h1>
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
                        El equipo especializado de FID está en capacidad de organizar archivos, bibliotecas y fondos documentales de acuerdo a las normas de catalogación más adecuadas para cada proyecto.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="{{ asset('/img/logos/onebranch.png') }}" class="svgcolor" style="transform: rotate(90deg);" />
                            <h2>{{ trans("documentation.cat_unit") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection