@extends('/layouts/mainlayout')

@section('content')

    <div>
        <div class="home_container">
            <div class="submain_container">
                <table style="height: 15rem; width: 100%; text-align: center;">
                    <tr>
                        <td>
                            <div style="margin:auto; display: inline-flex;">
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
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    </p>
                </div>
                <div class="rightdivide" id="logo_subpage">
                    <div style="width: 100%; padding: 20px;">
                        <center>
                            <img src="/img/logos/onebranch.png" class="svgcolor"/>
                            <h2>{{ trans("diffusion.diffusion") }}</h2>
                        </center>
                    </div>
                </div>
            </div>
            <div style="margin:auto; width:100%;">
                <div id="sub_elementscont">
                    <div class="cont_redirects">
                        <span class="padicons members_index_icons fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-book fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 class="bold">{{ trans("diffusion.ebv") }}</h3>
                    </div>
                    <div class="cont_redirects">
                        <span class="padicons members_index_icons fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fas fa-gavel fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 class="bold">{{ trans("diffusion.audio") }}</h3>
                    </div>
                    <div class="cont_redirects">
                        <span class="padicons members_index_icons fa-stack fa-2x">
                            <i class="fas fa-circle fa-stack-2x"></i>
                            <i class="fab fa-pagelines fa-stack-1x fa-inverse"></i>
                        </span>
                        <h3 class="bold">{{ trans("diffusion.visual") }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection