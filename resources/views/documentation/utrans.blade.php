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
                                <h1 class="title_notmain">{{ trans("documentation.digtrans_unit") }}</h1>
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
                            <img src="/img/logos/onebranch.png" class="svgcolor" style="transform: rotate(90deg);" />
                            <h2>{{ trans("documentation.digtrans_unit") }}</h2>
                        </center>
                    </div>
                </div>
            </div>

            <div id="carouselindicators" class="carousel slide" data-bs-ride="true" data-interval="false">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
                    <button type="button" data-bs-target="#carouselindicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 2.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 11.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 31.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 13.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 29.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="/img/documentacion/utrans/Mesa de trabajo 26.jpg" class="imgcarousel d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselindicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselindicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            
        </div>
    </div>

@endsection