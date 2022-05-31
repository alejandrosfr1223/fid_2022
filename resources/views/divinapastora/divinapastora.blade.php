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
                                <h1 class="title_notmain">{{ trans("divinapastora.projectdiv") }}</h1>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="home_container notmain" id="whitebg">
            <img src="/img/home/logo-overlay2.png" class="backg-ovrl2 bigscreen ol2-l">
            <div id='pastora_cont'>
                <div class="leftdivide" id="ddivina_info_cnt">
                    <p>
                        {!! trans("divinapastora.projectdiv_txt") !!}
                    </p>
                </div>
                <div class="rightdivide" id="ddivina_info_cntr">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="/img/home/Divinapastora.png" id="divimg" class="changecolorpngs">
                            <h2>{{ trans("divinapastora.projectdiv") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
        </div>

        <div class="home_container notmain">
            <div class="row gx-0">
                <div class="col-6 col-md-3 contimgdivpast">
                    <img src="/img/divinapastora/IMG_3691.JPG" class="img-fluid imgsdivpast">
                </div>
                <div class="col-6 col-md-3 contimgdivpast">
                    <img src="/img/divinapastora/20220513_105735.jpg" class="img-fluid imgsdivpast">
                </div>
                <div class="col-6 col-md-3 contimgdivpast">
                    <img src="/img/divinapastora/20220513_100126.jpg" class="img-fluid imgsdivpast">
                </div>
                <div class="col-6 col-md-3 contimgdivpast">
                    <img src="/img/divinapastora/20220513_102017.jpg" class="img-fluid imgsdivpast">
                </div>
            </div>
        </div>

        <div class="bluebg">
            <img src="/img/home/logo-overlay2.png" class="backg-ovrl3 bigscreen ol2-l">
            <img src="/img/logos/vector-logo.svg" class="backg-ovrl3 smallscreen">
            <div id="div_past_pestanas2">
                <a href="#x" class="dp_cont">
                    <h2>{{ trans("home.dp_p_1") }}</h2>
                    <p style="color: white;">{{ trans("home.dp_p_1_txt") }}</p>
                </a>
                <a href="#x" class="dp_cont">
                    <h2>{{ trans("home.dp_p_2") }}</h2>
                    <p style="color: white;">{{ trans("home.dp_p_2_txt") }}</p>
                </a>
                <a href="#x" class="dp_cont">
                    <h2>{{ trans("home.dp_p_3") }}</h2>
                    <p style="color: white;">{{ trans("home.dp_p_3_txt") }}</p>
                </a>
            </div>
        </div>
    </div>

@endsection