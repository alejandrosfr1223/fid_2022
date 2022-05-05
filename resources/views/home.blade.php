@extends('layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div id="containerbackground">
                <div class="post_home_container">
                    <div class="leftdivide">
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
            <div id='departments_cont'>
                <div class="leftdivide" id="dep_info_cnt">
                    <h2>{{ trans("home.departments") }}</h2>
                    <p>
                    {!! trans("home.departments_txt") !!}
                    </p>
                </div>
                <div class="rightdivide" id="btns_cnt_dept">
                    
                    <a class="subtext" href="{{route('formation.home')}}">
                        <div>
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x recolor"></i>
                                <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <h2 class="marger">{{ trans("home.formation") }}</h2>
                    </a><br><br>

                    <a class="subtext" href="{{route('investigation.home')}}">
                        <div>
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x recolor"></i>
                                <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <h2 class="marger">{{ trans("home.investigation") }}</h2>
                    </a><br><br>

                    <a class="subtext" href="{{route('documentation.home')}}">
                        <div>
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x recolor"></i>
                                <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                            </span>
                        </div>
                        <h2 class="marger">{{ trans("home.documentation") }}</h2>
                    </a><br><br>

                    <a class="subtext" href="{{route('diffusion.home')}}">
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
    <div id="missionvision">
        <img src="/img/home/logo-overlay2.png" class="backg-ovrl2 bigscreen ol2-l">
        <img src="/img/home/logo-overlay2r.png" class="backg-ovrl2 bigscreen ol2-r">
        <img src="/img/logos/vector-logo.svg" class="backg-ovrl2 smallscreen">
        <div id="containermv">
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
    <div id="container_members">
        <div class="member_menu" id="index_members">
            <div style="width: 80%; margin: 0 auto; height: 20rem;">
                <center>
                    <div class="separator50">

                        <div class="icons_members_index" id="open_formation">
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-users fa-stack-1x fa-inverse"></i>
                            </span>
                            <p class="members_index_font">{{ trans("home.formation") }}</p>
                        </div>
                        <div  class="icons_members_index" id="open_investigation">
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-search fa-stack-1x fa-inverse"></i>
                            </span>
                            <p class="members_index_font">{{ trans("home.investigation") }}</p>
                        </div>
                    </div>
                    <div class="separator50">
                        <div class="icons_members_index" id="open_documentation">
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                            </span>
                            <p class="members_index_font">{{ trans("home.documentation") }}</p>
                        </div>
                        <div class="icons_members_index" id="open_diffusion">
                            <span class="members_index_icons fa-stack fa-2x">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fas fa-bullhorn fa-stack-1x fa-inverse"></i>
                            </span>
                            <p class="members_index_font">{{ trans("home.difussion") }}</p>
                        </div>
                    </div>
                </center>
            </div>
        </div>

        <div class="member_menu member_menu_open" id="f_members" style="display: none;">
            <span class="returnback fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </div>

        <div class="member_menu member_menu_open" id="i_members" style="display: none;">
            <span class="returnback fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </div>

        <div class="member_menu member_menu_open" id="d1_members" style="display: none;">
            <span class="returnback fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </div>

        <div class="member_menu member_menu_open" id="d2_members" style="display: none;">
            <span class="returnback fa-stack fa-1x">
                <i class="fas fa-circle fa-stack-2x"></i>
                <i class="fas fa-times fa-stack-1x fa-inverse"></i>
            </span>
        </div>
    </div>

@endsection