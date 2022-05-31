@extends('layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div id="containerbackground">
                <div class="post_home_container">
                    <div class="leftdivide" style="text-align: center;">
                        <table id="main" style="text-align: center; align-content: center; margin: auto; ">
                            <tr>
                                <td>
                                    <img class="first_img" src="img/logos/logo-fid-llave.png">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <h1 class="first_key">FID</h1>
                                </td>
                            </tr>
                        </table>

                        <table id="notmain" style="text-align: center; align-content: center; margin: auto;">
                            <tr>
                                <td>
                                    <img class="first_img" src="img/logos/logo-fid-llave.png">
                                </td>
                                <td>
                                    <h1 class="first_key">FID</h1>
                                </td>
                            </tr>
                        </table>

                    </div>
                    <div class="rightdivide">
                        <p id="infomaintext">
                        {!! trans("home.welcome_txt") !!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="home_container" id="whitebg">
            <div style="position: relative;">
                <img src="/img/home/logo-overlay2r.png" class="backg-ovrl2 bigscreen ol2-r">
                <div id='departments_cont'>
                    
                    <div class="leftdivide" id="dep_info_cnt">
                        <h2 style="color:#cca766;">{{ trans("home.departments") }}</h2>
                        <p>
                        {!! trans("home.departments_txt") !!}
                        </p>
                    </div>
                    <div class="rightdivide row" id="btns_cnt_dept">
                        
                        <a class="subtext col-6 col-md-3" href="{{route('formation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.formation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('investigation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.investigation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('documentation.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.documentation") }}</h2>
                        </a><br><br>

                        <a class="subtext col-6 col-md-3" href="{{route('diffusion.home')}}">
                            <div>
                                <span class="members_index_icons fa-stack fa-2x">
                                    <i class="fas fa-circle fa-stack-2x recolor"></i>
                                    <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                                </span>
                            </div>
                            <h2 class="marger">{{ trans("home.diffusion") }}</h2>
                        </a>
                    </div>
                    <!-- Parte Responsiva -->
                </div>
            </div>
        </div>
    </div>
    <div class="bluebg">
        <img src="/img/home/logo-overlay2.png" class="backg-ovrl3 bigscreen ol2-l">
        <img src="/img/logos/vector-logo.svg" class="backg-ovrl3 smallscreen">
        <div id="div_inapastora">
            <div id="div_inapastoral" class="clmain_divpastora">
                <img src="/img/home/Divinapastora.png" id="divimg" class="changecolorpngs">
            </div>
            <div id="div_inapastorar" class="clmain_divpastora mv_cont">
                <h2>{{ trans("home.divpastora") }}</h2>
                <p style="color: white;">{{ trans("home.divpastora_txt") }}</p>
                <a class="loginbtns" id="discov_more" href="{{route('divinapastora.home')}}">Descubrir más</a>
            </div>
        </div>
        <div id="div_past_pestanas">
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
    <div id="missionvision" class="whitebg" style="position: relative;">
        <img src="/img/home/logo-overlay2.png" class="backg-ovrl2 bigscreen ol2-l">
        <img src="/img/home/logo-overlay2r.png" class="backg-ovrl2 bigscreen ol2-r">
        <img src="/img/logos/vector-logo.svg" class="backg-ovrl2 smallscreen">
        <div id="containermv">
            <h2 style="text-align: center; padding-bottom: 20px;">El FID tiene como... </h2>
            <div class="mv_cont" id="mission">
                <h2>{{ trans("home.mission") }}</h2>
                <p>{{ trans("home.mission_txt") }}</p>
            </div>
            <div class="mv_cont" id="vision">
                <h2>{{ trans("home.vision") }}</h2>
                <p>{{ trans("home.vision_txt") }}</p>
            </div>
        </div>
    </div>

@endsection